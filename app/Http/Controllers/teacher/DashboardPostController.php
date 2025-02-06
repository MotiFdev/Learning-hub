<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPostController extends Controller
{
    //
    //check how many post the teacher has Total post, recent post
    public function showDashboard()
    {
        $teacher = Auth::user();
        $totalPost = $teacher->posts()->count();

        $totalComment = $teacher->comments()->count();
        $recentPost = $teacher->posts()->orderBy('created_at', 'desc')->take(3)->get();
        return view('teacher.dashboard', ['totalPosts' => $totalPost, 'recentPosts' => $recentPost, 'totalComments' => $totalComment]);
    }
    //create post card (share assignments, or resources with your students) button to create a post
    //Post Engagement Total Engagement, comments
}
