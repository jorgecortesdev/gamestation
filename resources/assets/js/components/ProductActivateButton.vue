<template>
    <button :class="classes" @click="toggleActive()" v-text="buttonText"></button>
</template>

<script>
    export default {
        props: {
            productTypeId: { required: true },
            productId: { required: true },
            active: { required: true, type: Boolean }
        },

        data() {
            return {
                isActive: this.active
            }
        },

        computed: {
            classes() {
                return ['btn', this.isActive ? 'btn-primary' : 'btn-default' ];
            },

            endPoint() {
                return '/api/v1/product-types/' + this.productTypeId + '/activate/' + this.productId;
            },

            buttonText() {
                return this.isActive ? 'Desactivar' : 'Activar';
            }
        },

        methods: {
            toggleActive() {
                axios.patch(this.endPoint)
                    .then(data => {
                        this.isActive = ! this.isActive;
                    })
                    .catch(errors => {
                        flash('Error: ' + Object.getOwnPropertyDescriptor(errors, 'message').value);
                    });
            }
        }
    }
</script>