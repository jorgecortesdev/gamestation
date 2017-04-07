@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Agregar Propiedad</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos de la propiedad <small>(Todos los campos son requeridos)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::open(['route' => 'properties.store', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('forms.properties')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    @include('includes.footer')
@endsection