<div class="item has-feedback form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control has-feedback-right col-md-7 col-xs-12']) !!}
        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
    </div>
    @if ($errors->has('name'))
        <div class="alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item has-feedback form-group{{ $errors->has('address') ? ' bad' : '' }}">
    {!! Form::label('address', 'Dirección', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('address', null, ['class' => 'form-control has-feedback-right col-md-7 col-xs-12']) !!}
        <span class="fa fa-location-arrow form-control-feedback right" aria-hidden="true"></span>
    </div>
    @if ($errors->has('address'))
        <div class="alert">{{ $errors->first('address') }}</div>
    @endif
</div>

<div class="item has-feedback form-group{{ $errors->has('telephone') ? ' bad' : '' }}">
    {!! Form::label('telephone', 'Teléfono', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('telephone', null, ['class' => 'form-control has-feedback-right col-md-7 col-xs-12']) !!}
        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
    </div>
    @if ($errors->has('telephone'))
        <div class="alert">{{ $errors->first('telephone') }}</div>
    @endif
</div>

<div class="item has-feedback form-group{{ $errors->has('email') ? ' bad' : '' }}">
    {!! Form::label('email', 'Correo', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('email', null, ['class' => 'form-control has-feedback-right col-md-7 col-xs-12']) !!}
        <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
    </div>
    @if ($errors->has('email'))
        <div class="alert">{{ $errors->first('email') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>