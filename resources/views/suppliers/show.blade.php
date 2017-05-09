@extends('includes.page.content')

@section('page_content')

@include('includes.page.header', [
    'title_decoration' => '<i class="fa fa-truck"></i> ',
    'title'            => 'Información de Proveedor',
])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', [
                'title' => '',
                'entity' => $supplier,
                'buttons' => [
                    'edit' => 'supplier.edit',
                    'back' => 'supplier.index',
                ]
            ])

            <div class="x_content">

                @include('suppliers.card')

                <br>

                @include('suppliers.products-collection')

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@include('includes.modals.delete', ['entityText' => 'producto'])

@endsection