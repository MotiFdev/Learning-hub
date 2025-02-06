@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Teacher Dashboard</h2>

        <div class="row g-4">
            <!-- My Posts Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-book fa-2x text-primary me-3"></i>
                            <h5 class="card-title mb-0">My Posts</h5>
                        </div>
                        <p class="text-muted mb-3">Total Posts: <strong class="text-dark">{{ $totalPosts }}</strong></p>
                        <p class="text-muted mb-2">Recent Posts:</p>
                        <ul class="list-unstyled mb-0">
                            @foreach ($recentPosts as $post)
                                <li class="mb-2">
                                    <i class="fas fa-file-alt text-secondary me-2"></i>
                                    <span>{{ $post->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Create New Post Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-edit fa-2x text-success me-3"></i>
                                <h5 class="card-title mb-0">Create a New Post</h5>
                            </div>
                            <p class="text-muted mb-4">Share assignments, announcements, or resources with your students.
                            </p>
                        </div>
                        <a href="" class="btn btn-success w-100">Create New Post</a>
                    </div>
                </div>
            </div>

            <!-- Post Engagement Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-chart-bar fa-2x text-info me-3"></i>
                            <h5 class="card-title mb-0">Post Engagement</h5>
                        </div>
                        <p class="text-muted mb-3">Total Engagements: <strong
                                class="text-dark">{{ $totalComments + 70 }}</strong></p>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i class="fas fa-thumbs-up text-info me-2"></i>
                                <span>Likes: 20</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-comment text-info me-2"></i>
                                <span>Comments: {{ $totalComments }}</span>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-share text-info me-2"></i>
                                <span>Shares: 50</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
