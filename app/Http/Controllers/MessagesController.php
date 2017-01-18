<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message)
    {
//        $message = Message::find($id);

        return view('messages.show', [
            'message' => $message,
        ]);
    }
}
