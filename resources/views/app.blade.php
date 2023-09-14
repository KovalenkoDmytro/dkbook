<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('access/icons/favicon.ico') }}" type="image/x-icon">
    <title inertia>{{ config('app.name', 'HMS') }}</title>

    <!-- Scripts -->
    @routes
    @viteReactRefresh
    @vite([
            'resources/js/app.jsx',
            "resources/js/Pages/{$page['component']}.jsx",
            'resources/scss/app.scss'
            ])
        @inertiaHead
    </head>


    <body>
        <div id="app" class="app" data-page="{{ json_encode($page) }}"></div>
    </body>

</html>
