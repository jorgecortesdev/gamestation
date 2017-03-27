<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('name'))
        <div class="alert gs-alert">{{ $errors->first('name') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('address') ? ' bad' : '' }}">
    {!! Form::label('address', 'Dirección', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('address'))
        <div class="alert gs-alert">{{ $errors->first('address') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('telephone') ? ' bad' : '' }}">
    {!! Form::label('telephone', 'Teléfono', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::text('telephone', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "(999) 999-9999"']) !!}
    </div>
    @if ($errors->has('telephone'))
        <div class="alert gs-alert">{{ $errors->first('telephone') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('email') ? ' bad' : '' }}">
    {!! Form::label('email', 'Correo', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    @if ($errors->has('email'))
        <div class="alert gs-alert">{{ $errors->first('email') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>

@push('scripts')
<script src="{{ asset("js/jquery.inputmask.bundle.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#frm').on('submit', function() {
            $('[data-inputmask]').inputmask('remove');
        });
    });
</script>
@endpush