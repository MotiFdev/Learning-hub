<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Created',
            'details' => 'Admin ' . Auth::user()->name . ' created a new post ' . $validation['title'],
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'success',
        ]);

        Auth::user()->posts()->create($validation);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::findorfail($id);

        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $post = Post::findorfail($id);

        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validation);

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Updated',
            'details' => 'Admin ' . Auth::user()->name . ' updated a new post ' . $validation['title'],
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'warning',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);

        $post->delete();

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Deleted',
            'details' => 'Admin ' . Auth::user()->name . ' deleted a new post ' . $post->title,
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'danger',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully!');
    }
}
