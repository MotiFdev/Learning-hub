<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
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
}
