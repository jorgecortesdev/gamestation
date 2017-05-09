<div class="item form-group{{ $errors->has('label') ? ' bad' : '' }}">
    {!! Form::label('label', 'Etiqueta', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::text('label', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('label'))
        <div class="alert gs-alert">{{ $errors->first('label') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('render_type_id') ? ' bad' : '' }}">
    {!! Form::label('type', 'Tipo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::select(
            'render_type_id',
            $render_types,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('render_type_id'))
        <div class="alert gs-alert">{{ $errors->first('render_type_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('options') ? ' bad' : '' }}">
    {!! Form::label('options', 'Opciones', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::text('options', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('options'))
        <div class="alert gs-alert">{{ $errors->first('options') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>