<fieldset>
    <legend>Datos del Niño</legend>

    {!! Form::hidden('kidId', null) !!}

    <div class="form-group{{ $errors->has('kidName') ? ' has-error' : '' }}">
        {!! Form::label('kidName', 'Nombre del Festejado', ['class' => 'control-label']) !!}
        {!! Form::text('kidName', null, ['class' => 'form-control', 'id' => 'kidName']) !!}

        @if ($errors->has('kidName'))
        <span class="help-block text-danger">* {{ $errors->first('kidName') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('kidBirthday') ? ' has-error' : '' }}">
        {!! Form::label('kidBirthday', 'Cumpleaños', ['class' => 'control-label']) !!}
        <div class="gs-inline-block">
            <div class="input-prepend input-group gs-input-group">
                <span class="add-on input-group-addon gs-input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                {!! Form::text('kidBirthday', null, ['class' => 'form-control', 'id' => 'kidBirthday']) !!}
            </div>
        </div>

        @if ($errors->has('kidBirthday'))
        <span class="help-block text-danger">* {{ $errors->first('kidBirthday') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('kidGender') ? ' has-error' : '' }}">
        {!! Form::label('kidGender', 'Sexo', ['class' => 'control-label']) !!}
        <div class="btn-group btn-block" data-toggle="buttons">
            <label class="btn btn-default{{ old('kidGender') == 1 || isset($event) && $event->kid->sex == 1 ? ' active' : '' }}" id="kidSexMale">
                {!! Form::radio('kidGender', '1', null) !!} &nbsp;<i class="fa fa-fw fa-mars"></i> Másculino &nbsp;
            </label>
            <label class="btn btn-default{{ old('kidGender') == 2 || isset($event) && $event->kid->sex == 2 ? ' active' : '' }}" id="kidSexFemale">
                {!! Form::radio('kidGender', '2', null) !!} &nbsp; <i class="fa fa-fw fa-venus"></i> Femenino &nbsp;
            </label>
        </div>

        @if ($errors->has('kidGender'))
        <span class="help-block text-danger">* {{ $errors->first('kidGender') }}</span>
        @endif
    </div>

</fieldset>
