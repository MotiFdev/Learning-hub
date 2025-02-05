<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $postID)
    {
        // Validate the comment input
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // Find the post by its ID
        $post = Post::findOrFail($postID);

        // Create a new comment
        $post->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);

        // Redirect back to the post with a success message
        return redirect()->route('post.show', $post->id)
            ->with('success', 'Comment added successfully!');
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
