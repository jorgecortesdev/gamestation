@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Proveedor</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Datos del proveedor <small>(Todos los campos son requeridos)</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                 {!! Form::model($supplier, ['route' => ['supplier.update', $supplier->id], 'id' => 'frm', 'enctype' => 'multipart/form-data', 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                    @include('includes.forms.supplier', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection