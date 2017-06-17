@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-users"></i> Usuarios
        @endslot

        @slot('buttons')
            <a href="#" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de usuarios</h4>
        <p>Lista de usuarios autorizados en el sistema, esta parte está incompleta,
        aún no se puede editar ni agregar algun usuario adicional, quedará pendiente por que no urge.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td>
                                {{ $user->name }}
                                <br>
                                <small>Creado {{ $user->created_at->format('d.m.Y') }}</small>
                            </td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="#"><i class="fa fa-edit"></i> Editar</a>
                                <a class="btn btn-danger" href="#"> <i class="fa fa-trash"></i> Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $users->links() }}
            </div>

        </div>
    @endcomponent

@endsection
