<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-uppercase" href="{{ route('welcome') }}">Learning Hub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="{{ route('profile') }}">profile</a>
                </li>
            </ul>
            <!-- Keep Login & Register buttons aligned properly -->
            <div class="d-flex align-items-center ms-auto flex-column flex-lg-row">
                <a class="btn btn-danger px-4 rounded-pill text-white w-100 w-lg-auto"
                    href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
