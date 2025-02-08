@extends('layouts.admin')

@section('content')
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Post</h1>
        <a href="#" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Posts
        </a>
    </div>

    <!-- Edit Post Form Section -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Edit Post Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Post Information</h6>
                </div>
                <div class="card-body">
                    <!-- Post Edit Form -->
                    <form action="#" method="POST">
                        <!-- CSRF token placeholder -->
                        <input type="hidden" name="_token" value="CSRF_TOKEN">

                        <!-- Post Title Field -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" value=""
                                placeholder="Enter post title" required>
                        </div>

                        <!-- Post Content Field -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter post content" required></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                            <button type="reset" class="btn btn-light">
                                <i class="fas fa-refresh me-2"></i>Clear Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
