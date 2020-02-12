const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .styles([
        'resources/css/bootstrap.min.css',
        'resources/css/style.css'
    ], 'public/css/app.css');
