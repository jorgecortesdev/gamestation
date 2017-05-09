<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.components.panel.header', ['title' => 'Estado de cuenta'])

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Concepto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice as $good)
                                <tr>
                                    <td>{!! $good->concept !!}</td>
                                    <td class="text-center">{{ $good->quantity }}</td>
                                    <td class="text-right">{{  money_format('%.2n', $good->price) }}</td>
                                    <td class="text-right">{{ money_format('%.2n', $good->total) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                    <td class="text-right">{{ money_format('%.2n', $invoice->total()) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>