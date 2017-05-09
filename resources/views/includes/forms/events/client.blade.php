<fieldset>
    <legend>Datos del Cliente</legend>

    <div class="item form-group{{ $errors->has('clientIdOrName') ? ' bad' : '' }}">
        {!! Form::label('clientIdOrName', 'Cliente', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="gs-inline-block">
                {!! Form::select(
                    'clientIdOrName',
                    $clientsSelect,
                    null,
                    ['class' => 'form-control', 'placeholder' => '-- Selecciona el cliente --', 'id' => 'clientIdOrName'])
                !!}
            </div>
            @if ($errors->has('clientIdOrName'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('clientIdOrName') }}</div>
            @endif
        </div>

    </div>

    <div class="item form-group{{ $errors->has('clientAddress') ? ' bad' : '' }}">
        {!! Form::label('clientAddress', 'Dirección', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="gs-inline-block">
                {!! Form::text('clientAddress', null, ['class' => 'form-control', 'id' => 'clientAddress']) !!}
            </div>
            @if ($errors->has('clientAddress'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('clientAddress') }}</div>
            @endif
        </div>
    </div>

    <div class="item form-group{{ $errors->has('clientTelephone') ? ' bad' : '' }}">
        {!! Form::label('clientTelephone', 'Teléfono', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="gs-inline-block">
                {!! Form::text('clientTelephone', null, ['class' => 'form-control', 'id' => 'clientPhone', 'data-inputmask' => '"mask": "(999) 999-9999"']) !!}
            </div>
            @if ($errors->has('clientTelephone'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('clientTelephone') }}</div>
            @endif
        </div>
    </div>

    <div class="item form-group{{ $errors->has('clientEmail') ? ' bad' : '' }}">
        {!! Form::label('clientEmail', 'Correo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="gs-inline-block">
                {!! Form::text('clientEmail', null, ['class' => 'form-control', 'id' => 'clientEmail']) !!}
            </div>
            @if ($errors->has('clientEmail'))
                <div class="alert gs-alert gs-inline-block">{{ $errors->first('clientEmail') }}</div>
            @endif
        </div>
    </div>

    <div class="item form-group" id="clientKids" style="display: none">
        {!! Form::label('kids', 'Niños', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
        <div class="col-md3 col-sm-3 col-xs-12"></div>
    </div>

    <!-- handlebars template -->
    @include('includes.handlebars.events.kid')
    <!-- /handlebars template -->
</fieldset>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#frm').on('submit', function() {
            $('[data-inputmask]').inputmask('remove');
        });

        if ($('#clientIdOrName').val().length) {
            $('#clientIdOrName').trigger('select2:select');
        }
    });
</script>
@endpush
