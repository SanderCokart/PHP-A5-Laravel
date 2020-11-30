<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Moderator;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Intervention\Image\Facades\Image;

class BandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /** Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        /*INIT SEARCH VAR*/
        $search = '';

        if ($request->has('search')) {
            /*VALIDATE REQUEST*/
            $data = $request->validate(['search' => 'nullable|alpha_num|string']);
            $search = $data['search'];
        }


        /*LOCATE BAND NAMES AND BIOGRAPHIES THAT MATCH THE SEARCH TERM*/
        $bands = Band::searchByNameAndBio('');

        /*RETURN VIEW WITH BANDS AND SEARCH TERM*/
        return view('band.index', ['bands' => $bands, 'search' => $search]);
    }

    /** Show the form for creating a new resource.
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('band.create');
    }

    /** perform string manipulation on links to replace '.com/watch?v=' with '.com/embed/' and remove the
     * start timestamp from the url
     * @param $link
     * @return string|string[]|null
     */
    public function replaceLink($link)
    {
        $link = str_replace('.com/watch?v=', '.com/embed/', $link);
        $link = preg_replace('/&t=\d*s$/', '', $link);
        return $link;
    }

    /**Store a newly created resource in storage.
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        /*VALIDATE THE REQUEST*/
        $data = request()->validate([
            'name' => ['min:1', 'required', 'unique:bands'],
            'bio' => ['max:4000', 'nullable'],
            'bg_color' => ['regex:/^#[0-9A-z]{6}$/', 'nullable'],
            'text_color' => ['regex:/^#[0-9A-z]{6}$/', 'nullable'],
            'image' => ['image', 'nullable'],
            'link_1' => ['url', 'nullable'],
            'link_2' => ['url', 'nullable'],
            'link_3' => ['url', 'nullable'],
        ]);

        /*HANDLE LINKS*/
        if (isset($data['link_1'])) {
            $data['link_1'] = $this->replaceLink($data['link_1']);//eerste stap
        }

        if (isset($data['link_2'])) {
            $data['link_2'] = $this->replaceLink($data['link_2']);
        }

        if (isset($data['link_3'])) {
            $data['link_3'] = $this->replaceLink($data['link_3']);
        }

        /*IF AN IMAGE IS ATTACHED*/
        if (isset($data['image'])) {
            /*store UploadedFile::class  under band_images folder in the public storage dir*/
            $imagePath = $data['image']->store('band_images', 'public');
            /*manipulate the image to fit to 1920x1080, smaller images get bigger and bigger ones get resized*/
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            /*overwrite the image*/
            $image->save();
            /*add /storage/ to the imagePath*/
            $imagePath = '/storage/' . $imagePath;
            /*overwrite data['image']*/
            $data['image'] = $imagePath;
        }

        /*create band from the relationship of the user; must manually set band name*/
        $band = auth()->user()->bands()->create(['name' => $data['name']]);
        /*remove name from the data array*/
        unset($data['name']);
        /*pass on the rest of the data to the create function of that bands' bandBio relationship*/
        $band->bandBio()->create($data);
        /*redirect the user to the EPK of the same ID*/
        return redirect(route('bands.show', $band->id));
    }

    /**
     * Display the specified resource.
     * @param Band $band
     * @return Application|Factory|View
     */
    public function show(Band $band)
    {
        /*to make the links not fill up empty elements; remove links that are set to null by using filter on a collect*/
        $band_links = collect([$band->bandBio->link_1, $band->bandBio->link_2, $band->bandBio->link_3])->filter();
        /*return view with the band from the route param and band_links*/
        return view('band.show', compact('band', 'band_links'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Band $band
     * @return Application|Factory|View|void
     */
    public function edit(Band $band)
    {
        /*allow this page to return if the user is allowed to update the band either by being the owner or moderator*/
        $this->authorize('update', $band);
        /*return view with the band from the route param*/
        return view('band.edit', compact('band'));
    }

    /** Update the specified resource in storage.
     * @param Request $request
     * @param Band $band
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Band $band)
    {
        /*validate request*/
        $data = request()->validate([
            'name' => ['min:1', 'required'],
            'bio' => ['max:4000', 'nullable'],
            'bg_color' => ['regex:/^#[0-9A-z]{6}$/', 'nullable'],
            'text_color' => ['regex:/^#[0-9A-z]{6}$/', 'nullable'],
            'image' => ['image', 'nullable'],
            'link_1' => ['url', 'nullable'],
            'link_2' => ['url', 'nullable'],
            'link_3' => ['url', 'nullable'],
        ]);

        /*handle links*/
        if (isset($data['link_1'])) {
            $data['link_1'] = $this->replaceLink($data['link_1']);//eerste stap
        }

        if (isset($data['link_2'])) {
            $data['link_2'] = $this->replaceLink($data['link_2']);
        }

        if (isset($data['link_3'])) {
            $data['link_3'] = $this->replaceLink($data['link_3']);
        }

        /*if there is an image attached*/
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('band_images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            $image->save();
            $imagePath = '/storage/' . $imagePath;
            $data['image'] = $imagePath;
        }

        /*update the band name*/
        $band->update(['name' => $data['name']]);
        /*unset the band name from the data array*/
        unset($data['name']);
        /*pass on the remainder of the data to the bandBio its update method*/
        $band->bandBio->update($data);
        /*return a redirect to the show page of the EPK of the band with the same ID*/
        return redirect(route('bands.show', $band->id));
    }

    /** add a moderator
     * @param Request $request
     * @param Band $band
     * @return RedirectResponse
     */
    public function invite(Request $request, Band $band)
    {
        /*Custom error messages*/
        $messsages = [
            'exists' => 'There are no users with this email.'
        ];

        /*validate request*/
        $data = $request->validate([
            'email' => ['email', 'required', 'exists:moderators,email']
        ], $messsages);

        /*find the first moderator to match the email*/
        $mod = Moderator::where('email', $data['email'])->first();
        /*toggle the mod onto the bands moderators*/
        $band->moderators()->toggle($mod);
        /*return redirect to the bands' edit page with the same ID*/
        return redirect()->route('bands.edit', $band->id);
    }

    /** remove a moderator
     * @param Band $band
     * @param Moderator $mod
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function unInvite(Band $band, Moderator $mod)
    {
        /*if user is authorized to add moderators onto the band from route params*/
        $this->authorize('addModerators', $band);
        /*toggle the moderator from the bands' moderators*/
        $band->moderators()->toggle($mod);
        /*redirect to the bands' edit page of the same ID*/
        return redirect()->route('bands.edit', $band->id);
    }
}
