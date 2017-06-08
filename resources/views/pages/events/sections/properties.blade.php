<div class="row">
    <div class="col-md-12">
        <h4>Propiedades</h4>

        <table class="table table-hover">
            <tbody>
                @if ($properties->count() > 0)
                    @foreach ($properties as $property)
                    <tr{{ empty($property->pivot->value) ? " class=danger" : '' }}>
                        <td><strong>{{ $property->label }}</strong></td>
                        <td class="text-center text-success">{!! $property->present()->value !!}</td>
                        <td class="text-right">
                            <a class="btn btn-primary"
                               href="#"
                               data-toggle="modal"
                               data-target="#propertyModal"
                               data-event-id="{{ $event->id }}"
                               data-property-id="{{ $property->id }}"
                               data-action="{{ route('event.property.update', [$event->id, $property->id]) }}" ><i class="fa fa-cogs"></i> Configurar</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td><div class="alert text-center">Sin propiedades</div></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>