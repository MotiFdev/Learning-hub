@extends('layouts.app')


@section('content')
    {{-- sucess message --}}
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif

    <div class="py-4">
        <div class="profile-container">
            <!-- Profile Header -->
            <div class="profile-header">
                <h1 class="display-6 mb-0">Account Settings</h1>
            </div>

            <!-- Profile Content -->
            <div class="profile-card">
                <div class="card-body p-4">
                    <!-- Avatar -->

                    <!-- Account Info Form -->
                    <form class="mb-5" method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="profile-avatar">
                            <h4 class="mb-4 fw-bold">Personal Information</h4>
                        </div>

                        <!-- Display Name -->
                        <div class="form-floating mb-4">
                            <input type="text" name="name" class="form-control" id="displayName"
                                value="{{ Auth::user()->name }}" placeholder="Display Name">
                            <label for="displayName">Display Name</label>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email (Readonly) -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="email" value={{ Auth::user()->email }}
                                placeholder="Email" readonly>
                            <label for="email">Email Address</label>
                        </div>

                        <button type="submit" class="btn auth-action-btn">
                            Save Changes
                        </button>
                    </form>

                    <!-- Password Update Form -->
                    <form class="mb-5" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <h4 class="mb-4 fw-bold">Password Settings</h4>

                        <!-- Current Password -->
                        <div class="form-floating mb-4">
                            <input type="password" name="current_password" class="form-control" id="currentPassword"
                                placeholder="Current Password">
                            <label for="currentPassword">Current Password</label>
                            @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="newPassword"
                                placeholder="New Password">
                            <label for="newPassword">New Password</label>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="form-floating mb-4">
                            <input type="password" name="password_confirmation" class="form-control" id="confirmPassword"
                                placeholder="Confirm New Password">
                            <label for="confirmPassword">Confirm New Password</label>
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (session('success'))
                            <x-alert :message="session('success')" />
                        @endif
                        <button type="submit" class="btn auth-action-btn">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
