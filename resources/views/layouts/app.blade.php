<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Links -->
    <link rel="stylesheet" href="{{ asset('material-icon/css/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-default.css') }}">

    @yield('links')
</head>
<body>

    <div id="app" class="app">
        @yield('main')
    </div>

    <script src="{{ asset('js/scripts-default.js') }}"></script>
    @yield('scripts')

</body>
</html>
