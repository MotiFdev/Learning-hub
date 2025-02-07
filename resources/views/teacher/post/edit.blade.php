@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <!-- Page Heading -->
                        <h2 class="card-title text-center mb-4 fw-bold">Edit Post</h2>

                        <!-- Edit Post Form -->
                        <form action="{{ route('teacher.post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Post Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Post Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    placeholder="Enter post title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Post Content -->
                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Post Content</label>
                                <textarea name="content" id="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                    rows="6" placeholder="Write your post content here...">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
