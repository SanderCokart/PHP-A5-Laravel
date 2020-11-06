<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Rules\Unchanged;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate(['name' => ['exclude_if:name,' . $user->name, 'required'], 'email' => ['exclude_if:email,' . $user->email, 'required', 'email', 'unique:users']]);

        $user->update($data);
        unset($data['name']);
        $user->moderator()->update($data);

        return redirect(route('users.edit', $user->id));
    }
}
