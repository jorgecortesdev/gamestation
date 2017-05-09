<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="alert gs-alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('supplier_id') ? ' bad' : '' }}">
    {!! Form::label('supplier_id', 'Proveedor', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::select(
            'supplier_id',
            $suppliers,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('supplier_id'))
        <div class="alert gs-alert">{{ $errors->first('supplier_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('quantity') ? ' bad' : '' }}">
    {!! Form::label('quantity', 'Cantidad', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-1 col-sm-1 col-xs-12">
        {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('quantity'))
        <div class="alert gs-alert">{{ $errors->first('quantity') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('unity_id') ? ' bad' : '' }}">
    {!! Form::label('unity_id', 'Unidad', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::select(
            'unity_id',
            $unities,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('unity_id'))
        <div class="alert gs-alert">{{ $errors->first('unity_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('price') ? ' bad' : '' }}">
    {!! Form::label('price', 'Precio', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-1 col-sm-1 col-xs-12">
        {!! Form::text('price', isset($product) ? null : '0.00', ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('price'))
        <div class="alert gs-alert">{{ $errors->first('price') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('iva') ? ' bad' : '' }}">
    {!! Form::label('iva', 'IVA', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-1 col-sm-1 col-xs-12">
        {!! Form::text('iva', isset($product) ? null : '0.00', ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('iva'))
        <div class="alert gs-alert">{{ $errors->first('iva') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('product_type_id') ? ' bad' : '' }}">
    {!! Form::label('product_type_id', 'Tipo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::select(
            'product_type_id',
            $types,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('product_type_id'))
        <div class="alert gs-alert">{{ $errors->first('product_type_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('image') ? ' bad' : '' }}">
    {!! Form::label('image', 'Imágen', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('image'))
        <div class="alert gs-alert">{{ $errors->first('image') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>