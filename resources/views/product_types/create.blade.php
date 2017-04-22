@extends('layouts.blank')

@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/icheck/skins/flat/green.css") }}">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Agregar Tipo de Producto</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos del tipo de producto <small>(Todos los campos son requeridos)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::open(['route' => 'product_type.store', 'class' => 'form-horizontal form-label-left']) !!}
                        @include('forms.product_type')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    @include('includes.footer')
@endsection

@push('scripts')
<script src="{{ asset("js/icheck.min.js") }}"></script>
@endpush