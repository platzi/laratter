<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	$links = [
	    	'https://platzi.com/laravel' => 'Curso de Laravel',
	    	'https://laravel.com' => 'Página de Laravel'
	    ];

	    return view('welcome', [
	    	'teacher' => 'Guido Contreras Woda',
	    	'links' => $links,
		]);
    }

    public function aboutUs()
    {
    	return view('about');
    }
}
