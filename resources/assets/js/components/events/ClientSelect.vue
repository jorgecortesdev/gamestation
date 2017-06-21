<template>

    <div>

        <div class="form-group">
            <label for="client_id" class="control-label">Cliente</label>

            <select class="form-control" name="client_id" id="client_id">
                <slot></slot>
            </select>
        </div>

        <div class="form-group" v-if="client.kids">
            <label for="kid_id" class="control-label">Niños</label>

            <div class="btn-group btn-block" data-toggle="buttons" v-for="kid in client.kids">
                <label class="btn btn-default" :class="kid.id == selectedKid ? 'active' : ''">
                    <input type="radio" name="kid_id" autocomplete="off" :value="kid.id" :checked="kid.id == selectedKid">
                    <span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;{{ kid.name }}
                </label>
            </div>
        </div>

    </div>

</template>

<script>
    require('select2');

    export default {
        props: ['options', 'value', 'selectedKid'],

        data() {
            return {
                config: {
                    data: this.options,
                    theme: "bootstrap",
                    minimumInputLength: 2,
                    language: {
                        inputTooShort: (args) => {
                            return this.inputTooShort(args);
                        }
                    },
                    ajax: {
                        url: "/api/v1/client/search/select2",
                        dataType: 'json',
                        delay: 250,
                        data: (params) => {
                            return {
                                q: params.term,
                                page: params.page
                            };
                        },
                        processResults: (data, params) => {
                            params.page = params.page || 1;

                            return {
                                results: data.data.items,
                                pagination: {
                                    more: (params.page * 30) < data.data.total_count
                                }
                            };
                        },
                        cache: true
                    }
                },
                client: []
            }
        },

        mounted() {

            $('#client_id')
                .select2(this.config)
                .val(this.value)
                .trigger('change')
                .on('change', () => {
                    this.$emit('input', this.value)
                });

            $('#client_id')
                .on('select2:select', (event) => {
                    this.fetchClient($(event.currentTarget).find("option:selected").val());
                });

            if ($('#client_id').val()) {
                $('#client_id').trigger('select2:select');
            }

        },

        watch: {
            value: (value) => {
                $('#client_id').val(value).trigger('change');
            },

            options: (options) => {
                $('#client_id').select2({ data: options });
            },

            destroyed: () => {
                $('#client_id').off().select2('destroyed');
            }

        },

        methods: {

            inputTooShort(args) {
                return 'Introduce '
                    + (args.minimum - args.input.length)
                    + ' o más letras';
            },

            fetchClient(id) {
                axios.get('/api/v1/client/' + id)
                    .then(response => {
                        this.client = response.data.data;
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            }
        }
    }
</script>