@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Evento # {{ $event->id }}
        @endslot

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Datos del evento <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'PATCH']) !!}
                    @include('forms.event')
                {!! Form::close() !!}
            </div>
        </div>

        <quantifiable-manager entity-id="{{ $event->id }}" entity-type="{{ get_class($event) }}"></quantifiable-manager>

    @endcomponent

@endsection
