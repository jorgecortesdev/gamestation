<script id="configurable-template" type="text/x-handlebars-template">

@{{#each options}}
<label class="radio-inline">
    <input class="flat" name="product_id" type="radio" value="@{{id}}">&nbsp;@{{name}}
</label>
@{{/each}}

</script>