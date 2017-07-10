<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class FacebookInt extends Controller
{
    //
    public function redirect(){
      return Socialite::driver('facebook')-> redirect();
    }
    public function login(){
        return view('fblogin');
    }

    public function callback(){
      $user=\Socialite::driver('facebook')
    ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
    ->user();
    //dd($user);
    return view('posts');
    }
}
