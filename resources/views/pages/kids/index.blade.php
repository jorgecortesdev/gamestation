@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-child"></i> Niños
        @endslot

        @slot('buttons')
            <a href="{{ route('kids.create') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de niños</h4>
        <p>Niños registrados en el sistema.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Padres</th>
                        <th class="text-center">Cumpleaños</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kids as $kid)
                        <tr>
                            <td class="text-right">{{ $kid->id }}</td>
                            <td>
                                <a href="#">{{ $kid->name }}</a>
                                <br>
                                <small>Creado {{ $kid->present()->createdAt }}</small>
                            </td>
                            <td class="text-center">{{ $kid->present()->parents }}</td>
                            <td class="text-center">{{ $kid->present()->birthday_at }}</td>
                            <td class="text-center">{{ $kid->present()->sex }}</td>
                            <td class="text-center no-wrap actions">
                                <div>
                                    <a class="btn btn-info" href="{{ route('kids.edit', [$kid->id]) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('kids.destroy', [$kid->id]) }}"> <i class="fa fa-fw fa-trash"></i> Borrar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{ $kids->links() }}
        </div>
    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'niño'])
@endpush
