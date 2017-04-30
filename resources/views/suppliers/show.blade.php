@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        @include('includes.page-header', [
            'title_decoration' => '<i class="fa fa-truck"></i> ',
            'title'            => 'Información de Proveedor',
        ])

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('includes.panel-header', [
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

    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'producto'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection