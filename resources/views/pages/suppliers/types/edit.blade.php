@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Tipo de Proveedor
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del tipo de proveedor <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($supplierType, ['route' => ['supplier-types.update', $supplierType->id], 'method' => 'PATCH']) !!}
                @include('forms.supplier-types')
                {!! Form::close() !!}
            </div>
        </div>

    @endcomponent

@endsection
