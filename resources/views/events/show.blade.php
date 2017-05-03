@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        @include('includes/page-header', [
             'title'            => 'Evento #' . $event->id,
             'search_route'     => 'events.index'
        ])

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    @include('includes.panel-header', [
                        'entity' => $event,
                        'title' => '',
                        'buttons' => ['edit' => 'events.edit', 'back' => 'events.index']
                    ])
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                @include('events.cards.info')
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                @include('events.cards.date')
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                @include('events.cards.time')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">

                    @include('includes.panel-header', ['title' => 'Configuración'])

                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    @foreach ($products as $product)
                                    <strong>{{ $product['label'] }}</strong>
                                    <ul class="list-unstyled list-inline">
                                        @foreach ($product['products'] as $p)
                                            <li><i class="fa fa{{ $p['checked'] ? '-check' : '' }}-square-o"></i> {{ $p['name'] }}</li>
                                        @endforeach
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">

                    @include('includes.panel-header', ['title' => 'Propiedades'])

                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <dl>
                                        @foreach ($properties as $property)
                                        <dt>{{ $property['label'] }}</dt>
                                        <dd>{{ $property['value'] }}</dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    @include('includes.panel-header', ['title' => 'Estado de cuenta'])

                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Concepto</th>
                                                <th class="text-center">Cantidad</th>
                                                <th class="text-center">Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($statements as $concept)
                                            <tr>
                                                <td>{{ $concept['concept'] }}</td>
                                                <td class="text-center">{{ $concept['quantity'] }}</td>
                                                <td class="text-right">{{ $concept['price'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>


    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('includes.footer')
    <!-- /footer content -->
@endsection
