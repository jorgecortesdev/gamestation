@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Tipo de Proveedor
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del tipo de proveedor <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'supplier-types.store']) !!}
                @include('forms.supplier-types')
                {!! Form::close() !!}
            </div>
        </div>

    @endcomponent

@endsection
