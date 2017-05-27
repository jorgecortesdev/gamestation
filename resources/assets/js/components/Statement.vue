<template>
<div class="gs-statements row" v-show="isLoaded">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_title">
                <h2>Estado de Cuenta</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-hover table-bordered">
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
                                    <td class="text-right">{{ statement.amount | currency }}</td>
                                    <td class="text-right" v-if="statement.charge">{{ statement.amount | currency }}</td>
                                    <td class="text-right" v-else> - </td>
                                    <td class="text-right" v-if=" ! statement.charge">{{ statement.amount | currency }}</td>
                                    <td class="text-right" v-else> - </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td class="text-right">{{ chargeTotal | currency }}</td>
                                    <td class="text-right">{{ paymentTotal | currency }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="table-responsive">
                            <table class="table controls">
                                <tbody>
                                    <tr>
                                        <td><add-payment-form @completed="addToPaymentTable" :event-id="eventId"></add-payment-form></td>
                                        <td class="text-right debt">DEUDA <span>{{ debt | currency }}</span></td>
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

import AddPaymentForm from '../forms/AddPaymentForm';

export default {
    components: { AddPaymentForm },

    props: {
        eventId: { requiered: true }
    },

    data() {
        return {
            isLoaded: false,
            statements: [],
            chargeTotal: 0,
            paymentTotal: 0,
            debt: 0
        }
    },

    filters: {
        currency(amount) {
            return "$ " + amount.toFixed(2).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,");
        }
    },

    mounted() {
        axios.get('/statements/' + this.eventId)
            .then(response => {
                this.statements = response.data;
                this.doCalculation();
                this.isLoaded = true;
            })
            .catch(error => {
                alert('ERROR AL CARGAR ESTADO DE CUENTA: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
            });
    },

    methods: {
        addToPaymentTable(payment) {
            this.statements.push(payment);
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
        }
    }
}
</script>

<style>
.gs-statements tfoot input { margin: 0px }
.gs-statements .debt { font-size: 20px; font-weight: 200 }
.gs-statements .debt span { font-weight: 500 }
.gs-statements table.controls { margin-bottom: 0px; }
.gs-statements table.controls tr td { border-top: 0px }
.gs-statements table.controls tr td:first-child { padding-left: 0px; }
.gs-statements table.controls tr td:last-child { padding-right: 0px; }
</style>