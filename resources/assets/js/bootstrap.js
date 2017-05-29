import Vue from 'vue';
import axios from 'axios';
import Form from './core/Form';

window.Vue = Vue;
window.axios = axios;
window.Form = Form;

window.events = new Vue();
window.flash = function (message) {
    window.events.$emit('flash', message);
};

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import { Vue2Dragula } from 'vue2-dragula';
Vue.use(Vue2Dragula);
