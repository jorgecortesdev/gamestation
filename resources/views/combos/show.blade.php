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
                    <div class="x_title prod_color combo">
                        <h2>{{ $combo->name }} <div class="combo-color color bg-{{ $combo->color }}"></div></h2>
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
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Lista de productos</h2>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Costo</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($combo->items as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->present()->price }}</td>
                                            <td class="text-right"><a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('combo.destroy_item', [$item->id]) }}"> <i class="fa fa-trash"></i> Remover</a></td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td class="bg-warning"><strong>{{ $combo->present()->total }}</strong></td>
                                            <td>&nbsp;</td>
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

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'producto'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection