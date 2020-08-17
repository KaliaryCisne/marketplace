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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.js([
    'node_modules/inputmask/dist/inputmask.js',
], 'public/js')

mix.js([
    'resources/views/layouts/assets/js/form.js',
], 'public/js');

mix.styles([
    'resources/views/layouts/assets/css/app.css',
    'resources/views/layouts/assets/css/buttons.css',
    'resources/views/layouts/assets/css/table.css',
    'resources/views/layouts/assets/css/single.css',
    'resources/views/layouts/assets/css/form.css',
], 'public/assets/css/styles.css').version();


//npm run dev -> mapeia os asssets para a pasta pública
//npm run production -> mapeia os asssets para a pasta pública de forma mimificada
