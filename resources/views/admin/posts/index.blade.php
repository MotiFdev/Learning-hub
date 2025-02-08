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
                                <!-- Example Post Row 1 -->
                                <tr>
                                    <td>John Doe</td>
                                    <td>Post Title 1</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-2" title="Edit Post">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete Post">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Example Post Row 2 -->
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Post Title 2</td>
                                    <td>Curabitur pretium tincidunt lacus. Nulla gravida orci a odio.</td>
                                    <td>
                                        <button class="btn btn-sm btn-info me-2" title="Edit Post">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete Post">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- More rows can be added in the same format -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
