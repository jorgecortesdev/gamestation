@extends('includes.page.content')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/icheck/skins/flat/green.css") }}">
@endpush

@section('page_content')

@include('includes.page.header', [
     'title'            => 'Evento #' . $event->id,
     'search_route'     => 'events.index'
])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('includes.components.panel.header', [
                'entity' => $event,
                'title' => '',
                'buttons' => ['edit' => 'events.edit', 'back' => 'events.index']
            ])
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        @include('events.cards.info')
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        @include('events.cards.date')
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        @include('events.cards.time')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{-- LEFT --}}
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                @include('events.sections.configurations')
                <div class="clearfix"></div>
                @include('events.sections.properties')
            </div>

            {{-- RIGHT --}}
            <div class="col-md-8 col-sm-8 col-xs-12">
                <gs-statement event-id="{{ $event->id }}"></gs-statement>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<!-- Modal -->
@include('includes.modals.configuration')
@include('includes.modals.property')

@endsection

@push('scripts')
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/icheck.min.js") }}"></script>
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

@push('handlebars')
@include('includes.handlebars.events.configurable')
@include('includes.handlebars.events.property')
@endpush