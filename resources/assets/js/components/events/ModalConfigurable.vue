<template>
    <div>

        <modal modal-id="modalConfigurable">
            <template slot="header">Selecciona el producto deseado</template>

            <form>
                <label v-for="option in this.options" class="radio-inline">
                    <input name="product_id"
                           type="radio"
                           v-bind:value="option.id"
                           v-model="form.product_id"
                           v-on:keyup.enter="saveConfiguration">&nbsp;{{ option.name }}
                </label>
                <label v-show="this.customizable" class="radio-inline">
                    <input name="product_id"
                           type="radio"
                           v-bind:value="null"
                           v-model="form.product_id">&nbsp;Otros
                    <input name="custom"
                           type="text"
                           v-model="form.custom"
                           v-on:keyup.enter="saveConfiguration"
                           :disabled="form.product_id !== null">
                </label>
            </form>

            <template slot="footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit"
                        class="btn btn-default"
                        @click="saveConfiguration"
                        :disabled="form.isProcessing() || form.errors.any()">
                    <i class="fa fa-spin fa-spinner" v-show="form.isProcessing()"></i> Guardar
                </button>
            </template>
        </modal>

    </div>
</template>

<script>
    import Modal from '../../components/Modal.vue';

    export default {
        components: { Modal },

        data() {
            return {
                eventId: '',
                configurationId: '',
                options: [],
                customizable: false,
                form: new Form({
                    product_id: '',
                    custom: ''
                })
            }
        },

        computed: {
            endPoint() {
                return '/api/v1/event/' + this.eventId + '/configuration/' + this.configurationId;
            }
        },

        mounted() {
            window.EventDispatcher.listen('modal.configurable.show', data => {
                this.eventId = data.eventId;
                this.configurationId = data.configurationId;
                this.activeModal();
            });
        },

        methods: {
            activeModal() {
                this.getOptions();
                window.EventDispatcher.fire('modal.show', 'modalConfigurable');
            },

            getOptions() {
                axios.get(this.endPoint)
                    .then(response => {
                        this.options = response.data.options;
                        this.customizable = response.data.customizable;
                    })
                    .catch(error => {
                        flash('Error: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                    });
            },

            saveConfiguration() {
                this.form.patch(this.endPoint)
                    .then(data => {
                        flash(data.message);
                        this.$emit('completed', data.data);
                        window.EventDispatcher.fire('modal.hide', 'modalConfigurable');
                        this.reset();
                    })
                    .catch(error => {
                        flash('Error: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                    });
            },

            reset() {
                this.options = [];
            }
        }
    }
</script>