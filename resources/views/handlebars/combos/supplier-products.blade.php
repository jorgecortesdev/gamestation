<script id="entry-template" type="text/x-handlebars-template">
    <div data-id="@{{id}}">
        @{{name}} - @{{supplier.name}} - @{{formatNumber unit_cost style="currency" currency="USD"}}
        <div class="pull-right">Cantidad: <input size="4" type="text" value="1"></div>
    </div>
</script>