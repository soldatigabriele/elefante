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

mix.scripts([
	'resources/assets/js/app.js',
	'node_modules/selectize/dist/js/selectize.js'
	],'public/js/app.js');

mix.styles([
   	'resources/assets/sass/app.scss', 
   	'node_modules/selectize/dist/css/selectize.css'
   	], 'public/css/front.css');
