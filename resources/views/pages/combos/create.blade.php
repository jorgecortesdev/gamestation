@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Paquete
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del paquete <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'combos.store']) !!}
                @include('forms.combos')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
