const mix = require('laravel-mix');

mix
    .postCss('resources/css/tailwind.css', 'public/css', [
        require('tailwindcss'),
    ])
    .sass('resources/css/style.scss', 'public/css/style.css')
    .js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/js/script.js',
        'resources/js/home.js',
    ], 'public/js/script.js')
    .vue();


mix.version();
