@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <div class="container">
            <x-alert :message="session('success')" :type="'success'" />
        </div>
    @endif
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <button class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50 me-2"></i>Generate Report
            </button>
        </div>

        <!-- Stats Cards Row -->
        <div class="row g-4 mb-4">
            <!-- Users Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1">Total Users</h6>
                                <h4 class="mb-0">{{ $user_totals }}</h4>
                                <div class="small text-success mt-1">
                                    <i
                                        class="{{ $percentageIncreaseUsers > 0 ? 'fas fa-arrow-up me-1' : 'fas fa-arrow-down me-1' }}"></i>{{ $percentageIncreaseUsers }}%
                                    increase
                                </div>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="fas fa-users text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teachers Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1">Total Teachers</h6>
                                <h4 class="mb-0">{{ $teacher_totals }}</h4>
                                <div class="small text-success mt-1">
                                    <i
                                        class="{{ $percentageIncreaseTeachers > 0 ? 'fas fa-arrow-up me-1' : 'fas fa-arrow-down me-1' }}"></i>{{ $percentageIncreaseTeachers }}%
                                    increase
                                </div>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded">
                                <i class="fas fa-chalkboard-teacher text-success fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admins Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1">Total Admins</h6>
                                <h4 class="mb-0">{{ $admin_totals }}</h4>
                                <div class="small text-warning mt-1">
                                    <i class="fas fa-minus me-1"></i>No change
                                </div>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded">
                                <i class="fas fa-user-shield text-info fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Card -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted mb-1">Total Posts</h6>
                                <h4 class="mb-0">{{ $post_totals }}</h4>
                                <div class="small text-success mt-1">
                                    <i
                                        class="{{ $percentageIncreasePosts > 0 ? 'fas fa-arrow-up me-1' : 'fas fa-arrow-down me-1' }}"></i>{{ $percentageIncreasePosts }}%
                                    increase
                                </div>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="fas fa-file-alt text-warning fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="row g-4">
            <!-- Manage Users Section -->
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Users</h6>
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-2"></i>Add New User
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            {{-- <td><span class="badge bg-success">Active</span></td> --}}
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="btn btn-sm btn-info me-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            @foreach ($recent_activities as $recent_activity)
                                <div class="timeline-item mb-3 d-flex">
                                    <div class="timeline-icon me-3 bg-primary bg-opacity-10 p-2 rounded">
                                        <i
                                            class="{{ $recent_activity->icon_type }} text-{{ $recent_activity->color_type }}"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1"><strong> {{ $recent_activity->activity_type }} </strong></p>
                                        <p class="text-muted small mb-0">{{ $recent_activity->details }}</p>
                                        <span
                                            class="text-muted smaller">{{ $recent_activity->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="timeline-item mb-3 d-flex">
                            {{ $recent_activities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
