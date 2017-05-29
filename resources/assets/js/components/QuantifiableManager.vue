<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Administrador de Productos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Arrastrar el producto de la lista de la izquierda a la derecha, cuando hayas terminado oprime el
                    botón de guardar ubicado en la parte inferior de los contenedores.</p>

                    <div class="d-wrapper">
                        <div id="left-container" class="d-container d-container-left" v-dragula="available" drake="first-bag">
                            <div v-for="item in available" :key="item.id">
                                {{item.name}} - {{item.quantity}} {{item.unity}}
                                <div class="pull-right">Cantidad: <input size="4" type="text" :value="item.selected = 1" disabled></div>
                            </div>
                        </div>
                        <div id="right-container" class="d-container d-container-right" v-dragula="selected" drake="first-bag">
                            <div v-for="item in selected">
                                {{item.name}} - {{item.quantity}} {{item.unity}}
                                <div class="pull-right">
                                    Cantidad: <input size="4"
                                                     type="text"
                                                     v-bind:value="item.selected"
                                                     v-model.number="item.selected"
                                                     @click="$event.target.select()">
                                </div>
                            </div>
                        </div>
                    </div>

                    <form @submit.prevent="onSubmit" class="pull-right">
                        <div class="item form-group">
                            <button class="btn btn-success" type="submit" :disabled="isLoading">
                                <i class="fa fa-spin fa-spinner" v-show="isLoading"></i> Guardar
                            </button>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            entityId: { required: true },
            entityType: { required: true }
        },

        data() {
            return {
                available: [],
                selected: [],
                isLoading: false
            }
        },

        methods: {
            onSubmit() {
                this.isLoading = true;
                axios.patch('/quantities/' + this.entityId + '/' + encodeURI(this.entityType), {
                        items: this.selected
                    })
                    .then((response) => {
                        this.isLoading = false;
                        flash('La lista se guardó con éxito')
                    })
                    .catch((error) => {
                        alert('ERROR: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                        this.isLoading = false;
                    });
            },

            addAvailableItems(items) {
                $.each(items, function(i, val) {
                    this.available.push(val);
                }.bind(this));
            },

            addSelectedItems(items) {
                $.each(items, function(i, val) {
                    this.selected.push(val);
                }.bind(this));
            }
        },

        mounted() {
            axios.get('/quantities/' + this.entityId + '/' + encodeURI(this.entityType))
                .then((response) => {
                    this.addAvailableItems(response.data.available);
                    this.addSelectedItems(response.data.selected);
                })
                .catch((error) => {
                    alert('ERROR AL CARGAR LA LISTA: ' + Object.getOwnPropertyDescriptor(error, 'message').value);
                });
        }
    }
</script>

<style>
.gu-mirror {
  position: fixed !important;
  margin: 0 !important;
  z-index: 9999 !important;
  opacity: 0.8;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
  filter: alpha(opacity=80);
}
.gu-hide {
  display: none !important;
}
.gu-unselectable {
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
}
.gu-transit {
  opacity: 0.2;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
  filter: alpha(opacity=20);
}
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
.d-wrapper .d-container > div,
.gu-mirror {
    margin: 10px;
    padding: 10px 15px;
    cursor: move;
    cursor: grab;
    cursor: -moz-grab;
    cursor: -webkit-grab;
    background-color: #eaeaea;
    border: 1px solid #aaaaaa;
    border-radius: 4px;
    color: #000000;
}
.d-wrapper .d-container > div input,
.gu-mirror input {
    height: 20px;
    padding: 6px 12px;
    font-size: 14px;
    text-align: right;
}
.gu-mirror {
    cursor: grabbing;
    cursor: -moz-grabbing;
    cursor: -webkit-grabbing;
}
</style>