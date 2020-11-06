<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Moderator;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function invite(Request $request, Band $band)
    {
        $messsages = [
            'exists' => 'There are no users with this email.'
        ];

        $data = $request->validate([
            'email' => ['email', 'required', 'exists:moderators,email']
        ], $messsages);


        $m = Moderator::where('email', $data['email'])->first();
        $band->moderators()->toggle($m);

        return redirect()->route('band.edit', $band->id);
    }

    public function unInvite(Moderator $mod, Band $band)
    {
        $band->moderators()->toggle($mod);
        return redirect()->route('band.edit', $band->id);
    }
}
