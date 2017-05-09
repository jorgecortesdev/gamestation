<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', ['title' => 'Propiedades'])

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($properties->count() > 0)
                        <table class="table table-hover table-no-top-border">
                            <tbody>
                            @foreach ($properties as $property)
                                <tr{{ empty($property->pivot->value) ? " class=danger" : '' }}>
                                    <td><strong>{{ $property->label }}</strong></td>
                                    <td class="text-center text-success">{!! $property->present()->value !!}</td>
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-xs"
                                           href="#"
                                           data-toggle="modal"
                                           data-target="#propertyModal"
                                           data-id="{{ $property->id }}"
                                           data-action="{{ route('event_property.update', [$event->id, $property->id]) }}" ><i class="fa fa-cogs"></i> Configurar</a>
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
            </div>
        </div>
    </div>
</div>