<fieldset>
    <legend>Extras</legend>

    <div class="item form-group">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p>Arrastra el extra que deseas agregar de la izquierda a la derecha y cambia la cantidad dependiendo del gusto del cliente.</p>
            <div class="dragula-wrapper">
                <div id="left-container" class="dragula-container dragula-container-left"></div>
                <div id="right-container" class="dragula-container dragula-container-right"></div>
            </div>
        </div>
    </div>

</fieldset>

<!-- handlebars template -->
@include('handlebars.events.extra')
<!-- /handlebars template -->
