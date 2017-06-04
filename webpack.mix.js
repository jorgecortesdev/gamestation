const { mix } = require('laravel-mix');

/**
 * Application assets
 */
mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/gsevents.js', 'public/js')
   .js('resources/assets/js/gskids.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/public.scss', 'public/css');

/**
 * Vendor assets
 */
mix.copy('resources/assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css', 'public/css')
   .copy('resources/assets/vendor/font-awesome-4.7.0/fonts', 'public/fonts');

mix.copy('node_modules/moment/min/moment.min.js', 'public/js');

mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js')
   .copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css');

mix.copy('node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js', 'public/js');

mix.copy('node_modules/daterangepicker/daterangepicker.js', 'public/js')
   .copy('node_modules/daterangepicker/daterangepicker.css', 'public/css');

mix.copy('node_modules/select2/dist/js/select2.full.min.js', 'public/js')
   .copy('node_modules/select2/dist/css/select2.min.css', 'public/css');

mix.copy('node_modules/handlebars/dist/handlebars.min.js', 'public/js');

mix.browserSync('dev.gamestation.mx');