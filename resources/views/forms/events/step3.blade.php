<div class="item form-group{{ $errors->has('combo_id') ? ' bad' : '' }}">
    {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-4 col-sm-4 col-xs-12">
        {!! Form::select(
            'combo_id',
            $combos,
            null,
            ['class' => 'form-control', 'placeholder' => '-- Seleccionar --'])
        !!}
    </div>
    @if ($errors->has('combo_id'))
        <div class="alert">{{ $errors->first('combo_id') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('name') ? ' bad' : '' }}">
    {!! Form::label('date', 'Fecha', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-2 col-sm-2 col-xs-12">
        {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date']) !!}
    </div>
    @if ($errors->has('date'))
        <div class="alert">{{ $errors->first('date') }}</div>
    @endif
</div>

<div class="item form-group{{ $errors->has('extras') ? ' bad' : '' }}">
    {!! Form::label('extras', 'Paquete', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-3 col-sm-3 col-xs-12">
        {!! Form::select(
            'extras[]',
            $extras,
            null,
            ['multiple' => 'multiple', 'class' => 'form-control'])
        !!}
    </div>
    @if ($errors->has('extras'))
        <div class="alert">{{ $errors->first('extras') }}</div>
    @endif
</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
        {!! Form::button('Siguiente &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
    </div>
</div>

@push('scripts')
<script>
    function init_EventDatePicker() {

        if (typeof(daterangepicker) === 'undefined') { return; }

        $('#date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePickerIncrement: 30,
            timePicker24Hour: true,
            locale: {
                format: 'MMMM D, YYYY h:mm A'
            }
        });
    }


    $(document).ready(function() {
        init_EventDatePicker();
    });
</script>
@endpush