<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($username)
    {
    	$user = $this->findByUsername($username);

    	return view('users.show', [
    		'user' => $user,
    	]);
    }

    public function follow($username, Request $request)
    {
    	$user = $this->findByUsername($username);

    	$me = $request->user();

    	$me->follows()->attach($user);

        return redirect("/$username")->withSuccess('Usuario seguido!');
    }

    public function follows($username)
    {
    	$user = $this->findByUsername($username);

    	return view('users.follows', [
    		'user' => $user
    	]);
    }

    private function findByUsername($username)
    {
    	return User::where('username', $username)->first();
    }
}
