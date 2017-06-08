<template>

    <div class="row">
        <div class="col-md-12">
            <h4>Configurables</h4>

            <table class="table table-hover">
                <tbody>
                    <tr v-for="configuration in this.configurations">
                        <td>
                            <strong>{{ configuration.product_type }}</strong>
                            <sup><small>({{ configuration.type }})</small></sup>
                        </td>
                        <td class="text-center text-success" v-if="configuration.configured">
                            <i class="fa fa-check-square-o"></i> {{ configuration.product }}
                        </td>
                        <td class="text-center danger" v-else>
                            <i class="fa fa-ban text-danger"></i>
                        </td>
                        <td class="text-right">
                            <button-configurable
                                :event-id="configuration.event_id"
                                :configuration-id="configuration.configuration_id"
                            ></button-configurable>
                        </td>
                    </tr>
                </tbody>
            </table>

            <modal-configurable @completed="addConfiguration"></modal-configurable>
        </div>
    </div>

</template>

<script>
    import ButtonConfigurable from './ButtonConfigurable.vue';

    export default {
        components: { ButtonConfigurable },

        props: {
            eventId: { required: true },
        },

        data() {
            return {
                configurations: []
            }
        },

        mounted() {
            axios.get('/api/v1/event/' + this.eventId + '/configuration')
                .then(response => {
                    this.configurations = response.data.data;
                })
                .catch(error => {
                    flash('Error: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                });
        },

        methods: {
            addConfiguration(configuration) {
                this.configurations = this.configurations.map(item => {
                    if (item.configuration_id == configuration.configuration_id) {
                        return configuration;
                    }
                    return item;
                });
            }

        }
    }
</script>