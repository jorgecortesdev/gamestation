@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Evento # {{ $event->id }}
        @endslot

        @slot('buttons')
            <a href="{{ route('events.edit', [$event->id]) }}" class="btn btn-primary">
                <i class="fa fa-fw fa-edit"></i> Editar
            </a>
            <a href="{{ route('events.index') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-arrow-left"></i> Volver
            </a>
        @endslot

        <div class="panel panel-default">
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

                    <div class="col-md-6">
                        <event-configurables event-id="{{ $event->id }}"></event-configurables>
                    </div>

                    <div class="col-md-6">
                        @include('pages.events.sections.properties')
                    </div>

                </div>

                <br>

                <div class="row">

                    <div class="col-md-12">
                        <event-statement event-id="{{ $event->id }}"></event-statement>
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
@include('modals.property')
@endpush

@push('handlebars')
@include('handlebars.events.property')
@endpush