@extends('includes.page.content')

@section('page_content')

@include('includes.page.header', [
    'title_decoration' => '<i class="fa fa-truck"></i> ',
    'title'            => 'Información del product',
])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', [
                'title' => '',
                'entity' => $product,
                'buttons' => [
                    'edit' => 'products.edit',
                    'back' => 'products.index',
                ]
            ])

            <div class="x_content">

                @include('products.card')

            </div>
        </div>
    </div>
</div>

@endsection