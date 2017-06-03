
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();
window.flash = function (message) {
    window.events.$emit('flash', message);
};

import { Vue2Dragula } from 'vue2-dragula';
import QuantifiableManager from './components/QuantifiableManager.vue';
import Statement from './components/Statement.vue';

Vue.use(Vue2Dragula);
Vue.component('quantifiable-manager', QuantifiableManager);
Vue.component('gs-statement', Statement);
Vue.component('flash', require('./components/Flash'));

const app = new Vue({
    el: '#app'
});
