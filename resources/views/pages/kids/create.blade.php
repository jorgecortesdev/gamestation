@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Agregar Niño
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del niño <small>(Todos los campos son requeridos)</small></h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'kids.store']) !!}
                @include('forms.kids')
                {!! Form::close() !!}
            </div>

        </div>

    @endcomponent

@endsection
