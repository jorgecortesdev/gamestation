@extends('layouts.app')

@push('stylesheets')
<link href="{{ asset("css/fullcalendar.min.css") }}" rel="stylesheet">
@endpush

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-calendar"></i> Agenda
        @endslot

        <br>

        <div id='calendar'></div>

    @endcomponent

@endsection

@push('scripts')
<script src="{{ asset("js/moment.min.js") }}"></script>
<script src="{{ asset("js/fullcalendar.min.js") }}"></script>

<script>
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
</script>
@endpush