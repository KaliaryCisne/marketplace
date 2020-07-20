const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/views/layouts/assets/css/style.css'
], 'public/assets/css/styles.css').version();


//npm run dev -> mapeia os asssets para a pasta pública
//npm run production -> mapeia os asssets para a pasta pública de forma mimificada
