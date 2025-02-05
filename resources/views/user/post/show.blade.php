@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- Post Card -->
        <div class="card post-card mb-4 border-0 shadow-lg">
            <div class="card-header bg-white border-bottom-0 pb-0 ">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar-circle bg-primary text-white mr-3">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                        <small class="text-muted">Teacher • {{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <h1 class="display-6 mb-3">{{ $post->title }}</h1>
                <div class="post-content lead mb-4">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Posts
                    </a>
                    <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-wrapper">
            <h3 class="mb-4 font-weight-light">
                Discussion
                <span class="badge badge-pill badge-primary">{{ $post->comments->count() }}</span>
            </h3>
            <!-- Add Comment Form -->
            <div class="card comment-form-card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('comment.store', $post->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-0">
                            <label for="content" class="sr-only">Add a comment</label>
                            <textarea name="content" id="content" class="form-control comment-input mt-2" rows="3"
                                placeholder="Join the discussion..." style="resize: none;"></textarea>

                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                Post Comment
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Comments List -->
            @forelse ($post->comments->sortByDesc('created_at') as $comment)
                <div class="card comment-card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-3  ">
                            <div class="avatar-circle-sm bg-secondary text-white mr-3">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-0 text-muted">{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-light text-center py-4">
                    <i class="far fa-comments fa-2x mb-3 text-muted"></i>
                    <p class="text-muted mb-0">No comments yet. Start the conversation!</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
