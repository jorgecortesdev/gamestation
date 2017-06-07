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

                    @include('forms.events.event')

                    @include('forms.events.client')

                    @include('forms.events.kid')

                    <div class="form-group pull-right">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
                        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Actualizar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

    @endcomponent

@endsection
