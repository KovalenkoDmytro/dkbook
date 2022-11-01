<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">




</head>
<body>

    @yield('content')


    <!-- Scripts -->

    <!-- Time library  -->
    <script type="text/javascript" src="{{ asset('/access/js/Time/moment.js') }}"></script>
    <!-- TimeZone library for get user timezone  -->
    <script type="text/javascript" src="{{ asset('/access/js/Time/moment-timezone-with-data.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
