<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

    </style>
    @vite('resources/css/myapp.css')
</head>

<body>
    <div class="auth-container container-fluid">
        <div class="row g-0 h-100">
            <!-- Left Form Column -->
            <div class="col-12 col-lg-6 d-flex align-items-center">
                <div class="auth-form-wrapper w-100">
                    <div class="auth-brand">
                        <i class="fa-solid fa-school auth-brand-icon"></i>
                        Learning Hub
                    </div>

                    <form class="auth-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="mb-4 fw-bold">Welcome Back</h2>

                        <!-- Email Input -->
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="name@example.com">
                            <label for="email">Email address</label>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password">
                            <label for="password">Password</label>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- invalid credentials --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <button type="submit" class="btn auth-action-btn w-100 mb-3">
                            Sign In
                        </button>

                        <!-- Additional Links -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="#!" class="text-decoration-none text-secondary small">Forgot password?</a>
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-medium small">
                                Create Account
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Right Illustration Column -->
            <div class="col-sm-6 px-0 d-none d-lg-block aauth-illustration">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1532&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
