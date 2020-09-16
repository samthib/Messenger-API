<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Messenger' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/img/logo/message-multiple.ico') }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div {{--id="app"--}}>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('site') }}">
                  <img src="{{ asset('storage/img/logo/message-multiple.png') }}" width="40" height="40" class="d-inline-block align-top mx-4" alt="messages logo">
                    <span class="h1">{{ 'Messenger' }}</span>
                </a>
            </div>
        </nav>

        <main class="bg-info p-md-5 min-vh-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
