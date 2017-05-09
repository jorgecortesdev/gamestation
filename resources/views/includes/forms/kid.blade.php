@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2.css") }}">
@endpush

@if (!isset($hide))
<div class="item form-group{{ $errors->has('client_id') ? ' bad' : '' }}">
    {!! Form::label('client_id', 'Cliente', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::select(
            'client_id',
            $clientsSelect,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Selecciona el cliente --', 'id' => 'clientSelect'])
        !!}
    </div>

    @if ($errors->has('client_id'))
        <div class="alert gs-alert">{{ $errors->first('client_id') }}</div>
    @endif
</div>
@endif

<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre del Festejado', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="alert gs-alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('birthday_at') ? ' bad' : '' }}">
    {!! Form::label('birthday_at', 'Cumpleaños', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="input-prepend input-group gs-input-group">
            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
            {!! Form::text('birthday_at', null, ['class' => 'form-control', 'id' => 'birthday_at']) !!}
        </div>
    </div>
    @if ($errors->has('birthday_at'))
        <div class="alert gs-alert">{{ $errors->first('birthday_at') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('sex') ? ' bad' : '' }}">
    {!! Form::label('sex', 'Sexo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="btn-group col-md-6 col-sm-6 col-xs-12" data-toggle="buttons">
        <label class="btn btn-default{{ (!isset($kid) || $kid->sex == 1) ? ' active' : '' }}">{!! Form::radio('sex', '1', true) !!} &nbsp;
<i class="fa fa-mars" aria-hidden="true"></i> Másculino &nbsp;</label>
        <label class="btn btn-default{{ (isset($kid) && $kid->sex == 2) ? ' active' : '' }}">{!! Form::radio('sex', '2') !!} &nbsp; <i class="fa fa-venus" aria-hidden="true"></i> Femenino &nbsp;</label>
    </div>
    @if ($errors->has('sex'))
        <div class="alert gs-alert">{{ $errors->first('sex') }}</div>
    @endif
</div>


@push('scripts')
<script src="{{ asset("js/moment.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/select2.min.js") }}"></script>
<script src="{{ asset("js/gskids.js") }}"></script>
@endpush

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>


