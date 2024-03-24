<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{

    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
    }
}
