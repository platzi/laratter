<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
    	return view('messages.show', [
    		'message' => $message,
    	]);
    }

    public function create(CreateMessageRequest $request)
    {
        $user = $request->user();

        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000)
        ]);

        return redirect('/messages/'.$message->id);
    }
}
