<template>
<div class="gs-statements row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_title">
                <h2>Estado de Cuenta</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div v-show="isLoading" class="loading">
                            <span><i class="fa fa-spin fa-spinner"></i> Cargando &#8230;</span>
                        </div>
                        <table class="table table-hover table-bordered" v-show="!isLoading">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Concepto</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Cargo</th>
                                    <th class="text-center">Abono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="statement in statements">
                                    <td class="text-center">{{ statement.created_at }}</td>
                                    <td>{{ statement.description }}</td>
                                    <td class="text-center">{{ statement.quantity }}</td>
                                    <td class="text-right">{{ currencyFormater(statement.amount) }}</td>
                                    <td class="text-right" v-if="statement.charge">{{ currencyFormater(statement.amount) }}</td>
                                    <td class="text-right" v-else> - </td>
                                    <td class="text-right" v-if=" ! statement.charge">{{ currencyFormater(statement.amount) }}</td>
                                    <td class="text-right" v-else> - </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td class="text-right">{{ currencyFormater(chargeTotal) }}</td>
                                    <td class="text-right">{{ currencyFormater(paymentTotal) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="table-responsive">
                            <table class="table controls">
                                <tbody>
                                    <tr>
                                        <td>
                                            <form @submit.prevent="onSubmit" class="form-inline" @keydown="form.errors.clear($event.target.name)">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">$</div>
                                                        <input type="text" name="amount" class="form-control" placeholder="Cantidad" v-model="form.amount">
                                                        <div class="input-group-addon">.00</div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit" :disabled="isSaving || form.errors.any()">
                                                    <i class="fa fa-spin fa-spinner" v-show="isSaving"></i> Abonar
                                                </button>
                                                <div class="item form-group bad" v-if="form.errors.has('amount')">
                                                    <div class="alert gs-alert" v-text="form.errors.get('amount')"></div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-right debt">
                                            DEUDA <span>{{ currencyFormater(debt) }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

class Errors {

    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }

        this.errors = {};
    }
}

class Form {

    constructor (data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    post(url) {
        return this.submit('post', url);
    }

    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    reject(error.response.data);
                });
        });
    }

    onSuccess(data) {
        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

export default {
    props: {
        eventId: { requiered: true }
    },

    data() {
        return {
            isLoading: true,
            isSaving: false,
            statements: [],
            chargeTotal: 0,
            paymentTotal: 0,
            debt: 0,
            form: new Form({
                amount: '',
                event_id: this.eventId
            })
        }
    },

    mounted() {
        axios.get('/statements/' + this.eventId)
            .then(response => {
                this.statements = response.data;
                this.doCalculation();
                this.isLoading = false;
            })
            .catch(error => {
                alert('ERROR AL CARGAR ESTADO DE CUENTA: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
            });

    },

    methods: {
        onSubmit() {
            this.isSaving = true;
            this.form.post('/statements')
                .then(data => {
                    this.statements.push(data);
                    this.form.event_id = this.eventId;
                    this.isSaving = false;
                })
                .catch(errors => {
                    this.isSaving = false;
                });
        },

        doCalculation() {
            for (let i = 0; i < this.statements.length; i++) {
                if (this.statements[i].charge) {
                    this.chargeTotal += this.statements[i].amount;
                } else {
                    this.paymentTotal += this.statements[i].amount;
                }
                this.debt = this.chargeTotal - this.paymentTotal;
            }
        },

        currencyFormater(amount) {
            return "$ " + amount.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,")
        }
    }
}
</script>

<style>
.gs-statements .loading { min-height: 150px; text-align: center; }
.gs-statements tfoot input { margin: 0px }
.gs-statements .input-group { margin-bottom: 0px }
.gs-statements .btn, button { margin: 0px }
.gs-statements .debt { font-size: 20px; font-weight: 200 }
.gs-statements .debt span { font-weight: 500 }
.gs-statements table.controls { margin-bottom: 0px; }
.gs-statements table.controls tr td { border-top: 0px }
.gs-statements table.controls tr td:first-child { padding-left: 0px; }
.gs-statements table.controls tr td:last-child { padding-right: 0px; }
.gs-statements .item .alert { margin: 0 0 0 10px; max-width: 185px; }
</style>