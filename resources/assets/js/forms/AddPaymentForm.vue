<template>
    <form @submit.prevent="onSubmit" class="form-inline" @keydown="form.errors.clear($event.target.name)">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input type="text" name="amount" class="form-control" placeholder="Cantidad" v-model="form.amount">
                <div class="input-group-addon">.00</div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" :disabled="form.isProcessing() || form.errors.any()">
            <i class="fa fa-spin fa-spinner" v-show="form.isProcessing()"></i> Abonar
        </button>
        <div class="item form-group bad" v-if="form.errors.has('amount')">
            <div class="alert gs-alert" v-text="form.errors.get('amount')"></div>
        </div>
    </form>
</template>

<script>
    export default {

        props: {
            eventId: { requiered: true }
        },

        data() {
            return {
                form: new Form({
                    amount: '',
                    event_id: this.eventId
                })
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/api/v1/statements')
                    .then(data => {
                        this.$emit('completed', data);
                        this.form.event_id = this.eventId;
                    })
                    .catch(errors => {});
            }
        }
    }
</script>

<style>
.gs-statements .input-group { margin-bottom: 0px }
.gs-statements .btn, button { margin: 0px }
.gs-statements .item .alert { margin: 0 0 0 10px; max-width: 185px; }
</style>