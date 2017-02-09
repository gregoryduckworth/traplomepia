const { mix } = require('laravel-mix');
const folder = 'node_modules/';

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

// Glyphicons
mix.copy(folder + 'bootstrap/dist/fonts', 'public/fonts');

// Font Awesome
mix.copy(folder + 'font-awesome/fonts', 'public/fonts');

// Bootstrap Fileinput
mix.copy(folder + 'bootstrap-fileinput/img/loading.gif', 'public/img/loading.gif');
mix.copy(folder + 'bootstrap-fileinput/img/loading-sm.gif', 'public/img/loading-sm.gif');

// Merge all CSS files in one file.
mix.combine([
    folder + 'admin-lte/dist/css/AdminLTE.css',
    folder + 'admin-lte/dist/css/skins/_all-skins.css',
    folder + 'bootstrap/dist/css/bootstrap.css',
    folder + 'datatables.net-bs/css/dataTables.bootstrap.css',
    folder + 'font-awesome/css/font-awesome.css',
    folder + 'sweetalert/dist/sweetalert.css',
    folder + 'bootstrap-fileinput/css/fileinput.css',
], 'public/css/external.css');//.extract(['vendors']);

// Merge all JS  files in one file.
mix.combine([
    folder + 'jquery/dist/jquery.js',    
    folder + 'bootstrap/dist/js/bootstrap.js',
    folder + 'bootstrap-fileinput/js/fileinput.js',
    folder + 'jquery-slimscroll/jquery.slimscroll.js',    
    folder + 'datatables/media/js/jquery.dataTables.js',
    folder + 'datatables.net-bs/js/dataTables.bootstrap.js',
    folder + 'admin-lte/dist/js/app.js',
    folder + 'fastclick/lib/fastclick.js',
    folder + 'sweetalert/dist/sweetalert.min.js',
    folder + 'bootstrap-fileinput/js/fileinput.js',
], 'public/js/external.js');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();
