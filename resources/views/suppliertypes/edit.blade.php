@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar Tipo de Proveedor</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos del tipo de proveedor <small>(Todos los campos son requeridos)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::model($supplier_type, ['route' => ['supplier_type.update', $supplier_type->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('forms.supplier_type', ['sendButtonText' => 'Actualizar'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    @include('includes.footer')
@endsection
