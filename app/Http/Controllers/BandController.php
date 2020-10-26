<?php

namespace App\Http\Controllers;

use App\Models\Band;
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
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('band.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param Band $band
     * @return Application|Factory|View
     */
    public function show(Band $band)
    {
        return view('band.show', compact('band'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Band $band
     * @return Application|Factory|View|void
     */
    public function edit(Band $band)
    {
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

        if (isset($data['link_1']) || isset($data['link_2']) || isset($data['link_3'])) {
            //sreach embed zo niet zet in na .com.
            //string overschrijven
        }

        if (isset($data['image'])) {
            $imagePath = $data['image']->store('band_images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1920);
            $image->save();
            $imagePath = '/storage/' . $imagePath;
            $data['image'] = $imagePath;
        }


        $band->update(['name' => $data['name']]);

        unset($data['name']);
        $band->bandBio->update($data);

        return redirect(route('band.show', $band->id));

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
}
