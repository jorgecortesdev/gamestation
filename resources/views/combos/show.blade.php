@extends('includes.page.content')

@section('page_content')

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Información de Paquete</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><div class="gs-inline-block combo-color combo-color-bg-{{ $combo->google_color_id }}"></div> Paquete {{ $combo->name }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
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
                    </div>
                </div>
                @if ($combo->properties->count() > 0)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p class="gs-p-title">Propiedades asignadas</p>
                        <ul class="list-inline gs-list-product-types">
                            @foreach ($combo->properties as $property)
                            <li><button class="btn btn-default btn-sm">{{ $property->label }}</button></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br>
                @endif
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="gs-title combo-color-bg-{{ $combo->google_color_id }} transparent">
                            <div class="col-md-6">
                                <h2>Lista de productos</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="gs-title-controls">
                                    <a href="{{ route('combo.edit', [$combo->id]) }}" class="pull-right gs-inline-block btn btn-default">Administrar productos</a>
                                </div>
                            </div>
                        </div>
                        <br>
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
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-right bg-warning"><strong>{{ $combo->present()->total }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
