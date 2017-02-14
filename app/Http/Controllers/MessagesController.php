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
//        dd($request->all());

//        $this->validate($request, [
//            'message' => 'required|max:160',
//        ],[
//            'message.required' => 'Escribe un mensaje!',
//            'message.max' => 'El mensaje no puede ser de más que 160 caracteres.',
//        ]);

        $created = Message::create([
            'content' => $request->input('message'),
        ]);

        return redirect("messages/{$created->id}");
    }
}
