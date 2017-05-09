@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Agregar Niño</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Datos del niño <small>(Todos los campos son requeridos)</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                {!! Form::open(['route' => 'kid.store', 'class' => 'form-horizontal form-label-left']) !!}
                    @include('includes.forms.kid')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
