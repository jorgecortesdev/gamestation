@extends('layouts.blank')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/smartwizard/smart_wizard.css") }}">
<link rel="stylesheet" href="{{ asset("css/smartwizard/smart_wizard_theme_arrows.css") }}">
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
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
                        <h2>Crear un evento GameStation <sup>MX</sup></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Sigue los pasos para crear un evento.</p>
                        <!-- SmartWizard content -->
                        <div id="smartwizard">
                            <ul>
                                <li>
                                    <a href="#step-1">Paso 1<br /><small>Generales</small></a>
                                </li>
                                <li><a href="#step-2">Paso 2<br /><small>Agenda</small></a></li>
                                <li><a href="#step-3">Paso 3<br /><small>Específicos</small></a></li>
                                <li><a href="#step-4">Paso 4<br /><small>Vista previa</small></a></li>
                            </ul>

                            <div>
                                <div id="step-1" class="">
                                    <div class="row">
                                        {!! Form::open(['route' => 'event.step1', 'id' => 'frmSteps', 'class' => 'form-horizontal form-label-left']) !!}
                                            @include('forms.events.step1')
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div id="step-2" class="">
                                    <div class="row">
                                        {!! Form::open(['route' => 'event.step2', 'id' => 'frmSteps', 'class' => 'form-horizontal form-label-left']) !!}
                                            @include('forms.events.step2')
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div id="step-3" class="">
                                    <div class="row">
                                        {!! Form::open(['route' => 'event.step3', 'id' => 'frmSteps', 'class' => 'form-horizontal form-label-left']) !!}
                                            @include('forms.events.step3')
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div id="step-4" class="">
                                    Step Content
                                </div>
                            </div>
                        </div>
                        <!-- /SmartWizard content -->
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
<script src="{{ asset("js/jquery.smartWizard.js") }}"></script>
<script src="{{ asset("js/gsevents.js") }}"></script>
@endpush
