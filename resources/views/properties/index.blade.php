@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3><i class="fa fa-wrench"></i> Propiedades</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('properties.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de Propiedades</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Catálogo de propiedades registradas en el sistema.</p>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Etiqueta</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Opciones</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td class="text-right">{{ $property->id }}</td>
                                        <td>
                                            {{ $property->label }}
                                            <br>
                                            <small>Creado {{ $property->created_at->format('d.m.Y') }}</small>
                                        </td>
                                        <td class="text-center">{{ $property->type }}</td>
                                        <td class="text-center">{{ $property->present()->options }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="{{ route('properties.edit', [$property->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('properties.destroy', [$property->id]) }}">
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
                {{ $properties->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'propiedad'])
    @include('includes.footer')
@endsection
