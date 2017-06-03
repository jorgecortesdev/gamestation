@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Tipo de Producto
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del tipo de producto <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'product-types.store']) !!}
                @include('forms.product-types')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection

