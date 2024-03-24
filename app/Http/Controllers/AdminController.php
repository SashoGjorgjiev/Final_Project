<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.dashboard', compact('users'));
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.logout');
    }
    public function vintage_obleka()
    {
        $products = Products::paginate(9);
        $allProducts = Products::all();

        return view('Admin.vintage_obleka', compact('products', 'allProducts'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('Admin.profile', compact('user'));
    }
    public function updateProfile(Request $request, User $user)
    {
        $user = Auth::user();

        $updateInputs =   $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:255',
        ]);

        User::updated($updateInputs);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    // Method to update the user's password
    public function updatePassword(Request $request, User $user)
    {
        // $user = Auth::user();
        $user = Auth::user();
        $passwordInput =   $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password does not match your current password.']);
        }

        $user->password = Hash::make($request->password);
        User::saved($passwordInput);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    public function updateImage(Request $request, User $user)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Store the new image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = $imagePath;
        }
        User::save($imagePath);

        return redirect()->back()->with('success', 'Profile image updated successfully.');
    }
}
