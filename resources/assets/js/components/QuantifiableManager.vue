<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Administrador de Productos</h3>
                </div>

                <div class="panel-body">
                    <p>Arrastrar el producto de la lista de la izquierda a la derecha, cuando hayas terminado oprime el
                    botón de guardar ubicado en la parte inferior de los contenedores.</p>

                    <div class="d-wrapper">
                        <draggable v-model="available" :options="dragOptions">
                            <transition-group tag="div" class="d-container d-container-left">
                                <div v-for="item in available" :key="item.id">
                                    {{item.name}} - {{item.quantity}} {{item.unity}}
                                    <div class="pull-right">
                                        Cantidad: <input size="4" type="text" :value="item.selected = 1" disabled>
                                    </div>
                                </div>
                            </transition-group>
                        </draggable>

                        <draggable v-model="selected" :options="dragOptions">
                            <transition-group tag="div" class="d-container d-container-right">
                                <div v-for="item in selected" :key="item.id">
                                    {{item.name}} - {{item.quantity}} {{item.unity}}
                                    <div class="pull-right">
                                        Cantidad: <input size="4"
                                                         type="text"
                                                         v-bind:value="item.selected"
                                                         v-model.number="item.selected"
                                                         @click="$event.target.select()">
                                    </div>
                                </div>
                            </transition-group>
                        </draggable>
                    </div>

                    <form @submit.prevent="onSubmit" class="pull-right">
                        <div class="item form-group">
                            <button class="btn btn-success" type="submit" :disabled="isLoading">
                                <i class="fa fa-spin fa-spinner" v-show="isLoading"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'

export default {
    name: 'QuantifiableManager',

    components: { draggable },

    props: {
        entityId: { required: true },
        entityType: { required: true }
    },

    data () {
        return {
            available: [],
            selected: [],
            isLoading: false
        }
    },

    methods: {

        onSubmit() {
            this.isLoading = true;
            axios.patch(this.endPoint, {
                    items: this.selected
                })
                .then(response => {
                    this.isLoading = false;
                    flash('La lista se guardó con éxito')
                })
                .catch(error => {
                    flash('ERROR: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                    this.isLoading = false;
                });
        },

        updateLists() {

            axios.get(this.endPoint)
                .then(response => {
                    this.available = response.data.available;
                    this.selected = response.data.selected;
                })
                .catch(error => {
                    flash('ERROR AL CARGAR LA LISTA: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                });

        }

    },

    computed: {
        dragOptions () {
            return  {
                animation: 0,
                group: 'description',
                ghostClass: 'ghost'
            };
        },

        endPoint() {
            return '/api/v1/quantities/entity/'
                + this.entityId
                + '/type/'
                + encodeURI(this.entityType);
        }
    },

    mounted() {
        this.updateLists();
    }
}
</script>

<style>
.d-wrapper {
    margin: 20px 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}
.d-wrapper .d-container {
    height: 300px;
    width: 48%;
    border: 1px solid #e1e1e1;
    background-color: #fbfbfb;
    overflow: scroll;
    border-radius: 4px;
}
.d-wrapper .d-container.d-container-left {
    float: left;
}
.d-wrapper .d-container.d-container-right {
    float: right;
}
.d-wrapper .d-container > div {
    margin: 10px;
    padding: 10px 15px;
    cursor: grab;
    cursor: -moz-grab;
    cursor: -webkit-grab;
    background-color: #eaeaea;
    border: 1px solid #aaaaaa;
    border-radius: 4px;
    color: #000000;
}
.d-wrapper .d-container > div input {
    height: 24px;
    padding: 6px 12px;
    font-size: 14px;
    text-align: right;
}
</style>