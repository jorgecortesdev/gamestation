<template>
    <div :class="alertClasses" role="alert" v-show="show">
        <i :class="iconClasses"></i> &nbsp; {{ body }}
    </div>
</template>

<script>
    export default {
        props: {
            message: String,
            level: {
                type: String,
                default: 'success'
            }
        },

        computed: {
            alertClasses() {
                return [
                    'alert',
                    this.type == 'success' ? 'alert-success' : 'alert-danger',
                    'alert-flash'
                ]
            },

            iconClasses() {
                return [
                    'fa',
                    'fa-lg',
                    this.type == 'success' ? 'fa-check-circle' : 'fa-times-circle',
                ]
            }
        },

        data() {
            return {
                body: this.message,
                type: this.level,
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message, this.level);
            }

            window.EventDispatcher.listen('flash', data => {
                this.flash(data.message, data.level);
            });
        },

        methods: {
            flash(message, level = 'success') {
                this.body = message;
                this.type = level;
                this.show = true;
                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 5000);
            }
        }
    }
</script>

<style>
.alert-flash {
    position: fixed;
    right: 25px;
    bottom: 25px;
    z-index: 1;
}
</style>