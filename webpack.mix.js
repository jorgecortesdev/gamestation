const { mix } = require('laravel-mix');

let paths = {
    'gentelella' : 'vendor/bower_components/gentelella/vendors',
    'bower'      : 'vendor/bower_components'
}

/**
 * Scrips
 */
let jsFiles = {
    [paths.gentelella + '/bootstrap/dist/js/bootstrap.min.js'] : 'public/js/bootstrap.min.js',
    [paths.gentelella + '/jquery/dist/jquery.min.js'] : 'public/js/jquery.min.js',
    [paths.gentelella + '/pnotify/dist/pnotify.js'] : 'public/js/pnotify.js',
    [paths.gentelella + '/moment/moment.js'] : 'public/js/moment.js',
    [paths.gentelella + '/fullcalendar/dist/fullcalendar.min.js'] : 'public/js/fullcalendar.min.js',
    [paths.gentelella + '/bootstrap-daterangepicker/daterangepicker.js'] : 'public/js/daterangepicker.js',
    [paths.gentelella + '/jquery.inputmask/dist/jquery.inputmask.bundle.js'] : 'public/js/jquery.inputmask.bundle.js',
    [paths.gentelella + '/select2/dist/js/select2.full.min.js'] : 'public/js/select2.full.min.js',
    [paths.gentelella + '/iCheck/icheck.min.js'] : 'public/js/icheck.min.js',
    [paths.bower + '/handlebars/handlebars.min.js'] : 'public/js/handlebars.min.js'
}

for (file in jsFiles) {
    mix.copy(file, jsFiles[file]);
}

mix.js('resources/assets/js/app.js', 'public/js');

/**
 * Styles
 */
let cssFiles = {
        [paths.gentelella + '/bootstrap/dist/css/bootstrap.min.css'] : 'public/css/bootstrap.min.css',
        [paths.gentelella + '/font-awesome/css/font-awesome.min.css'] : 'public/css/font-awesome.min.css',
        [paths.gentelella + '/pnotify/dist/pnotify.css'] : 'public/css/pnotify.css',
        [paths.gentelella + '/fullcalendar/dist/fullcalendar.min.css'] : 'public/css/fullcalendar.min.css',
        [paths.gentelella + '/bootstrap-daterangepicker/daterangepicker.css'] : 'public/css/daterangepicker.css',
        [paths.gentelella + '/select2/dist/css/select2.css'] : 'public/css/select2.css',
        [paths.gentelella + '/iCheck/skins/flat'] : 'public/css/icheck/skins/flat',
        [paths.bower + '/gentelella/build/css/custom.min.css'] : 'public/css/gentelella.min.css',
}

for (file in cssFiles) {
    mix.copy(file, cssFiles[file]);
}

mix.sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/public.scss', 'public/css');

/**
 * Fonts
 */
let fontFiles = {
    [paths.gentelella + '/bootstrap/fonts'] : 'public/fonts',
    [paths.gentelella + '/font-awesome/fonts'] : 'public/fonts'
}

for (file in fontFiles) {
    mix.copy(file, fontFiles[file]);
}

/**
 * Version
 */
if (mix.config.inProduction) {
    mix.version();
}
