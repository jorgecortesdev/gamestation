<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
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
</div>