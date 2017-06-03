<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    @if ($errors->has('name'))
    <span class="help-block text-danger">*  {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Dirección', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}

    @if ($errors->has('address'))
    <span class="help-block text-danger">*  {{ $errors->first('address') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    @if ($errors->has('email'))
    <span class="help-block text-danger">*  {{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
    {!! Form::label('telephone', 'Teléfono', ['class' => 'control-label']) !!}
    {!! Form::text('telephone', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "(999) 999-9999"']) !!}

    @if ($errors->has('telephone'))
    <span class="help-block text-danger">*  {{ $errors->first('telephone') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Imágen', ['class' => 'control-label']) !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}

    @if ($errors->has('image'))
    <span class="help-block text-danger">*  {{ $errors->first('image') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('supplier_type_id') ? ' has-error' : '' }}">
    {!! Form::label('supplier_type_id', 'Tipo', ['class' => 'control-label']) !!}
    <div class="btn-group btn-block" data-toggle="buttons">
        <label class="btn btn-default{{ (!isset($supplier) || $supplier->supplier_type_id == 1) ? ' active' : '' }}">
        {!! Form::radio('supplier_type_id', '1', true) !!} &nbsp; Producto &nbsp;</label>
        <label class="btn btn-default{{ (isset($supplier) && $supplier->supplier_type_id == 2) ? ' active' : '' }}">
        {!! Form::radio('supplier_type_id', '2') !!} &nbsp; Servicio &nbsp;</label>
    </div>

    @if ($errors->has('supplier_type_id'))
    <span class="help-block text-danger">*  {{ $errors->first('supplier_type_id') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>

@push('scripts')
<script src="{{ asset("js/jquery.inputmask.bundle.min.js") }}"></script>
<script>
    $(document).ready(function() {
        $('#telephone').inputmask({
            'mask': '(999) 999-9999',
            'removeMaskOnSubmit': true
        });
    });
</script>
@endpush