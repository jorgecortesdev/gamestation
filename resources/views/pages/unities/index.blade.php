@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-list-ul"></i> Unidades
        @endslot

        @slot('buttons')
            <a href="{{ route('unities.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de unidades</h4>
        <p>Catálogo de unidades registradas en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unities as $unity)
                        <tr>
                            <td class="text-right">{{ $unity->id }}</td>
                            <td>
                                {{ $unity->name }}
                                <br>
                                <small>Creado {{ $unity->created_at->format('d.m.Y') }}</small>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('unities.edit', [$unity->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('unities.destroy', [$unity->id]) }}">
                                    <i class="fa fa-fw fa-trash"></i> Borrar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $unities->links() }}
            </div>
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'unidad'])
@endpush
