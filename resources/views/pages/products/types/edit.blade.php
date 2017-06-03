@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Tipo de Producto
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del tipo de producto <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($productType, ['route' => ['product-types.update', $productType->id], 'method' => 'PATCH']) !!}
                @include('forms.product-types')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
