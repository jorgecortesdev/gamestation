<fieldset>
    <legend>Datos del Niño</legend>

    {!! Form::hidden('kidId', null) !!}

    <div class="item form-group{{ $errors->has('kidName') ? ' bad' : '' }}">
        {!! Form::label('kidName', 'Nombre del Festejado', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="gs-inline-block">
                {!! Form::text('kidName', null, ['class' => 'form-control', 'id' => 'kidName']) !!}
            </div>
            @if ($errors->has('kidName'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('kidName') }}</div>
            @endif
        </div>
    </div>

    <div class="item form-group{{ $errors->has('kidBirthday') ? ' bad' : '' }}">
        {!! Form::label('kidBirthday', 'Cumpleaños', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="gs-inline-block">
                <div class="input-prepend input-group gs-input-group">
                    <span class="add-on input-group-addon gs-input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                    {!! Form::text('kidBirthday', null, ['class' => 'form-control', 'id' => 'kidBirthday']) !!}
                </div>
            </div>
            @if ($errors->has('kidBirthday'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('kidBirthday') }}</div>
            @endif
        </div>
    </div>

    <div class="item form-group{{ $errors->has('kidGender') ? ' bad' : '' }}">
        {!! Form::label('kidGender', 'Sexo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default{{ old('kidGender') == 1 || isset($event) && $event->kid->sex == 1 ? ' active' : '' }}" id="kidSexMale">
                    {!! Form::radio('kidGender', '1', null) !!} &nbsp;<i class="fa fa-mars" aria-hidden="true"></i> Másculino &nbsp;
                </label>
                <label class="btn btn-default{{ old('kidGender') == 2 || isset($event) && $event->kid->sex == 2 ? ' active' : '' }}" id="kidSexFemale">
                    {!! Form::radio('kidGender', '2', null) !!} &nbsp; <i class="fa fa-venus" aria-hidden="true"></i> Femenino &nbsp;
                </label>
            </div>
            @if ($errors->has('kidGender'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('kidGender') }}</div>
            @endif
        </div>
    </div>

</fieldset>
