@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
            <button class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Users
            </button>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Create User Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Enter full name" required>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter email address" required>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Enter password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleBtn">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Role Field -->
                            <div class="mb-4">
                                <label class="form-label">Role</label>
                                <select class="form-select" required>
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <!-- Form Actions -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-user-plus me-2"></i>Create User
                                </button>
                                <button type="reset" class="btn btn-light">
                                    Clear Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
