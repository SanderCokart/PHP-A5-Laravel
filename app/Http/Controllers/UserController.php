<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** show user edit page
     * @return Application|Factory|View
     */
    public function edit()
    {
        /*get the user form auth*/
        $user = auth()->user();
        /*return view with that user*/
        return view('user.edit', compact('user'));
    }

    /** update a user
     * @param Request $request
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, User $user)
    {
        /*validate request*/
        $data = $request->validate(['name' => ['exclude_if:name,' . $user->name, 'required'], 'email' => ['exclude_if:email,' . $user->email, 'required', 'email', 'unique:users']]);
        /*pass data to the update method*/
        $user->update($data);
        /*unset name from the data array*/
        unset($data['name']);
        /*update the moderator's email*/
        $user->moderator()->update($data);
        /*return redirect to the edit page of the user with the same ID*/
        return redirect(route('users.edit', $user->id));
    }
}
