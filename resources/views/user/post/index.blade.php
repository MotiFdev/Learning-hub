@extends('layouts.app')

@section('content')
    <div class="container py-4">
        @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <div class="avatar-circle bg-primary text-white mr-3">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                        <small class="text-muted">Teacher</small>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
