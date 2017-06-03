@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Proveedor
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del proveedor <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'suppliers.store', 'enctype' => 'multipart/form-data']) !!}
                @include('forms.suppliers')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
