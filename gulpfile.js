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

// Gentelella vendors path : vendor/bower_components/gentelella/vendors

elixir(function(mix) {

    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

    // PNotify
    mix.copy('vendor/bower_components/gentelella/vendors/pnotify/dist/pnotify.css', 'public/css/pnotify.css');

    // FullCalendar
    mix.copy('vendor/bower_components/gentelella/vendors/fullcalendar/dist/fullcalendar.min.css', 'public/css/fullcalendar.min.css');

    // Date Range Picker
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css', 'public/css/daterangepicker.css');

    // Dragula
    mix.copy('vendor/bower_components/dragula.js/dist/dragula.css', 'public/css/dragula.css');

    // Select2
    mix.copy('vendor/bower_components/gentelella/vendors/select2/dist/css/select2.css', 'public/css/select2.css');

    // iCheck
    mix.copy('vendor/bower_components/gentelella/vendors/iCheck/skins/flat', 'public/css/icheck/skins/flat');

    /****************/
    /* Copy Scripts */
    /****************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

    // jQuery
    mix.copy('vendor/bower_components/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

    // Gentelella
    // mix.copy('vendor/bower_components/gentelella/build/js/custom.js', 'public/js/gentelella.js');

    // PNotify
    mix.copy('vendor/bower_components/gentelella/vendors/pnotify/dist/pnotify.js', 'public/js/pnotify.js');

    // Moment
    mix.copy('vendor/bower_components/gentelella/vendors/moment/moment.js', 'public/js/moment.js');

    // FullCalendar
    mix.copy('vendor/bower_components/gentelella/vendors/fullcalendar/dist/fullcalendar.min.js', 'public/js/fullcalendar.min.js');

    // Date Range Picker
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js', 'public/js/daterangepicker.js');

    // Dragula
    mix.copy('vendor/bower_components/dragula.js/dist/dragula.js', 'public/js/dragula.js');

    // Handlebars
    mix.copy('vendor/bower_components/handlebars/handlebars.min.js', 'public/js/handlebars.min.js');

    // jquery.inputmask
    mix.copy('vendor/bower_components/gentelella/vendors/jquery.inputmask/dist/jquery.inputmask.bundle.js', 'public/js/jquery.inputmask.bundle.js');

    // Select2
    mix.copy('vendor/bower_components/gentelella/vendors/select2/dist/js/select2.full.min.js', 'public/js/select2.full.min.js');

    // iCheck
    mix.copy('vendor/bower_components/gentelella/vendors/iCheck/icheck.min.js', 'public/js/icheck.min.js');

    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/fonts/', 'public/fonts');
});
