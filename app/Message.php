<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use Searchable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Message::class, 'parent_id');
    }

    public function repost(User $user)
    {
        return $user->messages()->create([
            'content'   => $this->content,
            'image'     => $this->image,
            'parent_id' => $this->id,
        ]);
    }

    public function toSearchableArray()
    {
        $this->load('user');

        return $this->toArray();
    }

    public function isLikedBy(?User $user)
    {
        return $user &&
            $user->likes()->find($this->id);
    }

    public function isRepostedBy(?User $user): ?Message
    {
        if (!$user) {
            return null;
        }

        return $user->messages()->where('parent_id', $this->id)->first();
    }

    public function getImageAttribute($image)
    {
        if (!$image || starts_with($image, 'http')) {
            return $image;
        }

        return Storage::disk('public')->url($image);
    }
}
