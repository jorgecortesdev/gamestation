@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Extras</h3>
                    </div>
                    <div class="title_right">
                        <a href="{{ route('extra.create') }}" class="btn btn-default pull-right">
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
                        <h2>Listado de extras</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Para agregar productos de proveedores al extra en caso de que tuviera, este deberá existir previamente.</p>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($extras as $extra)
                                    <tr>
                                        <td>{{ $extra->id }}</td>
                                        <td>{{ $extra->name }}</td>
                                        <td class="text-right">{{ $extra->present()->price }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('extra.edit', [$extra->id]) }}"><i class="fa fa-edit"></i> Editar</a>
                                            &nbsp;|&nbsp;
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('extra.destroy', [$extra->id]) }}"> <i class="fa fa-trash"></i> Borrar</a>
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
                {{ $extras->links() }}
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Modal -->
    @include('modals.delete', ['entityText' => 'extra'])

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
