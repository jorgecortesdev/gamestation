@push('stylesheets')
<link href="{{ asset("css/dragula.css") }}" rel="stylesheet">
@endpush

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Administrador de Productos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Arrastrar el producto de la lista de la izquierda a la derecha, cuando hayas terminado oprime el botón de guardar ubicado en la parte inferior de los contenedores.</p>

                <script type="text/javascript">window['pm_entity'] = '{{ $entity_name }}';</script>
                <script type="text/javascript">window['pm_entity_id'] = {{ $entity->id }};</script>

                <div class="dragula-wrapper">
                    <div id="left-container" class="dragula-container dragula-container-left"></div>
                    <div id="right-container" class="dragula-container dragula-container-right"></div>
                </div>

                {{ Form::open(['route' => ['productmanager.update', $entity_name, $entity->id], 'id' => 'saveProductForm']) }}
                    <div class="item form-group">
                        {!! Form::button(isset($sendButtonText) ? $sendButtonText : 'Guardar', ['class' => 'pull-right btn btn-success', 'type' => 'submit']) !!}
                    </div>
                {{ Form::close() }}

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- handlebars template -->
@include('handlebars.productmanager.product')
<!-- /handlebars template -->

@push('scripts')
<script src="{{ asset("js/dragula.js") }}"></script>
<script src="{{ asset("js/handlebars.min.js") }}"></script>
<script src="{{ asset("js/handlebars-intl.min.js") }}"></script>
<script src="{{ asset("js/gsproductmanager.js") }}"></script>
@endpush