<template>

    <button type="button" class="btn btn-primary" @click="showModal">
        <i class="fa fa-cogs"></i> Configurar</a>
    </button>

</template>

<script>
    export default {
        props: {
            eventId: { required: true },
            configurationId: { required: true }
        },

        methods: {
            showModal() {
                window.EventDispatcher.fire(
                    'modal.configurable.show',
                    {
                        eventId: this.eventId,
                        configurationId: this.configurationId,
                    }
                );
            }
        }
    }
</script>