<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $data = [
//            'messages' => [],
            'messages' => [
                ['id' => 1, 'content' => 'Platzi es lo más!', 'image' => 'http://lorempixel.com/600/338/people/1'],
                ['id' => 2, 'content' => 'El curso está buenísimo', 'image' => 'http://lorempixel.com/600/338/people/2'],
                ['id' => 3, 'content' => 'Gracias #Platzi!', 'image' => 'http://lorempixel.com/600/338/people/3'],
                ['id' => 4, 'content' => 'Todos sigan a @guiwoda en Twitter!', 'image' => 'http://lorempixel.com/600/338/people/4'],
            ],
        ];

        return view('welcome', $data);
    }

    public function aboutUs()
    {
        return view('about');
    }
}
