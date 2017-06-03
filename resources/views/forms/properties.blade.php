<div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
    {!! Form::label('label', 'Etiqueta', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
    @if ($errors->has('label'))
    <span class="help-block text-danger">* {{ $errors->first('label') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('render_type_id') ? ' has-error' : '' }}">
    {!! Form::label('type', 'Tipo', ['class' => 'control-label']) !!}
    {!! Form::select(
        'render_type_id',
        $render_types,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
    !!}
    @if ($errors->has('render_type_id'))
        <span class="help-block text-danger">* {{ $errors->first('render_type_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('options') ? ' has-error' : '' }}">
    {!! Form::label('options', 'Opciones', ['class' => 'control-label']) !!}
    {!! Form::text('options', null, ['class' => 'form-control']) !!}
    <span class="help-block">Lista separada por comas, ej.: Opción 1, Opción 2</span>
    @if ($errors->has('options'))
        <span class="help-block text-danger">* {{ $errors->first('options') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>
