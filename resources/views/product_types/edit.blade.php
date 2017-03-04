@extends('layouts.blank')

@section('main_container')

  <!-- page content -->
  <div class="right_col" role="main">

    <div class="page-title">
      <div class="title_left">
        <h3>Editar un tipo de producto</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <br>
            {!! Form::model($product_type, ['route' => ['product_type.update', $product_type->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
            @include('forms.catalog', ['sendButtonText' => 'Actualizar'])
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

  @include('includes.footer')
@endsection
