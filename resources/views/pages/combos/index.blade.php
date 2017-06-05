@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            <i class="fa fa-fw fa-gift"></i> Paquetes
        @endslot

        @slot('buttons')
            <a href="{{ route('combos.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-square"></i> Agregar
            </a>
        @endslot

        <h4>Listado de paquetes</h4>
        <p>Para agregar productos de proveedores el paquete deberá existir previamente.</p>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Horas</th>
                        <th class="text-center">Niños</th>
                        <th class="text-center">Adultos</th>
                        <th class="text-center">Costo</th>
                        <th class="text-center">Costo Unitario</th>
                        <th class="text-center">Márgen de contribución</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($combos as $combo)
                        <tr>
                            <td class="text-right">{{ $combo->id }}</td>
                            <td>
                                <a href="{{ route('combos.show', [$combo->id]) }}">{{ $combo->name }}</a>
                            </td>
                            <td>
                                <div class="combo-decorator combo-decorator-center">
                                    {!! $combo->present()->renderColor('combo-color-sm') !!}
                                </div>
                            </td>
                            <td class="text-center">{{ $combo->hours }}</td>
                            <td class="text-center">{{ $combo->kids }}</td>
                            <td class="text-center">{{ $combo->adults }}</td>
                            <td class="text-right">{{ $combo->present()->total }}</td>
                            <td class="text-right">{{ $combo->present()->price }}</td>
                            <td class="text-right">{!! $combo->present()->contribution_margin !!}</td>
                            <td class="text-center no-wrap actions">
                                <div>
                                    <a class="btn btn-primary" href="{{ route('combos.show', [$combo->id]) }}"><i class="fa fa-folder"></i> Ver</a>
                                    <a class="btn btn-info" href="{{ route('combos.edit', [$combo->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('combos.destroy', [$combo->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="table-center">
                {{ $combos->links() }}
            </div>
        </div>


    @endcomponent

@endsection

@push('modals')
@include('modals.delete', ['entityText' => 'paquete'])
@endpush
