<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followOrUnfollow(User $user)
    {
        $user->followers()->toggle(auth()->user());

        return response()->json([
            'followers' => $user->followers()->count(),
        ]);
    }
}
