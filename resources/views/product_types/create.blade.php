@extends('layouts.blank')

@section('main_container')

  <!-- page content -->
  <div class="right_col" role="main">

    <div class="page-title">
      <div class="title_left">
        <h3>Agregar tipo de producto</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <br>
            {!! Form::open(['route' => 'product_type.store', 'class' => 'form-horizontal form-label-left']) !!}
            @include('forms.catalog')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

  @include('includes.footer')
@endsection