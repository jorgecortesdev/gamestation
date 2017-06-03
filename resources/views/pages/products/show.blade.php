@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Información del producto
        @endslot

        @slot('buttons')
            <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">
                <i class="fa fa-fw fa-edit"></i> Editar
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-arrow-left"></i> Volver
            </a>
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $product->name }}</h3>
            </div>

            <div class="panel-body">

                @component('components.media')
                    @slot('left')
                        <img class="img-circle" src="{{ $product->imagePath() }}">
                    @endslot

                    <dl class="dl-horizontal">
                        <dt>Tipo de producto</dt>
                        <dd>{{ $product->productType->name }}</dd>
                        <dt>Cantidad</dt>
                        <dd>{{ $product->present()->quantity }}</dd>
                        <dt>Unidad</dt>
                        <dd>{{ $product->unity->name }}</dd>
                        <dt>IVA</dt>
                        <dd>{{ $product->present()->iva }}</dd>
                        <dt>Costo Total</dt>
                        <dd>{{ $product->present()->total }}</dd>
                        <dt>Creado</dt>
                        <dd>{{ $product->present()->created_at }}</dd>
                        <dt>Actualizado</dt>
                        <dd>{{ $product->present()->updated_at }}</dd>
                    </dl>

                @endcomponent

            </div>

        </div>

    @endcomponent

@endsection
