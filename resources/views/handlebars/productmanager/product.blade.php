<script id="entry-template" type="text/x-handlebars-template">
    <div data-id="@{{id}}">
        @{{name}} - @{{supplier_product.supplier.name}} - @{{formatNumber supplier_product.unit_cost style="currency" currency="USD"}}
        <div class="pull-right">Cantidad: <input size="4" type="text" value="@{{#if pivot.quantity }}@{{pivot.quantity}}@{{else}}1@{{/if}}"></div>
    </div>
</script>