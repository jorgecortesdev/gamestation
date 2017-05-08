<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('includes.panel-header', ['title' => 'Propiedades'])

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if ($properties->count() > 0)
                        <table class="table table-hover table-no-top-border">
                            <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td><strong>{{ $property->label }}</strong></td>
                                    <td class="text-center text-success">{!! $property->present()->value !!}</td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i> Configurar</a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td><div class="alert text-center">Sin propiedades</div></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>