<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Moderator;
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

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $bands = Band::where('name', 'like', '%' . $search . '%')->get();
        return view('band.index', compact('bands', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('band.create');
    }

    public function replaceLink($link)
    {
        $link = str_replace('.com/watch?v=', '.com/embed/', $link);//tweede stap
        $link = preg_replace('/&t=\d*s$/', '', $link);
        return $link;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
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

        if (isset($data['link_1'])) {
            $data['link_1'] = $this->replaceLink($data['link_1']);//eerste stap
        }

        if (isset($data['link_2'])) {
            $data['link_2'] = $this->replaceLink($data['link_2']);
        }

        if (isset($data['link_3'])) {
            $data['link_3'] = $this->replaceLink($data['link_3']);
        }

        if (isset($data['image'])) {
            $imagePath = $data['image']->store('band_images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            $image->save();
            $imagePath = '/storage/' . $imagePath;
            $data['image'] = $imagePath;
        }

        $band = auth()->user()->bands()->create(['name' => $data['name']]);
        unset($data['name']);
        $band->bandBio()->create($data);


        return redirect(route('bands.show', $band->id));
    }

    /**
     * Display the specified resource.
     * @param Band $band
     * @return Application|Factory|View
     */
    public function show(Band $band)
    {
        $band_links = collect([$band->bandBio->link_1, $band->bandBio->link_2, $band->bandBio->link_3])->filter();
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
        $this->authorize('update', $band);
        return view('band.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Band $band
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Band $band)
    {
        //youtube link embed
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

        if (isset($data['link_1'])) {
            $data['link_1'] = $this->replaceLink($data['link_1']);//eerste stap
        }

        if (isset($data['link_2'])) {
            $data['link_2'] = $this->replaceLink($data['link_2']);
        }

        if (isset($data['link_3'])) {
            $data['link_3'] = $this->replaceLink($data['link_3']);
        }


        if (isset($data['image'])) {
            $imagePath = $data['image']->store('band_images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            $image->save();
            $imagePath = '/storage/' . $imagePath;
            $data['image'] = $imagePath;
        }


        $band->update(['name' => $data['name']]);

        unset($data['name']);
        $band->bandBio->update($data);

        return redirect(route('bands.show', $band->id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Band $band
     * @return void
     */
    public function destroy(Band $band)
    {
        //
    }

    public function invite(Request $request, Band $band)
    {
        $messsages = [
            'exists' => 'There are no users with this email.'
        ];

        $data = $request->validate([
            'email' => ['email', 'required', 'exists:moderators,email']
        ], $messsages);


        $mod = Moderator::where('email', $data['email'])->first();
        $band->moderators()->toggle($mod);

        return redirect()->route('bands.edit', $band->id);
    }

    public function unInvite(Band $band, Moderator $mod)
    {
        $this->authorize('controlModerators', $band);
        $band->moderators()->toggle($mod);
        return redirect()->route('bands.edit', $band->id);
    }
}
