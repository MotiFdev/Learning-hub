<?php

namespace App\Http\Controllers\user;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::latest()->get();

        return view('user.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = Post::with(['comments' => function ($query) {
            $query->latest();
        }, 'comments.user'])->findOrFail($id);

        return view('user.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
