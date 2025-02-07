<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @vite('resources/css/myapp.css')
</head>

<body>
    <div class="welcome-container">
        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="welcome-content text-center">
            <h1 class="display-4 fw-bold mb-4">Welcome to the Learning Hub</h1>

            <p class="lead mb-5">
                Explore insightful lessons and discussions from your teachers. Engage with content, share your thoughts,
                and enhance your learning experience!
            </p>

            <div class="d-flex justify-content-center gap-3">
                @auth
                    <a href="{{ route('home') }}" class="btn btn-primary btn-custom px-4 py-2 rounded-pill">
                        Explore
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary btn-custom px-4 py-2 rounded-pill">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-custom px-4 py-2 rounded-pill">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
