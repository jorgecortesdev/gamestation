@extends('layouts.app')

@section('content')

    @component('components.page')
        @slot('heading')
            Información de Paquete
        @endslot

        @slot('buttons')
            <a href="{{ route('combos.edit', [$combo->id]) }}" class="btn btn-primary">
                <i class="fa fa-fw fa-edit"></i> Editar
            </a>
            <a href="{{ route('combos.index') }}" class="btn btn-primary">
                <i class="fa fa-fw fa-arrow-left"></i> Volver
            </a>
        @endslot

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <div class="combo-decorator">
                        {!! $combo->present()->renderColor('combo-color-xs') !!}
                        <span>Paquete {{ $combo->name }}</span>
                    </div>
                </h3>
            </div>

            <div class="panel-body">
                <ul class="stats-overview">
                    <li>
                        <span class="name">Costo unitario</span>
                        <span class="value text-success">{{ $combo->present()->price }}</span>
                    </li>
                    <li>
                        <span class="name">Márgen de contribución</span>
                        <span class="value text-success">{!! $combo->present()->contribution_margin !!}</span>
                    </li>
                    <li>
                        <span class="name">Utilidad</span>
                        <span class="value text-success">{{ $combo->present()->utility }}</span>
                    </li>
                </ul>

                @if ($combo->properties->count() > 0)
                <div class="row">
                    <div class="col-md-12">
                        <p>Propiedades asignadas</p>
                        <ul class="list-inline">
                            @foreach ($combo->properties as $property)
                            <li><button class="btn btn-default btn-sm">{{ $property->label }}</button></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <div class="title level">
                                <h3 class="flex">
                                    Lista de productos
                                </h3>
                                <div class="btn-group">
                                   <a href="{{ route('combos.edit', [$combo->id]) }}" class="btn btn-primary">Administrar productos</a>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Unidad</th>
                                    <th class="text-center">Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($combo->productTypes as $type)
                                <tr>
                                    <td>{{ $type->activeProduct->name }}</td>
                                    <td class="text-center">{{ $type->name }}</td>
                                    <td class="text-center">{{ $type->quantity * $type->pivot->quantity }}</td>
                                    <td class="text-center">{{ $type->activeProduct->unity->name }}</td>
                                    <td class="text-right">{{ $type->present()->price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td class="text-right bg-warning"><strong>{{ $combo->present()->total }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
            </div>

        </div>

    @endcomponent

@endsection

