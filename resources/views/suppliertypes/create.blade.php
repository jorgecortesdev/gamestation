@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Agregar Tipo de Proveedor</h3>
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
                {!! Form::open(['route' => 'supplier_type.store', 'class' => 'form-horizontal form-label-left']) !!}
                    @include('includes.forms.supplier_type')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
