<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(2);

        return view('teacher.post.my_post', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('teacher.post.create');
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

        Auth::user()->posts()->create($validation);

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Created',
            'details' => 'Teacher ' . Auth::user()->name . ' created a new post ' . $validation['title'],
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'success',
        ]);

        return redirect()->route('teacher.post.index')->with('success', 'Post created successfully!');
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
    public function edit(string $id)
    {
        //
        $post = Auth::user()->posts()->findOrFail($id);

        return view('teacher.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Auth::user()->posts()->findOrFail($id);

        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Updated',
            'details' => 'Teacher ' . Auth::user()->name . ' updated a new post ' . $validation['title'],
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'warning',
        ]);

        $post->update($validation);

        return redirect()->route('teacher.post.index', $post->id)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $post = Auth::user()->posts()->findOrFail($id);

        Auth::user()->activities()->create([
            'activity_type' => 'New Post Deleted',
            'details' => 'Teacher ' . Auth::user()->name . ' deleted a new post ' . $post->title,
            'icon_type' => 'fas fa-file-alt',
            'color_type' => 'danger',
        ]);

        $post->delete();

        return redirect()->route('teacher.post.index')->with('success', 'Post deleted successfully!');
    }
}
