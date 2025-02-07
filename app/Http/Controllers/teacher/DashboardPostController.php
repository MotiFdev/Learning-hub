<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPostController extends Controller
{
    //
    //check how many post the teacher has Total post, recent post
    public function showDashboard()
    {
        $teacher = Auth::user();
        $totalComments = $teacher->posts()->withCount('comments')->get()->sum('comments_count');
        $posts = Post::orderby('created_at', 'desc')->paginate(4);
        $totalPost = $teacher->posts()->count();
        $recentPost = $teacher->posts()->orderBy('created_at', 'desc')->take(3)->get();
        return view('teacher.dashboard', ['totalPosts' => $totalPost, 'recentPosts' => $recentPost, 'totalComments' => $totalComments, 'posts' => $posts]);
    }
}
