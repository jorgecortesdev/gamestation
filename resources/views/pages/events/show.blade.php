@extends('layouts.app')

{{-- @push('stylesheets')

@endpush --}}

@section('content')

    @component('components.page')
        @slot('heading')
            Evento # {{ $event->id }}
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Titulo</h3>
            </div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4">
                        @include('pages.events.cards.info')
                    </div>
                    <div class="col-md-4">
                        @include('pages.events.cards.date')
                    </div>
                    <div class="col-md-4">
                        @include('pages.events.cards.time')
                    </div>
                </div>

                <br>

                <div class="row">

                    <div class="col-md-4">
                        @include('pages.events.sections.configurations')
                        @include('pages.events.sections.properties')
                    </div>

                    <div class="col-md-8">
                        <gs-statement event-id="{{ $event->id }}"></gs-statement>
                    </div>

                </div>

            </div>

        </div>

    @endcomponent

@endsection

@push('scripts')
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script>
Handlebars.registerHelper({
    eq: function (v1, v2) {
        return v1 === v2;
    },
    ne: function (v1, v2) {
        return v1 !== v2;
    }
});
</script>
@endpush

@push('modals')
@include('modals.configuration')
@include('modals.property')
@endpush

@push('handlebars')
@include('handlebars.events.configurable')
@include('handlebars.events.property')
@endpush