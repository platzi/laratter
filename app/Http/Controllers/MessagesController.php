<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function search(Request $request)
    {
        $this->validate($request, ['query' => 'required']);

        $messages = Message::search($request->input('query'))->paginate(16);

        return view('messages.search', [
            'messages' => $messages,
        ]);
    }

    public function show(Message $message)
    {
//        $message = Message::find($id);

        return view('messages.show', [
            'message' => $message,
        ]);
    }

    public function create(CreateMessageRequest $request)
    {
        $image = $request->file('image');

        $created = Message::create([
            'user_id' => $request->user()->id,
            'content' => $request->input('message'),
            'image'   => $image->store('images', 'public'),
        ]);

        return redirect("messages/{$created->id}");
    }
}
