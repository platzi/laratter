<?php

namespace App\Http\Controllers;

use App\SocialProfile;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();

        $user = User::whereHas('socialProfile', function($query) use ($provider, $data) {
            $query
                ->where('provider', $provider)
                ->where('provider_id', $data->id);
        })->first();

        if ($user !== null) {
            return $this->login($user);
        }

        session()->flash('data', $data);

        return view('auth.social-form', [
            'provider' => $provider,
            'data' => $data
        ]);
    }

    public function register($provider, Request $request)
    {
        $data = session('data');

        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'username' => $request->input('username'),
            'password' => str_random(16),
        ]);

        SocialProfile::create([
            'user_id' => $user->id,
            'provider' => $provider,
            'provider_id' => $data->id
        ]);

        return $this->login($user);
    }

    /**
     * @param $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function login($user)
    {
        auth()->login($user);

        return redirect('/'.$user->username);
    }
}
