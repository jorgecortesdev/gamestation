<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block text-danger">* {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
    {!! Form::label('product_id', 'Producto activo', ['class' => 'control-label']) !!}
    {!! Form::select(
        'product_id',
        $products,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Seleccionar --', 'id' => 'products'])
    !!}
    @if ($errors->has('product_id'))
        <span class="help-block text-danger">* {{ $errors->first('product_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('configurable') ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('configurable', true) !!}
            Configurable
        </label>
    </div>
    @if ($errors->has('configurable'))
        <span class="help-block text-danger">* {{ $errors->first('configurable') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('customizable') ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('customizable', true) !!}
            Personalizable
        </label>
    </div>
    @if ($errors->has('customizable'))
        <span class="help-block text-danger">* {{ $errors->first('customizable') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>