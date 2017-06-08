
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Form & errors
 */
import Form from './core/Form';
window.Form = Form;

/**
 * Events
 */
import EventDispatcher from './core/EventDispatcher';
window.EventDispatcher = new EventDispatcher();

window.flash = function (message) {
    window.EventDispatcher.fire('flash', message);
};

import { Vue2Dragula } from 'vue2-dragula';
import QuantifiableManager from './components/QuantifiableManager.vue';
import EventStatement from './components/events/EventStatement.vue';
import ModalConfigurable from './components/events/ModalConfigurable.vue';
import EventConfigurables from './components/events/EventConfigurables.vue';

Vue.use(Vue2Dragula);
Vue.component('quantifiable-manager', QuantifiableManager);
Vue.component('flash', require('./components/Flash'));
Vue.component('event-statement', EventStatement);
Vue.component('event-configurables', EventConfigurables);
Vue.component('modal-configurable', ModalConfigurable);

const app = new Vue({
    el: '#app'
});
