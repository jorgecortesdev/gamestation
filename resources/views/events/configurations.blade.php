<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.panel-header', ['title' => 'Configurables'])

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($configurations->count() > 0)
                        <table class="table table-hover table-no-top-border">
                            <tbody>
                                @foreach ($configurations as $configuration)
                                <tr>
                                    <td><strong>{{ $configuration->productType->name }}</strong> <sup><small>({{ $configuration->type() }})</small></sup></td>
                                    <td class="text-center text-success">{!! $configuration->present()->selected !!}</td>
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-xs"
                                            href="#"
                                            data-toggle="modal"
                                            data-target="#configureModal"
                                            data-id="{{ $configuration->id }}"
                                            data-action="{{ route('configurations.update', [$configuration->id]) }}"><i class="fa fa-cogs"></i> Configurar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <tr>
                                <td><div class="alert text-center">Sin productos</div></td>
                            </tr>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
