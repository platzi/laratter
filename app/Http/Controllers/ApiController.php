<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function like(Message $message, Request $request)
    {
        $user = $request->user();

        $liked = $user->likes()->toggle($message);

        return [
            'user_id' => $user->id,
            'message_id' => $message->id,
            'liked' =>  count($liked['attached']) > 0,
        ];
    }

    public function repost(Message $message, Request $request)
    {
        if ($reposted = $message->isRepostedBy($request->user())) {
            $reposted->delete();

            return [
                'user_id' => $request->user()->id,
                'message_id' => $message->id,
                'reposted' => false,
            ];
        }

        $reposted = $message->repost($request->user());

        return [
            'user_id' => $request->user()->id,
            'message_id' => $message->id,
            'reposted' => true,
        ];
    }
}
