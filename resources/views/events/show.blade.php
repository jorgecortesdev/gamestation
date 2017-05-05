@extends('layouts.blank')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/icheck/skins/flat/green.css") }}">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        @include('includes/page-header', [
             'title'            => 'Evento #' . $event->id,
             'search_route'     => 'events.index'
        ])

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('includes.panel-header', [
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

            <div class="clearfix"></div>

            @include('events.configurations')
            @include('events.statement')

            <div class="clearfix"></div>

            @include('events.properties')

            <div class="clearfix"></div>

        </div>


    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.configuration')

    <!-- handlebars template -->
    @include('handlebars.events.configurable')
    <!-- /handlebars template -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection

@push('scripts')
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/icheck.min.js") }}"></script>
@endpush