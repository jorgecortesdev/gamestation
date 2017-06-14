@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar producto
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del producto <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($product, ['route' => ['suppliers.products.update', $supplier->id, $product->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                @include('forms.products', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>


        </div>

    @endcomponent

@endsection
