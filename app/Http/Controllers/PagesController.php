<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $data = [
            'teacher' => 'Guido Woda',
            'twitter' => '@guiwoda',
            'temas'   => [
                'Rutas',
                'Blade',
                'Controladores',
                'Eloquent',
                'Y mucho más!',
            ],
        ];

        return view('welcome', $data);
    }

    public function aboutUs()
    {
        return view('about');
    }
}
