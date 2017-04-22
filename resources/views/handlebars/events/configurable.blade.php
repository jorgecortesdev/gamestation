<script id="configurable-template" type="text/x-handlebars-template">

@{{#each configurables}}
<div class="event-configurable clearfix">
    {!! Form::label('configurables', '@{{label}}', ['class' => 'control-label col-md-2 col-sm-2 col-xs-12']) !!}
    <div class="col-md-10 col-sm-10 col-xs-12">
        @{{#each products}}
        <label class="@{{../render}} @{{../render}}-inline">
            <input class="flat" name="configurables[]" type="@{{../render}}" value="@{{@key}}">&nbsp;
            @{{this}}
        </label>
        @{{/each}}

        @{{#if customizable}}
        <label class="@{{render}} @{{render}}-inline">
            <input class="flat" name="configurables[]" type="@{{render}}" value="0">&nbsp;
            Otros
            &nbsp;{!! Form::text('algo', null) !!}
        </label>
        @{{/if}}
    </div>

</div>
@{{/each}}

</script>