@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Cliente
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del cliente <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'clients.store', 'id' => 'frm']) !!}
                @include('forms.clients')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection

