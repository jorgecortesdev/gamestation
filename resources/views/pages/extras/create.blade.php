@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Extra
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del producto extra <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'extras.store']) !!}
                @include('forms.extras')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
