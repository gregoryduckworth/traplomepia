var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 *      INSTALL DEPENDENCIES
 *      bower install admin-lte --save
 *      bower install font-awesome --save
 *      bower install datatables.net --save
 *      bower install datatables.net-bs --save
 *      bower install jquery --save
 *      bower install bootstrap-filesystem --save
 *      bower install jquery-slimscroll --save
 *      bower install fastclick --save
 *      bower install sweetalert --save
 *      bower install bootstrap-fileinput --save
 *
 */

elixir(function(mix) {

    mix.sass(['app.scss']);
    mix.scripts(['app.js']);

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
    mix.copy('bower_components/font-awesome/fonts', 'public/build/fonts');

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
    mix.styles([
        '/libs/admin-lte.css',
        '/libs/admin-lte-skin.css',
        '/libs/bootstrap.css',
        '/libs/datatables.css',
        '/libs/font-awesome.css',
        '/libs/sweetalert.css',
        '/libs/bootstrap-fileinput.css',
    ], 'public/css/external.css', 'public/css');

    // Merge all JS  files in one file.
    mix.scripts([
        '/libs/jquery.js',
        
        '/libs/admin-lte.js',
        '/libs/bootstrap.js',
        '/libs/bootstrap-filestyle.js',
        '/libs/datatables.js',
        '/libs/datatables.bootstrap.js',
        '/libs/fastclick.js',        
        '/libs/jquery.slimscroll.js',
        '/libs/sweetalert.js',
        '/libs/bootstrap-fileinput.js',
    ], 'public/js/external.js', 'public/js');

    // Mix at the end to avoid an issue where only the last 
    // version was being adding to the rev-manifest.json
    mix.version(['js/all.js','css/app.css', 'css/external.css', 'js/external.js']);

});