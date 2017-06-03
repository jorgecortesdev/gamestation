@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Editar Cliente
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del cliente <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::model($client, ['route' => ['clients.update', $client->id], 'id' => 'frm', 'method' => 'PATCH']) !!}
                @include('forms.clients', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection

