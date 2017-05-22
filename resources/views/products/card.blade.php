<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
        <div class="gs-profile-img">
            <img class="img-responsive center-block gs-image" src="{{ $product->imagePath() }}">
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $product->name }}</dd>
            <dt>Tipo de producto</dt>
            <dd>{{ $product->productType->name }}</dd>
            <dt>Cantidad</dt>
            <dd>{{ $product->present()->quantity }}</dd>
            <dt>Unidad</dt>
            <dd>{{ $product->unity->name }}</dd>
            <dt>Costo</dt>
            <dd>{{ $product->present()->price }}</dd>
            <dt>IVA</dt>
            <dd>{{ $product->present()->iva }}</dd>
            <dt>Costo Total</dt>
            <dd>{{ $product->present()->total }}</dd>
            <dt>Creado</dt>
            <dd>{{ $product->present()->created_at }}</dd>
            <dt>Actualizado</dt>
            <dd>{{ $product->present()->updated_at }}</dd>
        </dl>
    </div>
</div>