<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\SendPrivateMessageRequest;
use App\PrivateMessage;
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

    public function privateMessages($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = auth()->user();

        $conversation = $me->conversations()->whereHas('users', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->firstOrCreate([]);

        return view('users.dms', [
            'user' => $user,
            'me' => $me,
            'conversation' => $conversation
        ]);
    }

    public function sendMessage($username, SendPrivateMessageRequest $request)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = auth()->user();

        $conversation = $me->conversations()->whereHas('users', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if ($conversation === null) {
            $conversation = Conversation::create([]);
            $conversation->users()->attach($user);
            $conversation->users()->attach($me);
        }

        PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $request->input('message')
        ]);

        return redirect("/$username/dms");
    }
}
