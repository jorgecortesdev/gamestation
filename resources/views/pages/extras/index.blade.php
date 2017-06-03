@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-cube"></i> Extras
        @endslot

        @slot('buttons')
            <a href="{{ route('extras.create') }}" class="btn btn-default pull-right">
                <i class="fa fa-fw fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de extras</h4>
        <p>Para agregar productos de proveedores al extra en caso de que tuviera, este deberá existir previamente.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Costo Variable</th>
                        <th class="text-center">Costo</th>
                        <th class="text-center">Márgen de contribución</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extras as $extra)
                        <tr>
                            <td class="text-right">{{ $extra->id }}</td>
                            <td>
                                <a href="#">{{ $extra->name }}</a>
                                <br>
                                <small>Creado {{ $extra->present()->createdAt }}</small>
                            </td>
                            <td class="text-right">{{ $extra->present()->total }}</td>
                            <td class="text-right">{{ $extra->present()->price }}</td>
                            <td class="text-right">{!! $extra->present()->contribution_margin !!}</td>
                            <td class="text-center">
                                <a class="btn btn-info" href="{{ route('extras.edit', [$extra->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('extras.destroy', [$extra->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {{ $extras->links() }}
            </div>
        </div>

    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'extra'])
@endpush


