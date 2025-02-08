@extends('layouts.app')

@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    <div class="container py-4">
        <!-- Page Heading -->
        <div class="mb-5 text-center">
            <h1 class="display-4 fw-bold">My Posts</h1>
            <p class="lead text-muted">This is a list of all my posts.</p>
        </div>

        <!-- Posts List -->
        <div class="row justify-content-center">
            @foreach ($posts as $post)
                <div class="col-md-8 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Post Header with Profile Picture -->
                            <div class="d-flex align-items-center mb-4">
                                <!-- Profile Picture -->
                                <div class="me-3">
                                    @if ($post->user->profile_picture)
                                        <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                            alt="{{ $post->user->name }}" class="rounded-circle"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                            style="width: 50px; height: 50px;">
                                            <span
                                                class="text-white fw-bold">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- User Name and Timestamp -->
                                <div>
                                    <h5 class="mb-0">{{ $post->user->name }}</h5>
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>

                            <!-- Post Title -->
                            <h2 class="card-title mb-3">{{ $post->title }}</h2>

                            <!-- Post Content -->
                            <p class="card-text text-muted mb-4">{{ Str::limit($post->content, 150) }}</p>

                            <!-- Optional: Add a "Read More" Button -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-outline-primary">Read More</a>
                                <a href="{{ route('teacher.post.edit', $post->id) }}"
                                    class="btn btn-outline-success">Edit</a>
                                <form action="{{ route('teacher.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
