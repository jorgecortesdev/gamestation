@extends('layouts.blank')

@section('main_container')

  <!-- page content -->
  <div class="right_col" role="main">

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="page-title">
          <div class="title_left">
            <h3>Tipo de Productos</h3>
          </div>
          <div class="title_right">
            <a href="{{ route('product_type.create') }}" class="btn btn-default pull-right">
              <i class="fa fa-plus-square"></i> Agregar
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product_types as $product_type)
                  <tr>
                    <td>{{ $product_type->id }}</td>
                    <td>{{ $product_type->name }}</td>
                    <td class="text-right">
                      <a href="{{ route('product_type.edit', [$product_type->id]) }}">
                        <i class="fa fa-edit"></i> Editar
                      </a>
                      &nbsp;|&nbsp;
                      <a href="#" data-toggle="modal" data-target="#deleteModal" data-action="{{ route('product_type.destroy', [$product_type->id]) }}">
                        <i class="fa fa-trash"></i> Borrar
                      </a>
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
        {{ $product_types->links() }}
      </div>
    </div>
  </div>
  <!-- /page content -->

  @include('modals.delete', ['entityText' => 'tipo de producto'])
  @include('includes.footer')
@endsection
