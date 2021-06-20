<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4 text-center">@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
