const { mix } = require('laravel-mix');

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

// Bootstrap
mix.copy('bower_components/bootstrap/dist/css/bootstrap.css', 'public/css/libs/bootstrap.css');
mix.copy('bower_components/bootstrap/dist/js/bootstrap.js', 'public/js/libs/bootstrap.js');

// Glyphicons
mix.copy('bower_components/bootstrap/dist/fonts', 'public/build/fonts/bootstrap');

// Bootstrap-filestyle
mix.copy('bower_components/bootstrap-filestyle/src/bootstrap-filestyle.js', 'public/js/libs/bootstrap-filestyle.js');

// Jquery-Slimscroll
mix.copy('bower_components/jquery-slimscroll/jquery.slimscroll.js', 'public/js/libs/jquery.slimscroll.js');

// Jquery-Slimscroll
mix.copy('bower_components/fastclick/lib/fastclick.js', 'public/js/libs/fastclick.js');

// AdminLTE
mix.copy('bower_components/adminlte/dist/css/adminlte.css', 'public/css/libs/admin-lte.css');
mix.copy('bower_components/adminlte/dist/css/skins/_all-skins.css', 'public/css/libs/admin-lte-skin.css');
mix.copy('bower_components/adminlte/dist/js/app.js', 'public/js/libs/admin-lte.js');

// Font Awesome
mix.copy('bower_components/font-awesome/css/font-awesome.css', 'public/css/libs/font-awesome.css');
mix.copy('bower_components/font-awesome/fonts', 'public/fonts');

// DataTables
mix.copy('bower_components/datatables.net-bs/css/dataTables.bootstrap.css', 'public/css/libs/datatables.css');
mix.copy('bower_components/datatables.net-bs/js/dataTables.bootstrap.js', 'public/js/libs/datatables.bootstrap.js');
mix.copy('bower_components/datatables.net/js/jquery.dataTables.js', 'public/js/libs/datatables.js');

// SweetAlert
mix.copy('bower_components/sweetalert/dist/sweetalert.css', 'public/css/libs/sweetalert.css');
mix.copy('bower_components/sweetalert/dist/sweetalert.min.js', 'public/js/libs/sweetalert.js');

// Bootstrap Fileinput
mix.copy('bower_components/bootstrap-fileinput/css/fileinput.css', 'public/css/libs/bootstrap-fileinput.css');
mix.copy('bower_components/bootstrap-fileinput/js/fileinput.js', 'public/js/libs/bootstrap-fileinput.js');
mix.copy('bower_components/bootstrap-fileinput/img/loading.gif', 'public/build/img/loading.gif');
mix.copy('bower_components/bootstrap-fileinput/img/loading-sm.gif', 'public/build/img/loading-sm.gif');

// JQuery
mix.copy('bower_components/jquery/dist/jquery.js', 'public/js/libs/jquery.js');

// Merge all CSS files in one file.
mix.combine([
    'public/css/libs/admin-lte.css',
    'public/css/libs/admin-lte-skin.css',
    'public/css/libs/bootstrap.css',
    'public/css/libs/datatables.css',
    'public/css/libs/font-awesome.css',
    'public/css/libs/sweetalert.css',
    'public/css/libs/bootstrap-fileinput.css',
], 'public/css/external.css');

// Merge all JS  files in one file.
mix.combine([
    'public/js/libs/jquery.js',
    'public/js/libs/admin-lte.js',
    'public/js/libs/bootstrap.js',
    'public/js/libs/bootstrap-filestyle.js',
    'public/js/libs/datatables.js',
    'public/js/libs/datatables.bootstrap.js',
    'public/js/libs/fastclick.js',        
    'public/js/libs/jquery.slimscroll.js',
    'public/js/libs/sweetalert.js',
    'public/js/libs/bootstrap-fileinput.js',
], 'public/js/external.js');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// Mix at the end to avoid an issue where only the last 
// version was being adding to the rev-manifest.json
mix.version(['js/app.js', 'css/app.css', 'css/external.css', 'js/external.js']);
