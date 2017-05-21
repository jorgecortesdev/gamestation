@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Extra</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Datos del producto extra <small>(Todos los campos son requeridos)</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                {!! Form::model($extra, ['route' => ['extra.update', $extra->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                    @include('includes.forms.extra', ['sendButtonText' => 'Actualizar'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div id="gs-qm">
    <quantifiable-manager entity-id="{{ $extra->id }}" entity-type="{{ get_class($extra) }}"></quantifiable-manager>
</div>

@endsection

@push('scripts')
<script>
var app = new Vue({
    el: '#gs-qm'
});
</script>
@endpush