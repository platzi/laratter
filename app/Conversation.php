<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function privateMessages()
    {
        return $this->hasMany(PrivateMessage::class)->orderBy('created_at', 'desc');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
