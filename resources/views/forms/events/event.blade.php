@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
@endpush

<fieldset>

    <legend>Datos del Evento</legend>

    <div class="form-group{{ $errors->has('occurs_on') ? ' has-error' : '' }}">
        {!! Form::label('occurs_on', 'Fecha del evento', ['class' => 'control-label']) !!}
        <div class="gs-inline-block">
            <div class="input-prepend input-group gs-input-group">
                <span class="add-on input-group-addon gs-input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                {!! Form::text('occurs_on', null, ['class' => 'form-control', 'id' => 'occurs_on']) !!}
            </div>
        </div>

        @if ($errors->has('occurs_on'))
        <span class="help-block text-danger">* {{ $errors->first('occurs_on') }}</span>
        @endif

        <div class="gs-inline-block">
            <label class="control-label">
                <span id="verifyEventDateMessage" style="display: none"></span>
            </label>
        </div>
    </div>

    <div id="combos" class="form-group{{ $errors->has('combo_id') ? ' has-error' : '' }}">
        {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label']) !!}
        <div class="btn-group btn-block" data-toggle="buttons">
            @foreach ($combos as $combo)
            <label class="btn combo-color-bg-{{ $combo->color_id }} text-color btn-color{{ old('combo_id') == $combo->id || isset($event) && $event->combo_id == $combo->id ? ' active' : '' }}">
                {!! Form::radio('combo_id', $combo->id, null) !!} &nbsp; {{ $combo->name }} &nbsp;
            </label>
            @endforeach
        </div>
        @if ($errors->has('combo_id'))
        <span class="help-block text-danger">* {{ $errors->first('combo_id') }}</span>
        @endif
    </div>

</fieldset>

@push('scripts')
<script src="{{ asset("js/moment.min.js") }}"></script>
<script src="{{ asset("js/daterangepicker.js") }}"></script>
<script src="{{ asset("js/gsevents.js") }}"></script>
@endpush
