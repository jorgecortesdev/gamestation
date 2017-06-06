<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    @if ($errors->has('name'))
    <span class="help-block text-danger">* {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('supplier_id') ? ' has-error' : '' }}">
    {!! Form::label('supplier_id', 'Proveedor', ['class' => 'control-label']) !!}
    {!! Form::select(
        'supplier_id',
        $suppliers,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
    !!}

    @if ($errors->has('supplier_id'))
    <span class="help-block text-danger">* {{ $errors->first('supplier_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
    {!! Form::label('quantity', 'Cantidad', ['class' => 'control-label']) !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}

    @if ($errors->has('quantity'))
    <span class="help-block text-danger">* {{ $errors->first('quantity') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('unity_id') ? ' has-error' : '' }}">
    {!! Form::label('unity_id', 'Unidad', ['class' => 'control-label']) !!}
    {!! Form::select(
        'unity_id',
        $unities,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
    !!}

    @if ($errors->has('unity_id'))
    <span class="help-block text-danger">* {{ $errors->first('unity_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Precio', ['class' => 'control-label']) !!}
    {!! Form::text('price', isset($product) ? null : '0.00', ['class' => 'form-control']) !!}

    @if ($errors->has('price'))
    <span class="help-block text-danger">* {{ $errors->first('price') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('iva') ? ' has-error' : '' }}">
    {!! Form::label('iva', 'Tiene IVA', ['class' => 'control-label']) !!}
    <div class="checkbox">
        <label>
            {!! Form::checkbox('iva', true) !!}
        </label>
    </div>

    @if ($errors->has('iva'))
    <span class="help-block text-danger">* {{ $errors->first('iva') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('product_type_id') ? ' has-error' : '' }}">
    {!! Form::label('product_type_id', 'Tipo de producto', ['class' => 'control-label']) !!}
    {!! Form::select(
        'product_type_id',
        $types,
        null,
        ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
    !!}

    @if ($errors->has('product_type_id'))
    <span class="help-block text-danger">* {{ $errors->first('product_type_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Imágen', ['class' => 'control-label']) !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}

    @if ($errors->has('image'))
    <span class="help-block text-danger">* {{ $errors->first('image') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>
