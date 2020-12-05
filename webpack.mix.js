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

mix.js([
    'public/assets/website/js/all.js',
    'public/assets/website/js/jquery.ez-plus.js',
    'public/assets/website/js/creditCardValidator.js',
    'public/assets/website/js/stripe.js',
    'public/assets/website/js/scripts.js'
], 'public/js/script.js').version();