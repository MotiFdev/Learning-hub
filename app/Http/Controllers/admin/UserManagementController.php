<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::Orderby('created_at', 'desc')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function showAllUsers()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function showAllTeachers()
    {
        $users = User::where('role', 'teacher')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function showAllAdmins()
    {
        $users = User::where('role', 'admin')->get();

        return view('admin.users.index', ['users' => $users]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {
        //
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,teacher,admin',
        ]);

        $user = User::create($validation);

        Auth::user()->activities()->create([
            'activity_type' => 'New User Added',
            'details' => 'Admin ' . Auth::user()->name . ' created a new user ' . $validation['name'] . ' with the role of ' . $validation['role'],
            'icon_type' => 'fas fa-user-plus',
            'color_type' => 'success',
        ]);

        //verify email
        $user->sendEmailVerificationNotification();

        return redirect()->route('admin.dashboard')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::findorfail($id);

        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findorfail($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $user = User::findorfail($id);

        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,teacher,admin',
        ]);

        // If a new password is provided, hash it and update the user
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Encrypt the new password
        }

        // Update other user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        Auth::user()->activities()->create([
            'activity_type' => 'New User Updated',
            'details' => 'Admin ' . Auth::user()->name . ' updated the user ' . $validation['name'],
            'icon_type' => 'fas fa-user-edit',
            'color_type' => 'warning',
        ]);

        //if edited  his himself it will logout
        if ($user->id == Auth::user()->id) {
            Auth::logout();
        }

        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = User::findorfail($id);

        $user->delete();
        Auth::user()->activities()->create([
            'activity_type' => 'New User Deleted',
            'details' => 'Admin ' . Auth::user()->name . ' deleted the user ' . $user->name,
            'icon_type' => 'fas fa-user-times',
            'color_type' => 'danger',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
}
