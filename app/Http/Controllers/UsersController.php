<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username)
    {
    	$user = User::where('username', $username)->first();

    	return view('users.show', [
    		'user' => $user,
    	]);
    }
}
