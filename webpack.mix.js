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
   .js('resources/js/admin.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css');
// mix.js('resources/js/app.js', 'public/js')
//     .js('resources/js/admin.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sass('resources/sass/admin.scss', 'public/css')
//     .sourceMaps();
// const mix = require('laravel-mix');
// const argv = require('minimist')(process.argv.slice(2));

// const src = {
//   user: {
//     js: 'resources/js/app.js',
//     sass: 'resources/sass/app.scss'
//   },
//   admin: {
//     js: 'resources/js/admin.js',
//     sass: 'resources/sass/admin.scss'
//   }
// }
// const dest = {
//   js: 'public/js',
//   sass: 'public/css'
// }
// // For User
// if (argv.user) {
//     mix.js(src.user.js, dest.js) // Output: public/js/app.js
//        .sass(src.user.sass, dest.sass); // Output: public/css/app.css
// }
// // For Admin
// else if (argv.admin) {
//     mix.js(src.admin.js, dest.js) // Output: public/js/admin.js
//        .sass(src.admin.sass, dest.sass); // Output: public/css/admin.css
// }