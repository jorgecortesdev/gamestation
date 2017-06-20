<script>
    import EventDatepicker from '../components/events/DatePicker.vue';
    import ClientSelect from '../components/events/ClientSelect.vue';

    export default {
        props: [ 'selectedClient', 'selectedKid' ],

        components: {
            EventDatepicker,
            ClientSelect
        },

        data() {
            return {
                initialDate: '',
                selected: this.selectedClient[0].id,
                options: this.selectedClient
            }
        },

    }
</script>