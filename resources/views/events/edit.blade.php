 @extends('layouts.blank')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
<link rel="stylesheet" href="{{ asset("css/icheck/skins/flat/green.css") }}">
<link rel="stylesheet" href="{{ asset("css/dragula.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2.css") }}">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-calendar-o"></i> Eventos</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar un evento GameStation <sup>MX</sup></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::model($event, ['route' => ['events.update', $event->id], 'id' => 'frm', 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}

                            @include('forms.events.event')

                            @include('forms.events.client')

                            @include('forms.events.kid')

                            @include('forms.events.configurables')


{{--                             @include('forms.events.extras')

                            @include('forms.events.properties')
 --}}
                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
                                    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection

@push('scripts')
<script src="{{ asset("js/icheck.min.js") }}"></script>
<script src="{{ asset("js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/jquery.inputmask.bundle.js") }}"></script>
<script src="{{ asset("js/moment.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/dragula.js") }}"></script>
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/gsevents.js") }}"></script>
@endpush
