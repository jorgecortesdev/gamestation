<script id="property-template" type="text/x-handlebars-template">

@{{#each properties}}
<div class="event-property clearfix">
    {!! Form::label('properties', '@{{label}}', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-10 col-sm-10 col-xs-12">
        @{{#if (eq render "texto")}}
            <div class="no-gutter">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="text" class="form-control">
                </div>
            </div>
        @{{else}}
            @{{#each options}}
                <label class="@{{../render}} @{{../render}}-inline">
                    <input class="flat" type="@{{../render}}"> @{{this}}
                </label>
            @{{/each}}
        @{{/if}}
    </div>

</div>
@{{/each}}

</script>