
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });


/**
 * Full Calendar
 */
$(document).ready(function() {
    if( typeof ($.fn.fullCalendar) === 'undefined') { return; }

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        events: '/calendar',
        defaultView: 'agendaWeek',
        contentHeight: 665,
        weekNumberCalculation: 'ISO',
        minTime: '09:00:00',
        maxTime: '21:00:00'
    });
});

/**
 * Combo pages
 */
function clearCheckboxes() {
    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    $.each(elements, function(index, item) {
        $(item).children('i').hide();
    });
}

function init_ColorCheckbox() {
    var input = $('#google_color_id');

    if (input.length <= 0) { return; }

    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    clearCheckboxes();

    $.each(elements, function(index, item) {
        $(item).on('click', function(e) {
            input.val(index);
            clearCheckboxes();
            $(this).children('i').toggle();
        });
    });

    var currentValue = input.val();

    if (!currentValue.trim()) {
        $(elements[0]).children('i').show();
    } else {
        $(elements[currentValue]).children('i').show();
    }
}

$(document).ready(function() {
    init_ColorCheckbox();
});