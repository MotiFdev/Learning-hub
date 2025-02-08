@extends('layouts.admin')

@section('content')
    <!-- Page Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Posts</h1>
    </div>

    <!-- Posts Table Section -->
    <div class="row mt-4">
        <div class="col-12">
            <!-- Posts List Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
                </div>
                <div class="card-body">
                    <!-- Posts Table -->
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Post Row 2 -->
                                @foreach ($posts as $post)
                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <tr>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ Str::limit($post->content, 20) }}</td>
                                            <td>
                                                <a href="{{ route('admin.post.edit', $post->id) }}"
                                                    class="btn btn-sm btn-info me-2" title="Edit Post">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger" title="Delete Post"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                <!-- More rows can be added in the same format -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
