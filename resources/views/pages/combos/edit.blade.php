@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Paquete
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del paquete <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($combo, ['route' => ['combos.update', $combo->id], 'method' => 'PATCH']) !!}
                @include('forms.combos', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
