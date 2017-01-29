<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $data = [
            'messages' => Message::simplePaginate(16),
        ];

        return view('welcome', $data);
    }

    public function aboutUs()
    {
        return view('about');
    }
}
