<script id="property-template" type="text/x-handlebars-template">

<div class="row">
    <div class="col-md-12 col-md-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('property', '@{{label}}', ['class' => 'col-md-4 col-sm-4 col-xs-12 control-label']) !!}
            @{{#if (eq render "texto")}}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control" name="value">
                </div>
            @{{else}}
                @{{#each options}}
                    <label class="@{{../render}} @{{../render}}-inline">
                        <input class="flat" type="@{{../render}}" value="@{{@index}}" name="options[]"> @{{this}}
                    </label>
                @{{/each}}
            @{{/if}}
        </div>
    </div>
</div>

</script>