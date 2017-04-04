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
    {!! Form::label('supplier_id', 'Proveedor activo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::select(
            'supplier_id',
            $suppliers,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --', 'id' => 'suppliers'])
        !!}
    </div>
    @if ($errors->has('supplier_id'))
        <div class="alert gs-alert">{{ $errors->first('supplier_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('supplier_product_id') ? ' bad' : '' }}">
    {!! Form::label('supplier_product_id', 'Producto activo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::select(
            'supplier_product_id',
            [],
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --', 'disabled' => true, 'id' => 'products'])
        !!}
    </div>
    @if ($errors->has('supplier_product_id'))
        <div class="alert gs-alert">{{ $errors->first('supplier_product_id') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>

<!-- handlebars template -->
@include('handlebars.select')
<!-- /handlebars template -->

@push('scripts')
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/gsproducttype.js") }}"></script>
@endpush