<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.login');
    }

    public function forgetPassword()
    {
        return view('auth.forgot-password');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('users.dashboard.post')->with('success', 'Login successful');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function register()
    {
        return view('registerproceed');
    }

    public function goToTheDashboard()
    {
        $user = Auth::user();
        return view('users/register.dashboard', compact('user'));
    }


    public function registerProceed(Request $request)
    {
        $step = $request->input('step');

        if ($step == 1) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);
        } elseif ($step == 2) {
            $request->validate([
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'confirm_password' => 'required|same:password',
            ]);
        } elseif ($step == 3) {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:20',
                'bio' => 'nullable|string',
            ]);

            $user = new User();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));

            $user->confirm_password = $request->input('confirm_password');
            $user->image = $request->input('image');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->bio = $request->input('bio');

            $user->save();

            return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
        } else {
            return redirect()->route('user_register')->withErrors(['Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user_login');
    }
}
