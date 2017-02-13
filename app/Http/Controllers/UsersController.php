<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function follow($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = auth()->user();

        $me->follows()->attach($user);

        return back();
    }

    public function unfollow($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = auth()->user();

        $me->follows()->detach($user);

        return back();
    }
}
