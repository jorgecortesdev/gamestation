@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Extra
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del producto extra <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($extra, ['route' => ['extras.update', $extra->id], 'method' => 'PATCH']) !!}
                @include('forms.extras', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>
        </div>

        <quantifiable-manager entity-id="{{ $extra->id }}" entity-type="{{ get_class($extra) }}"></quantifiable-manager>

    @endcomponent

@endsection
