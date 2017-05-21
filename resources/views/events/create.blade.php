@extends('includes.page.content')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
<link rel="stylesheet" href="{{ asset("css/icheck/skins/flat/green.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2.css") }}">
@endpush

@section('page_content')

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
                <h2>Crear un evento GameStation <sup>MX</sup></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                {!! Form::open(['route' => 'events.store', 'id' => 'frm', 'class' => 'form-horizontal form-label-left']) !!}

                    @include('includes.forms.events.event')

                    @include('includes.forms.events.client')

                    @include('includes.forms.events.kid')

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

@endsection

@push('scripts')
<script src="{{ asset("js/icheck.min.js") }}"></script>
<script src="{{ asset("js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/jquery.inputmask.bundle.js") }}"></script>
<script src="{{ asset("js/moment.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/gsevents.js") }}"></script>
@endpush
