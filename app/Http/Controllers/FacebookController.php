<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Input;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();

        if(!empty(User::where('fb_id', $user->id)->first())){
            Auth::login(User::where('fb_id', $user->id)->first());
            return redirect()->to('/');
        } else {
        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'fb_id' => $user['id'],
            'role' => 'user',
        ]);
        return redirect()->to('/home');
        }
    }
}
