@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        @include('includes/page-header', [
             'title_decoration' => '<i class="fa fa-truck"></i> ',
             'title'            => 'Proveedores',
             'search_route'     => 'suppliers.search'
        ])

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('includes.panel-header', [
                        'title' => 'Listado de proveedores',
                        'buttons' => [
                            'add'  => 'supplier.create',
                            'back' => Request::input('query') ? 'supplier.index' : false,
                        ]
                    ])

                    <div class="x_content">
                        <p>Proveedores registrados en el sistema.</p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Imágen</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td class="text-right">{{ $supplier->id }}</td>
                                        <td>
                                            <a href="{{ route('supplier.show', [$supplier->id]) }}">
                                                {{ $supplier->name }}
                                                <br>
                                                <small>Creado {{ $supplier->present()->createdAt }}</small>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('supplier.show', [$supplier->id]) }}">
                                                <img class="img-responsive center-block gs-image gs-image-thumbnail"
                                                    src="{{ $supplier->imagePath() }}">
                                            </a>
                                        </td>
                                        <td>{{ $supplier->address }}</td>
                                        <td class="text-center">{{ $supplier->present()->telephone }}</td>
                                        <td class="text-center">{{ $supplier->present()->email }}</td>
                                        <td class="text-center">
                                            @include('includes.table-actions', [
                                                'entity'        => $supplier,
                                                'route_show'    => 'supplier.show',
                                                'route_edit'    => 'supplier.edit',
                                                'route_destroy' => 'supplier.destroy',
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.pagination', ['collection' => $suppliers])

    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'proveedor'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
