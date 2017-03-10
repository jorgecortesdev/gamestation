@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3>Información de Paquete</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <br>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><div class="gs-inline-block combo-color combo-color-bg-{{ $combo->google_color_id }}"></div> Paquete {{ $combo->name }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="stats-overview">
                                <li>
                                    <span class="name">Costo unitario</span>
                                    <span class="value text-success">{{ $combo->present()->price }}</span>
                                </li>
                                <li>
                                    <span class="name">Márgen de contribución</span>
                                    <span class="value text-success">{{ $combo->present()->contribution_margin }}</span>
                                </li>
                                <li>
                                    <span class="name">Utilidad</span>
                                    <span class="value text-success">{{ $combo->present()->utility }}</span>
                                </li>
                            </ul>
                        </div>
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
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Unidad</th>
                                        <th class="text-center">Costo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combo->products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td class="text-center">{{ $product->pivot->quantity }}</td>
                                            <td class="text-center">{{ $product->unity->name }}</td>
                                            <td class="text-right">{{ $combo->present()->productTotal($product->id) }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
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
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection