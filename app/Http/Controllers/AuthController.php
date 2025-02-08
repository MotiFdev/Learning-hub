<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return (view('auth.login'));
    }

    public function showRegisterForm()
    {
        return (view('auth.register'));
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login with provided credentials
        if (Auth::attempt($validation)) {
            // Check if the user has verified their email
            if (!Auth::user()->hasVerifiedEmail()) {
                // Log out the user and redirect to the verification notice
                // Auth::logout
                return redirect()->route('verification.notice')->with('error', 'You must verify your email before logging in.');
            }

            // Redirect to the home page if the email is verified
            return redirect()->route('home');
        }

        // If login attempt fails (incorrect credentials)
        return redirect()->back()->with('error', 'Invalid credentials');
    }




    public function register(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => bcrypt($validation['password']),
        ]);

        // Dispatch the email verification event
        event(new Registered($user));


        // Log in the user immediately
        Auth::login($user);

        Auth::user()->activities()->create([
            'activity_type' => 'New User Registered',
            'details' => 'User ' . Auth::user()->name . ' registered with email ' . $validation['email'],
            'icon_type' => 'fas fa-user-plus',
            'color_type' => 'success',
        ]);

        // Redirect to the verification notice page
        return redirect()->route('verification.notice');
    }


    public function logout()
    {
        Auth::logout();
        // Invalidate the session
        request()->session()->invalidate();

        // Regenerate the session to prevent session fixation attacks
        request()->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
