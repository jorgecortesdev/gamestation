@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Evento
        @endslot

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Datos del evento <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                 {!! Form::open(['route' => 'events.store']) !!}
                    @include('forms.event', ['event' => new App\Event])
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
