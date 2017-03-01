<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('address') ? ' bad' : '' }}">
    {!! Form::label('address', 'Dirección', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    @if ($errors->has('address'))
        <div class="alert">{{ $errors->first('address') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('telephone') ? ' bad' : '' }}">
    {!! Form::label('telephone', 'Teléfono *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('telephone', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    @if ($errors->has('telephone'))
        <div class="alert">{{ $errors->first('telephone') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('email') ? ' bad' : '' }}">
    {!! Form::label('email', 'Correo', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
    @if ($errors->has('email'))
        <div class="alert">{{ $errors->first('email') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('supplier_type_id') ? ' bad' : '' }}">
    {!! Form::label('supplier_type_id', 'Tipo *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::radio('supplier_type_id', '1', true) !!} &nbsp; Producto &nbsp;
        {!! Form::radio('supplier_type_id', '2') !!} &nbsp; Servicio &nbsp;
    </div>
    @if ($errors->has('supplier_type_id'))
        <div class="alert">{{ $errors->first('supplier_type_id') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::button('Cancelar', ['class' => 'btn btn-primary', 'type' => 'button']) !!}
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>