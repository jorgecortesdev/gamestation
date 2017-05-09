@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-user"></i> Clientes</h3>
            </div>
            <div class="title_right">
                <a href="{{ route('client.create') }}" class="btn btn-default pull-right">
                    <i class="fa fa-plus-square"></i> Agregar
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado de clientes</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Clientes registrados en el sistema.</p>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="text-right">{{ $client->id }}</td>
                                <td>
                                    <a href="#">{{ $client->name }}</a>
                                    <br>
                                    <small>Creado {{ $client->present()->createdAt }}</small>
                                </td>
                                <td>{{ $client->address }}</td>
                                <td class="text-center">{{ $client->present()->telephone }}</td>
                                <td>{{ $client->present()->email }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-xs" href="{{ route('client.edit', [$client->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('client.destroy', [$client->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        {{ $clients->links() }}
    </div>
</div>

<!-- Modal -->
@include('includes.modals.delete', ['entityText' => 'cliente'])

@endsection
