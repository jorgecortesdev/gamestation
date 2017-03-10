@extends('layouts.blank')

@push('stylesheets')
<link href="{{ asset("css/dragula.css") }}" rel="stylesheet">
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="page-title">
            <div class="title_left">
                <h3>Editar Paquete</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos del paquete <small>(Todos los campos son requeridos)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        {!! Form::model($combo, ['route' => ['combo.update', $combo->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left']) !!}
                            @include('forms.combo')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Agregar productos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p>Debes seleccionar el tipo de producto y posteriormente arrastrar el producto de la lista de la izquierda
                        a la lista de la derecha, cuando hayas terminado oprime el botón de guardar ubicado en la parte inferior
                        de los contenedores.</p>
                        <br>
                        {{ Form::open() }}
                            {!! Form::select(
                                'product_type',
                                $product_types,
                                null,
                                ['class' => 'form-control', 'placeholder' => '-- Selecciona el tipo de producto --', 'id' => 'productType'])
                            !!}
                        {{ Form::close() }}

                        <div class="dragula-wrapper">
                            <div id="left-container" class="dragula-container dragula-container-left"></div>
                            <div id="right-container" class="dragula-container dragula-container-right">
                                @foreach ($combo->products as $product)
                                    <div data-id="{{ $product->id }}">
                                        {{ $product->name }} - {{ $product->supplier->name }} - {{ $product->present()->unit_cost }}
                                        <div class="pull-right">Cantidad: <input size="4" type="text" value="{{ $product->pivot->quantity }}"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{ Form::open(['route' => ['combopr', $combo->id], 'id' => 'saveProductForm']) }}
                            {{ Form::hidden('combo_id', $combo->id) }}
                            <div class="item form-group">
                                {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'pull-right btn btn-success', 'type' => 'submit']) !!}
                            </div>
                        {{ Form::close() }}

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->

    @include('handlebars.combos.supplier-products')
@endsection

@push('scripts')
<script src="{{ asset("js/dragula.js") }}"></script>
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/gscombo.js") }}"></script>
@endpush