<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    public function facebook()
    {
    	return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
    	$user = Socialite::driver('facebook')->user();

    	dd($user);
    }
}
