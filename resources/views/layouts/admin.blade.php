<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    @vite('resources/css/admin.css')
    @vite('resources/js/app.js')
</head>

<body class="d-flex flex-column min-vh-100">
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple"
                        aria-current="true">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                    </a>

                    <a href="{{ route('admin.post.create') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-edit fa-fw me-3"></i><span>Create Post</span>
                    </a>
                    <a href="{{ route('admin.user.create') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-user-plus me-3"></i><span>Add New User</span>
                    </a>
                    <a href="{{ route('admin.post.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-cogs me-3"></i><span>Manage Posts</span>
                    </a>
                    <a href="{{ route('admin.show.users') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-users-cog me-3"></i><span>Manage Users</span>
                    </a>
                    <a href="{{ route('admin.show.teachers') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-chalkboard-teacher me-3"></i><span>Manage Teachers</span>
                    </a>
                    <a href="{{ route('admin.show.admins') }}"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-shield-alt me-3"></i><span>Manage Admins</span>
                    </a>

                    {{-- return to home page --}}
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-home me-3"></i><span>Main Page</span>
                    </a>

                    <!-- Rest of the menu items -->
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="https://ssdweb.in/wp-content/uploads/2023/08/google-Admin-console.png" height="50"
                        alt="MDB Logo" loading="lazy" />
                </a>

                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Some news</a></li>
                            <li><a class="dropdown-item" href="#">Another news</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
                                height="22" alt="Avatar" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <p class="dropdown-item text-center text-success">{{ Auth::user()->name }}</p>
                            </li>
                            <li><a class="dropdown-item" href=""
                                    style="pointer-events: none; cursor: default; color: #6c757d;">My profile</a></li>
                            <li><a class="dropdown-item" href=""
                                    style="pointer-events: none; cursor: default; color: #6c757d;">Settings</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px; margin-bottom: 4rem;" class="flex-grow-1">
        <div class="container pt-4">
            <!-- Your content here -->
            @yield('content')
        </div>
    </main>
    <!--Main layout-->

    <!-- Add this just before the closing </body> tag -->
    <footer class="bg-dark text-white mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>About Us</h5>
                    <p class="text-muted">Admin Portal for Content Management</p>
                    <p class="text-muted small">&copy; 2023 Your Company Name. All rights reserved.</p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Terms of Service</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope me-2"></i> admin@example.com</li>
                        <li><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
