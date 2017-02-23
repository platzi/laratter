<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageLiked;
use App\Notifications\MessageReposted;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function like(Message $message, Request $request)
    {
        $user = $request->user();

        $result = $user->likes()->toggle($message);

        $liked = count($result['attached']) > 0;

        if ($liked) {
            $message->user->notify(new MessageLiked($user, $message));
        }

        return [
            'user_id' => $user->id,
            'message_id' => $message->id,
            'liked' => $liked,
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

        $message->user->notify(new MessageReposted(
            $request->user(), $message, $reposted)
        );

        return [
            'user_id' => $request->user()->id,
            'message_id' => $message->id,
            'reposted' => true,
        ];
    }

    public function notifications(Request $request)
    {
        $user = $request->user();

        return [
            'notifications' => $user->notifications,
            'user_id' => $user->id,
        ];
    }
}
