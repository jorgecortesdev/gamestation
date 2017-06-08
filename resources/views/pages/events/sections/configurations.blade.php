<div class="row">
    <div class="col-md-12">
        <h4>Configurables</h4>

        <table class="table table-hover">
            <tbody>
                @if ($configurations->count() > 0)
                    @foreach ($configurations as $configuration)
                    <tr{{ is_null($configuration->product_id) ? " class=danger" : '' }}>
                        <td><strong>{{ $configuration->productType->name }}</strong> <sup><small>({{ $configuration->type() }})</small></sup></td>
                        <td class="text-center text-success">{!! $configuration->present()->selected !!}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td><div class="alert text-center">Sin productos</div></td>
                </tr>
                @endif
            </tbody>
        </table>

        <modal-configurable></modal-configurable>
    </div>
</div>
