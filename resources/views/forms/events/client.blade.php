@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
@endpush

<fieldset>

    <legend>Datos del Cliente</legend>

    <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
        {!! Form::label('client_id', 'Cliente', ['class' => 'control-label']) !!}
        {!! Form::select(
            'client_id',
            $clientsSelect,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Selecciona el cliente --', 'id' => 'client_id'])
        !!}

        @if ($errors->has('client_id'))
        <span class="help-block text-danger">* {{ $errors->first('client_id') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('clientAddress') ? ' has-error' : '' }}">
        {!! Form::label('clientAddress', 'Dirección', ['class' => 'control-label']) !!}
        {!! Form::text('clientAddress', null, ['class' => 'form-control']) !!}

        @if ($errors->has('clientAddress'))
        <span class="help-block text-danger">* {{ $errors->first('clientAddress') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('clientTelephone') ? ' has-error' : '' }}">
        {!! Form::label('clientTelephone', 'Teléfono', ['class' => 'control-label']) !!}
        {!! Form::text('clientTelephone', null, ['class' => 'form-control']) !!}

        @if ($errors->has('clientTelephone'))
        <span class="help-block text-danger">* {{ $errors->first('clientTelephone') }}</span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('clientEmail') ? ' has-error' : '' }}">
        {!! Form::label('clientEmail', 'Correo', ['class' => 'control-label']) !!}
        {!! Form::text('clientEmail', null, ['class' => 'form-control']) !!}

        @if ($errors->has('clientEmail'))
        <span class="help-block text-danger">* {{ $errors->first('clientEmail') }}</span>
        @endif
    </div>

    <div class="form-group" id="clientKids" style="display: none">
        {!! Form::label('kids', 'Niños', ['class' => 'control-label']) !!}
        <div class="clientKids"></div>
    </div>
</fieldset>

@push('scripts')
<script src="{{ asset("js/jquery.inputmask.bundle.min.js") }}"></script>
<script src="{{ asset("js/select2.full.min.js") }}"></script>
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#clientTelephone').inputmask({
            'mask': '(999) 999-9999',
            'removeMaskOnSubmit': true
        });

        if ($('#client_id').val()) {
            $('#client_id').trigger('select2:select');
        }
    });
</script>
@endpush

@push('handlebars')
@include('handlebars.events.kid')
@endpush