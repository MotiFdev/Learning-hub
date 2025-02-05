<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/myapp.css')
</head>

<body>
    <div class="auth-container container-fluid">
        <div class="row g-0 h-100">
            <!-- Wider Form Column -->
            <div class="col-12 col-lg-7 d-flex align-items-center justify-content-center">
                <div class="auth-form-wrapper" style="max-width: 600px; width: 100%">
                    <div class="auth-brand">
                        <i class="fa-solid fa-school auth-brand-icon"></i>
                        Learning Hub
                    </div>

                    <form class="auth-form">
                        <h2 class="mb-4 fw-bold">Create Your Account</h2>

                        <div class="row g-4">
                            <!-- Name Input -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="John Doe">
                                    <label for="name">Full Name</label>
                                </div>
                            </div>

                            <!-- Email Input -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>
                            </div>

                            <!-- Password Inputs -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="password-requirements">
                                    Must be at least 8 characters
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="confirm-password"
                                        placeholder="Confirm Password">
                                    <label for="confirm-password">Confirm Password</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn auth-action-btn w-100 mt-4 mb-3">
                            Sign Up
                        </button>

                        <!-- Additional Links -->
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <span class="text-secondary small">Already have an account?</span>
                            <a href="{{ route('login') }}"
                                class="text-decoration-none text-primary fw-medium small ms-2">
                                Log In
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Narrower Image Column -->
            <div class="col-lg-5 px-0 d-none d-lg-block aauth-illustration">
                <img src="https://images.unsplash.com/photo-1584697964358-3e14ca57658b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Registration image" class="w-100 vh-100"
                    style="object-fit: cover; object-position: center left;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
