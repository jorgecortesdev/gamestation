@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Unidad
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos de la unidad <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'unities.store']) !!}
                @include('forms.unity')
                {!! Form::close() !!}
            </div>
        </div>

    @endcomponent

@endsection