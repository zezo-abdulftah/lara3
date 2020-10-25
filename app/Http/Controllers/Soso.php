<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class Soso extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }
    public function Callback($service)
    {
        $user = Socialite::with($service)->stateless()->user();
dd($user);
        // $user->token;
    }
}
