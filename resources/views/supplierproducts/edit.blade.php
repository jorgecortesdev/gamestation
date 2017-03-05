@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3>Editar producto</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br>
                        {!! Form::model($supplier_product, ['route' => ['supplier_product.update', $supplier_product->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('forms.supplier_product', ['sendButtonText' => 'Actualizar'])
                        {!! Form::close() !!}
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