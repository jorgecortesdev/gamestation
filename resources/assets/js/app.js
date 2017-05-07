require('./bootstrap');

// window.Vue = require('vue');

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