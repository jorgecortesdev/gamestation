@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Paquete</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos del paquete <small>(Todos los campos son requeridos)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::model($combo, ['route' => ['combo.update', $combo->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('forms.combo', ['sendButtonText' => 'Actualizar'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- product manager content -->
        @include('includes.productmanager', ['entity_name' => 'combo', 'entity' => $combo])
        <!-- /product manager content -->

    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->

@endsection
