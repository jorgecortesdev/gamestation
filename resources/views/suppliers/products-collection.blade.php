<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="gs-title bg-success">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>Lista de productos</h2>
            </div>
        </div>
        <br>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Imágen</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Activo</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Unidad</th>
                    <th class="text-center">Costo Unitario</th>
                    <th class="text-center">IVA</th>
                    <th class="text-center">Costo Total</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td class="text-right">{{ $product->id }}</td>
                    <td>{{ $product->name }}<br><small>Creado {{ $product->present()->createdAt }}</small></td>
                    <td class="text-center">
                        <img class="img-responsive center-block gs-image gs-image-thumbnail" src="{{ $product->imagePath() }}">
                    </td>
                    <td class="text-center">{{ $product->productType->name }}</td>
                    <td class="text-center">{!! $product->present()->isActive() !!}</td>
                    <td class="text-center">{{ $product->present()->quantity }}</td>
                    <td class="text-center">{{ $product->unity->name }}</td>
                    <td class="text-right">{{ $product->present()->price }}</td>
                    <td class="text-right">{{ $product->present()->iva }}</td>
                    <td class="text-right">{{ $product->present()->total }}</td>
                    <td class="text-center">
                        @include('includes.components.table.actions', [
                            'entity'        => $product,
                            'route_edit'    => 'products.edit',
                            'route_destroy' => 'products.destroy',
                        ])
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center">
                        <br>
                        <div class="alert alert-default">Sin productos</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>