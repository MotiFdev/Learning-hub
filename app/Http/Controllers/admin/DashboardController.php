<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\RecentActivity;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showTotals()
    {
        $totals = $this->getDashboardTotals();
        $recent_activities =  RecentActivity::orderBy('created_at', 'desc')->paginate(5);
        $users = User::orderBy('created_at', 'desc')->paginate(5);


        // Calculate percentage increases for users, admins, and teachers
        $percentageIncreaseUsers = $this->calculatePercentageIncrease($this->getPreviousCount('user'), $totals['users']);
        $percentageIncreasePosts = $this->calculatePercentageIncrease($this->getPreviousCount('posts'), $totals['posts']);
        $percentageIncreaseTeachers = $this->calculatePercentageIncrease($this->getPreviousCount('teacher'), $totals['teachers']);

        return view('admin.dashboard', [
            'users' => $users,
            'user_totals' => $totals['users'],
            'admin_totals' => $totals['admins'],
            'teacher_totals' => $totals['teachers'],
            'post_totals' => $totals['posts'],
            'recent_activities' => $recent_activities,
            'percentageIncreaseUsers' => $percentageIncreaseUsers,
            'percentageIncreasePosts' => $percentageIncreasePosts,
            'percentageIncreaseTeachers' => $percentageIncreaseTeachers,
        ]);
    }


    public function getDashboardTotals()
    {
        // Get the counts for users, teachers, admins, and posts
        return [
            'users' => User::where('role', 'user')->count(),
            'teachers' => User::where('role', 'teacher')->count(),
            'admins' => User::where('role', 'admin')->count(),
            'posts' => Post::count(),
        ];
    }
    public function calculatePercentageIncrease($previous, $current)
    {
        if ($previous == 0) {
            return 0; // Avoid division by zero
        }

        return round((($current - $previous) / $previous) * 100, 2); // Round to 2 decimal places
    }

    // Helper method to get the previous count for each role
    public function getPreviousCount($role)
    {
        return User::where('role', $role)
            ->where('created_at', '<', now()->subMonth()) // Adjust time frame as needed
            ->count();
    }
}
