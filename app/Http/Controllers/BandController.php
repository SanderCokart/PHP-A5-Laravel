<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @param Band $bands
     * @return Application|Factory|View
     */
    public function show(Band $band)
    {
    //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param Band $band
     * @return void
     */
    public function edit(Band $band)
    {
        dd('hi');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Band $band
     * @return void
     */
    public function update(Request $request, Band $band)
    {
        //
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

    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        $bands = auth()->user()->bands;
        return view('home',compact('bands'));
    }

}
