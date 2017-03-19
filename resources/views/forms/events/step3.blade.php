<div class="item form-group{{ $errors->has('combo_id') ? ' bad' : '' }}">
    {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::select(
            'combo_id',
            $combos,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('combo_id'))
        <div class="alert">{{ $errors->first('combo_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('extras') ? ' bad' : '' }}">
    {!! Form::label('extras', 'Paquete', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::select(
            'extras[]',
            $extras,
            null,
            ['multiple' => 'multiple', 'class' => 'form-control'])
        !!}
    </div>
    @if ($errors->has('extras'))
        <div class="alert">{{ $errors->first('extras') }}</div>
    @endif
</div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::button('Siguiente &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>