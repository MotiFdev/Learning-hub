<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function showProfile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        User::whereId(Auth::user()->id)->update([
            'name' => $request->name,
        ]);

        Auth::user()->activities()->create([
            'activity_type' => 'Profile Updated',
            'details' => 'User ' . Auth::user()->name . ' updated their profile to ' . $request->name,
            'icon_type' => 'fas fa-user-edit',
            'color_type' => 'warning',
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:2|confirmed',
        ]);

        // Check if current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.'
            ]);
        }



        // Update password with correct request field
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::user()->activities()->create([
            'activity_type' => 'Password Updated',
            'details' => 'User ' . Auth::user()->name . ' updated their password',
            'icon_type' => 'fas fa-key',
            'color_type' => 'warning',
        ]);

        // Logout the user to refresh session
        Auth::logout();

        return redirect()->route('login')->with('success', 'Password updated successfully! Please log in again.');
    }
}
