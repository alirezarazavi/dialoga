let mix = require('laravel-mix');

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

// mix.autoload({
// 	jQuery: 'jquery',
// 	$: 'jquery',
// 	jquery: 'jquery'
// });


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// mix.scripts([
// 	'resources/assets/js/main.js',
// ], 'public/main.js');

// mix.js('resources/assets/js/script.js', 'public/js');
