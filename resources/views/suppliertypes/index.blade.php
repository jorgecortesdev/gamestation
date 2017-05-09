@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-list-ul"></i> Tipo de Provedores</h3>
            </div>
            <div class="title_right">
                <a href="{{ route('supplier_type.create') }}" class="btn btn-default pull-right">
                    <i class="fa fa-plus-square"></i> Agregar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Catálogo de tipos de proveedores</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Catálogo de tipos de proveedores registrados en el sistema.</p>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier_types as $supplier_type)
                            <tr>
                                <td class="text-right">{{ $supplier_type->id }}</td>
                                <td>
                                    {{ $supplier_type->name }}
                                    <br>
                                    <small>Creado {{ $supplier_type->created_at->format('d.m.Y') }}</small>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('supplier_type.edit', [$supplier_type->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('supplier_type.destroy', [$supplier_type->id]) }}">
                                        <i class="fa fa-trash"></i> Borrar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 text-center">
        {{ $supplier_types->links() }}
    </div>
</div>

<!-- Modal -->
@include('includes.modals.delete', ['entityText' => 'tipo de proveedor'])

@endsection
