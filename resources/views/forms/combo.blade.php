<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-7 col-sm-7 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('price') ? ' bad' : '' }}">
    {!! Form::label('price', 'Precio', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('price'))
        <div class="alert">{{ $errors->first('price') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('google_color_id') ? ' bad' : '' }}">
    {!! Form::label('google_color_id', 'Color', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-10 col-sm-10 col-xs-12" id="combo-form-checkboxes">
        <div class="gs-inline-block combo-color combo-color-form combo-color-bg-8"><i class="fa fa-check" aria-hidden="true"></i></div>
        <div class="vertical-hr gs-inline-block"></div>
        @foreach ($colors as $id => $color)
        <div class="gs-inline-block combo-color combo-color-form combo-color-bg-{{$id}}"><i class="fa fa-check" aria-hidden="true"></i></div>
        @endforeach
        {{ Form::hidden('google_color_id', null)}}
    </div>
    @if ($errors->has('google_color_id'))
        <div class="alert">{{ $errors->first('google_color_id') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::button('Cancelar', ['class' => 'btn btn-primary', 'type' => 'button']) !!}
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>



