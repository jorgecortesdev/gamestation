<template>
    <div class="InputAddOn">
        <span class="InputAddOn-item"><i class="fa fa-fw fa-calendar"></i></span>
        <input type="text" id="occurs_on" name="occurs_on" class="InputAddOn-field" :value="value">
        <span :class="verifyMessageClasses" v-if="showStatus" v-html="verifyMessage"></span>
    </div>
</template>

<script>
    require('daterangepicker');

    export default {

        name: 'EventDatepicker',

        props: ['value', 'currentDate'],

        data() {
            return {
                verifyMessageClasses: [],
                verifyMessage: '',
                showStatus: false,
                isAvailable: false
            }
        },

        mounted() {
            this.$emit('loaded', this.currentDate)

            $('#occurs_on').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                timePicker: true,
                timePickerIncrement: 30,
                timePicker24Hour: true,
                startDate: this.currentDate,
                locale: {
                    format: 'MMMM D, YYYY h:mm A'
                }
            });

            $('#occurs_on').on('apply.daterangepicker', (ev, picker) => {
                this.verifyDate(picker.startDate.toDate());
                this.$emit('input', picker.startDate.format('MMMM D, YYYY h:mm A'));
            });
        },

        methods: {

            resetVerifyMessage() {
                this.verifyMessageClasses = ['InputAddOn-item'];
                this.verifyMessage = 'Verificando...';
            },

            verifyDate(date) {
                this.resetVerifyMessage();

                this.showStatus = true;

                axios.post('/api/v1/calendar/verify', {'start': date})
                    .then(response => {
                        this.isAvailable = ! response.data.data.busy;
                        this.verifyMessage = this.buildVerifyMessage(this.isAvailable);
                    })
                    .catch(errors => {
                        flash('Error: ' + Object.getOwnPropertyDescriptor(errors, 'message').value, 'danger');
                    });
            },

            buildVerifyMessage(isAvailable) {
                this.verifyMessageClasses.push(isAvailable ? 'text-success' : 'text-danger');
                return isAvailable
                    ? '<i class="fa fa-fw fa-check"></i> Disponible'
                    : '<i class="fa fa-fw fa-ban"></i> No disponible';
            }
        }
    }

</script>
