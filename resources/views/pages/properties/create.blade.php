@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Propiedad
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos de la propiedad <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'properties.store']) !!}
                @include('forms.properties')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
