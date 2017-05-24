<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', ['title' => 'Estado de cuenta'])

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Concepto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Costo Unitario</th>
                                    <th class="text-center">Cargo</th>
                                    <th class="text-center">Abono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice as $good)
                                <tr>
                                    <td class="text-center">2015.25.05</td>
                                    <td>{!! $good->concept !!}</td>
                                    <td class="text-center">{{ $good->quantity }}</td>
                                    <td class="text-right">{{  money_format('%.2n', $good->price) }}</td>
                                    <td class="text-right">{{ money_format('%.2n', $good->total) }}</td>
                                    <td class="text-right">$ 0.00</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td class="text-right">{{ money_format('%.2n', $invoice->total()) }}</td>
                                    <td class="text-right">$ 0.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td>Por pagar</td>
                                    <td class="text-right">$ 3,200.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>