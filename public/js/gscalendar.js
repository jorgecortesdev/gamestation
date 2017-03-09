$(document).ready(function() {

    // page is now ready, initialize the calendar...

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