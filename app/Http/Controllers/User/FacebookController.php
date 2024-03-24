<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{

    public function facebookPage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
