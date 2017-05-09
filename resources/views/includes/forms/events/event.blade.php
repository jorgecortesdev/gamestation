<div class="clearfix"></div>
<fieldset>
    <legend>Datos del Evento</legend>

    <div class="item form-group{{ $errors->has('eventDate') ? ' bad' : '' }}">
        {!! Form::label('eventDate', 'Fecha del evento', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="gs-inline-block">
                <div class="input-prepend input-group gs-input-group">
                    <span class="add-on input-group-addon gs-input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                    {!! Form::text('eventDate', null, ['class' => 'form-control', 'id' => 'eventDate']) !!}
                </div>
            </div>
            @if ($errors->has('eventDate'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('eventDate') }}</div>
            @endif
            <div class="gs-inline-block">
                <label class="control-label">
                    <span id="verifyEventDateMessage" style="display: none"></span>
                </label>
            </div>
        </div>
    </div>

    <div id="combos" class="item form-group{{ $errors->has('combo_id') ? ' bad' : '' }}">
        {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="btn-group" data-toggle="buttons">
                @foreach ($combos as $combo)
                <label class="btn combo-color-bg-{{ $combo->google_color_id }} text-color btn-color{{ old('combo_id') == $combo->id || isset($event) && $event->combo_id == $combo->id ? ' active' : '' }}">
                    {!! Form::radio('combo_id', $combo->id, null) !!} &nbsp; {{ $combo->name }} &nbsp;
                </label>
                @endforeach
            </div>
            @if ($errors->has('combo_id'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('combo_id') }}</div>
            @endif
        </div>
    </div>

</fieldset>
