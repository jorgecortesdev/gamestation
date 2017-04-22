<fieldset>
    <legend>Datos del Niño</legend>

    <div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
        {!! Form::label('name', 'Nombre del Festejado', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-4 col-sm-4 col-xs-12">
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'kidName']) !!}
        </div>
        @if ($errors->has('name'))
            <div class="alert gs-alert">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <div class="item form-group{{ $errors->has('birthday_at') ? ' bad' : '' }}">
        {!! Form::label('birthday_at', 'Cumpleaños', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-2 col-sm-2 col-xs-12">
            <div class="input-prepend input-group gs-input-group">
                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                {!! Form::text('birthday_at', null, ['class' => 'form-control', 'id' => 'kidBirthday']) !!}
            </div>
        </div>
        @if ($errors->has('birthday_at'))
            <div class="alert gs-alert">{{ $errors->first('birthday_at') }}</div>
        @endif
    </div>

    <div class="item form-group{{ $errors->has('sex') ? ' bad' : '' }}">
        {!! Form::label('sex', 'Sexo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="btn-group col-md-6 col-sm-6 col-xs-12" data-toggle="buttons">
            <label class="btn btn-default active" id="kidSexMale">
                {!! Form::radio('sex', '1', true) !!} &nbsp;<i class="fa fa-mars" aria-hidden="true"></i> Másculino &nbsp;
            </label>
            <label class="btn btn-default" id="kidSexFemale">
                {!! Form::radio('sex', '2') !!} &nbsp; <i class="fa fa-venus" aria-hidden="true"></i> Femenino &nbsp;
            </label>
        </div>
        @if ($errors->has('sex'))
            <div class="alert gs-alert">{{ $errors->first('sex') }}</div>
        @endif
    </div>

</fieldset>
