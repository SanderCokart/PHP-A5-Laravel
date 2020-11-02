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
            'exists' => 'A user with this email does not exist'
        ];

        $data = $request->validate([
            'email' => ['email', 'required', 'exists:moderators,email']
        ], $messsages);


        $m = Moderator::where('email', $data['email'])->first();
        $band->moderators()->toggle($m);

    }
}
