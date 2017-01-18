<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'teacher' => 'Guido Woda',
        'temas' => [
            'Rutas',
            'Blade',
            'Controladores',
            'Eloquent',
            'Y mucho más!',
        ],
//        'twitter' => '@guiwoda',
    ]);
});

//Route::get('/', function () {
//    return 'Hola, Platzi!';
//});

Route::get('about', function () {
    return view('about');
});
