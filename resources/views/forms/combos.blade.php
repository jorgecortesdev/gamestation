<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    @if ($errors->has('name'))
    <span class="help-block text-danger">* {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
    {!! Form::label('color_id', 'Color', ['class' => 'control-label']) !!}
    <div id="combo-form-checkboxes">
        <div class="gs-inline-block combo-color combo-color-form combo-color-bg-8">
            <i class="fa fa-check"></i>
        </div>
        <div class="vertical-hr vertical-hr-inline"></div>
        @foreach ($colors as $id => $color)
        <div class="gs-inline-block combo-color combo-color-form combo-color-bg-{{$id}}">
            <i class="fa fa-check"></i>
        </div>
        @endforeach
        {{ Form::hidden('color_id', null) }}
    </div>

    @if ($errors->has('color_id'))
    <span class="help-block text-danger">* {{ $errors->first('color_id') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
    {!! Form::label('hours', 'Horas', ['class' => 'control-label']) !!}
    {!! Form::text('hours', null, ['class' => 'form-control']) !!}

    @if ($errors->has('hours'))
    <span class="help-block text-danger">* {{ $errors->first('hours') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('kids') ? ' has-error' : '' }}">
    {!! Form::label('kids', 'Niños', ['class' => 'control-label']) !!}
    {!! Form::text('kids', null, ['class' => 'form-control']) !!}

    @if ($errors->has('kids'))
    <span class="help-block text-danger">* {{ $errors->first('kids') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('adults') ? ' has-error' : '' }}">
    {!! Form::label('adults', 'Adultos', ['class' => 'control-label']) !!}
    {!! Form::text('adults', null, ['class' => 'form-control']) !!}

    @if ($errors->has('adults'))
    <span class="help-block text-danger">* {{ $errors->first('adults') }}</span>
    @endif
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'Precio', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}

    @if ($errors->has('price'))
    <span class="help-block text-danger">* {{ $errors->first('price') }}</span>
    @endif
</div>


<div class="form-group{{ $errors->has('properties') ? ' has-error' : '' }}">
    {!! Form::label('properties', 'Propiedades', ['class' => 'control-label']) !!}
    {!! Form::select(
        'properties[]',
        $properties,
        null,
        ['class' => 'form-control', 'multiple' => 'multiple'])
    !!}

    @if ($errors->has('properties'))
    <span class="help-block text-danger">* {{ $errors->first('properties') }}</span>
    @endif
</div>

<div class="form-group pull-right">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Cancelar</a>
    {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
</div>

@push('scripts')
<script>
function clearCheckboxes() {
    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    $.each(elements, function(index, item) {
        $(item).children('i').hide();
    });
}

function init_ColorCheckbox() {
    var input = $('#color_id');

    if (input.length <= 0) { return; }

    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    clearCheckboxes();

    $.each(elements, function(index, item) {
        $(item).on('click', function(e) {
            input.val(index);
            clearCheckboxes();
            $(this).children('i').toggle();
        });
    });

    var currentValue = input.val();

    if (!currentValue.trim()) {
        $(elements[0]).children('i').show();
    } else {
        $(elements[currentValue]).children('i').show();
    }
}

$(document).ready(function() {
    init_ColorCheckbox();
});
</script>
@endpush


