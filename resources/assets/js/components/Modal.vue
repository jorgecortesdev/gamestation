<template>

    <div :id="this.modalId" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="modal-title">
                        <slot name="header"></slot>
                    </h4>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer"></slot>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</template>

<script>
    export default {
        props: {
            modalId: { required: true }
        },

        mounted() {
            window.EventDispatcher.listen('modal.show', modalId => {
                this.showModal(modalId);
            });

            window.EventDispatcher.listen('modal.hide', modalId => {
                this.hideModal(modalId);
            });
        },

        methods: {
            showModal(modalId) {
                $('#' + modalId).modal('show');
            },

            hideModal(modalId) {
                $('#' + modalId).modal('hide');
            }
        }
    }

</script>
