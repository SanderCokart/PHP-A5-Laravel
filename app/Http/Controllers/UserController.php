<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update()
    {

    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }
}
