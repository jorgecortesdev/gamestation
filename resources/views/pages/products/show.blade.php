@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Información del producto
        @endslot

        @slot('buttons')
            <a href="{{ route('suppliers.products.edit', [$supplier->id, $product->id]) }}" class="btn btn-primary">
                <i class="fa fa-fw fa-edit"></i> Editar
            </a>
            <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-primary">
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
                        <img class="media-object" src="{{ $product->image }}">
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
                        <dt>Precio</dt>
                        <dd>{{ $product->present()->price }}</dd>
                        <dt>Creado</dt>
                        <dd>{{ $product->present()->created_at }}</dd>
                        <dt>Actualizado</dt>
                        <dd>{{ $product->present()->updated_at }}</dd>
                    </dl>

                @endcomponent

                <div class="text-center">

                    <product-activate-button
                        product-type-id="{{ $product->productType->id }}"
                        product-id="{{ $product->id }}"
                        :active="{{ json_encode($product->isActive) }}"
                    ></product-activate-button>

                </div>

            </div>

        </div>

    @endcomponent

@endsection
