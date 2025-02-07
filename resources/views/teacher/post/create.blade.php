@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <!-- Page Heading -->
                        <h2 class="card-title text-center mb-4 fw-bold">Create a New Post</h2>

                        <!-- Validation Errors -->
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <!-- Create Post Form -->
                        <form action="{{ Route('teacher.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!-- Post Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold ">Post Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    placeholder="Enter post title" value="{{ old('title') }}">

                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Post Content -->
                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Post Content</label>
                                <textarea name="content" id="content" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    rows="6" placeholder="Write your post content here...">{{ old('content') }}</textarea>

                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Create Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
