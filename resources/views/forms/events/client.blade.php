<fieldset>
    <legend>Datos del Cliente</legend>

    <div class="item form-group{{ $errors->has('client_id') ? ' bad' : '' }}">
        {!! Form::label('client_id', 'Cliente', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-4 col-sm-4 col-xs-12">
            {!! Form::select(
                'client_id',
                $clientsSelect,
                null,
                ['class' => 'form-control', 'placeholder' => '-- Selecciona el cliente --', 'id' => 'clientSelect'])
            !!}
        </div>

        @if ($errors->has('client_id'))
            <div class="alert gs-alert">{{ $errors->first('client_id') }}</div>
        @endif
    </div>

    <div class="item form-group{{ $errors->has('address') ? ' bad' : '' }}">
        {!! Form::label('address', 'Dirección', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-4 col-sm-4 col-xs-12">
            {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'clientAddress']) !!}
        </div>
        @if ($errors->has('address'))
            <div class="alert gs-alert">{{ $errors->first('address') }}</div>
        @endif
    </div>

    <div class="item form-group{{ $errors->has('telephone') ? ' bad' : '' }}">
        {!! Form::label('telephone', 'Teléfono', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-2 col-sm-2 col-xs-12">
            {!! Form::text('telephone', null, ['class' => 'form-control', 'id' => 'clientPhone', 'data-inputmask' => '"mask": "(999) 999-9999"']) !!}
        </div>
        @if ($errors->has('telephone'))
            <div class="alert gs-alert">{{ $errors->first('telephone') }}</div>
        @endif
    </div>

    <div class="item form-group{{ $errors->has('email') ? ' bad' : '' }}">
        {!! Form::label('email', 'Correo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-3 col-sm-3 col-xs-12">
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'clientEmail']) !!}
        </div>
        @if ($errors->has('email'))
            <div class="alert gs-alert">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="item form-group" id="clientKids" style="display: none">
        {!! Form::label('kids', 'Niños', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md3 col-sm-3 col-xs-12"></div>
    </div>

    <!-- handlebars template -->
    @include('handlebars.events.kid')
    <!-- /handlebars template -->
</fieldset>