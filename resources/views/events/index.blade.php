@extends('layouts.blank')

@push('stylesheets')
<link href="{{ asset("css/daterangepicker.css") }}" rel="stylesheet">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Eventos</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agenda Game Station <sup>MX</sup></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

{!! Form::open(['route' => 'calendar.store', 'class' => 'form-horizontal form-label-left']) !!}

    <div class="item has-feedback form-group{{ $errors->has('name') ? ' bad' : '' }}">
        {!! Form::label('name', 'Nombre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('name', null, ['class' => 'form-control has-feedback-right col-md-7 col-xs-12']) !!}
            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
        </div>
        @if ($errors->has('name'))
            <div class="alert">{{ $errors->first('name') }}</div>
        @endif
    </div>

<div class="item form-group{{ $errors->has('combo_id') ? ' bad' : '' }}">
    {!! Form::label('combo_id', 'Tipo', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::select(
            'combo_id',
            $combos,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('combo_id'))
        <div class="alert">{{ $errors->first('combo_id') }}</div>
    @endif
</div>

    <div class="item has-feedback form-group{{ $errors->has('name') ? ' bad' : '' }}">
        {!! Form::label('date', 'Fecha *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::text('date', null, ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'date']) !!}
        </div>
        @if ($errors->has('date'))
            <div class="alert">{{ $errors->first('date') }}</div>
        @endif
    </div>

    <div class="item form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            {!! Form::button('Cancelar', ['class' => 'btn btn-primary', 'type' => 'button']) !!}
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
<script src="{{ asset("js/moment.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/gsevents.js") }}"></script>
@endpush
