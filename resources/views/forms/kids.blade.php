@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2-bootstrap.min.css") }}">
@endpush

<div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
    {!! Form::label('client_id', 'Cliente', ['class' => 'control-label']) !!}
    {!! Form::select(
        'client_id',
        $clientsSelect,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Selecciona el cliente --', 'id' => 'client_id'])
    !!}

    @if ($errors->has('client_id'))
    <span class="help-block text-danger">*  {{ $errors->first('client_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre del Festejado', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    @if ($errors->has('name'))
    <span class="help-block text-danger">*  {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('birthday_at') ? ' has-error' : '' }}">
    {!! Form::label('birthday_at', 'Cumpleaños', ['class' => 'control-label']) !!}
    <div class="input-prepend input-group gs-input-group">
        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
        {!! Form::text('birthday_at', null, ['class' => 'form-control', 'id' => 'birthday_at']) !!}
    </div>

    @if ($errors->has('birthday_at'))
        <span class="help-block text-danger">*  {{ $errors->first('birthday_at') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
    {!! Form::label('sex', 'Sexo', ['class' => 'control-label']) !!}
    <div class="btn-group btn-block" data-toggle="buttons">
        <label class="btn btn-default{{ (!isset($kid) || $kid->sex == 1) ? ' active' : '' }}">
        {!! Form::radio('sex', '1', true) !!} &nbsp; <i class="fa fa-fw fa-mars" aria-hidden="true"></i> Másculino &nbsp;</label>
        <label class="btn btn-default{{ (isset($kid) && $kid->sex == 2) ? ' active' : '' }}">
        {!! Form::radio('sex', '2') !!} &nbsp; <i class="fa fa-fw fa-venus" aria-hidden="true"></i> Femenino &nbsp;</label>
    </div>

    @if ($errors->has('sex'))
    <span class="help-block text-danger">*  {{ $errors->first('sex') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>

@push('scripts')
<script src="{{ asset("js/moment.min.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/gskids.js") }}"></script>
@endpush