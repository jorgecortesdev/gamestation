@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar producto
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del producto <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'products.store', 'enctype' => 'multipart/form-data']) !!}
                @include('forms.products')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
