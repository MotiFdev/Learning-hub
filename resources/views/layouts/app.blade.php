<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    @vite('resources/css/myapp.css')
</head>

<body class="bg-light {{ $bodyClasses ?? '' }}">
    @unless (isset($hideHeader) && $hideHeader)
        <header>
            <x-navbar />
        </header>
    @endunless

    <main class="container py-4">
        <div class="content-wrapper {{ $contentClasses ?? '' }}">
            @yield('content')
        </div>
    </main>

    @unless (isset($hideFooter) && $hideFooter)
        <footer>
            <x-footer />
        </footer>
    @endunless

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>
