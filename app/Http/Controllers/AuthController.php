<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Import Role model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
        ]);

        $userRole = Role::where('role_name', 'User')->first();

        if (!$userRole) {
            return back()->withInput()->withErrors(['role' => 'Default "User" role not found. Please contact administrator.']);
        }

        $user = User::create([
            'role_id' => $userRole->id_role,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registration successful! Welcome, ' . $user->username . '!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', 'Login successful! Welcome back!');
        }

        throw ValidationException::withMessages([
            'username' => __('auth.failed'), // Use Laravel's default auth.failed message
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
