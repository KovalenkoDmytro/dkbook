const mix = require('laravel-mix');


mix.js('resources/js/*.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css');
