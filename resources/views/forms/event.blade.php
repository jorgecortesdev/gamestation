@push('stylesheets')
<link rel="stylesheet" href="{{ asset("css/select2.min.css") }}">
<link rel="stylesheet" href="{{ asset("css/select2-bootstrap.min.css") }}">
<link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
@endpush

<event-view inline-template :selected-kid="{{ $selectedKid }}" :selected-client="{{ $selectedClient }}">
    <div>
        <div class="form-group{{ $errors->has('occurs_on') ? ' has-error' : '' }}">
            {!! Form::label('occurs_on', 'Fecha del evento', ['class' => 'control-label']) !!}

            <event-datepicker
                v-model="initialDate"
                current-date="{{ $event->present()->occurs_on }}"
                v-on:loaded="initialDate = arguments[0]">

            @if ($errors->has('occurs_on'))
            <span class="help-block text-danger">* {{ $errors->first('occurs_on') }}</span>
            @endif
        </div>

        <div id="combos" class="form-group{{ $errors->has('combo_id') ? ' has-error' : '' }}">
            {!! Form::label('combo_id', 'Paquete', ['class' => 'control-label']) !!}
            <div class="btn-group btn-block" data-toggle="buttons">
                @foreach ($combos as $combo)
                <label class="btn btn-color btn-combo-{{ $combo->color_id }} {{ $selectedCombo == $combo->id ? 'active' : ''}}">
                    {!! Form::radio('combo_id', $combo->id, null) !!}
                    <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ $combo->name }}
                </label>
                @endforeach
            </div>
            @if ($errors->has('combo_id'))
            <span class="help-block text-danger">* {{ $errors->first('combo_id') }}</span>
            @endif
        </div>

        <client-select :options="options" v-model="selected" :selected-kid="selectedKid">
            <option disabled value="0">-- Selecciona el cliente --</option>
        </client-select>

        <div class="form-group pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
            {!! Form::button('Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
        </div>
    </div>
</event-view>