<fieldset>
    <legend>Datos del Evento</legend>

    <div class="item form-group{{ $errors->has('eventDate') ? ' bad' : '' }}">
        {!! Form::label('eventDate', 'Fecha del evento', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="input-prepend input-group gs-input-group">
                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                {!! Form::text('eventDate', null, ['class' => 'form-control', 'id' => 'eventDate']) !!}
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12">
            <label class="control-label">
                <span id="verifyEventDateMessage" style="display: none"></span>
            </label>
        </div>
        @if ($errors->has('eventDate'))
            <div class="alert">{{ $errors->first('eventDate') }}</div>
        @endif
    </div>

    <div id="combos" class="item form-group{{ $errors->has('combo_id') ? ' bad' : '' }}">
        {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="btn-group col-md-6 col-sm-6 col-xs-12" data-toggle="buttons">
            @foreach ($combos as $combo)
            <label class="btn btn-color btn-color-{{ $combo->google_color_id }}">
                {!! Form::radio('combo_id', $combo->id, true) !!} &nbsp; {{ $combo->name }} &nbsp;
            </label>
            @endforeach
        </div>
        @if ($errors->has('combo_id'))
            <div class="alert gs-alert">{{ $errors->first('combo_id') }}</div>
        @endif
    </div>

</fieldset>
