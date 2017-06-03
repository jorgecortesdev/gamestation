@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Proveedor
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del proveedor <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($supplier, ['route' => ['suppliers.update', $supplier->id], 'enctype' => 'multipart/form-data', 'method' => 'PATCH']) !!}
                @include('forms.suppliers', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
