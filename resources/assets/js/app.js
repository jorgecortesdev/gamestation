require('./bootstrap');

import QuantifiableManager from './components/QuantifiableManager.vue';
import Statement from './components/Statement.vue';

Vue.component('quantifiable-manager', QuantifiableManager);
Vue.component('gs-statement', Statement);
Vue.component('flash', require('./components/Flash'));

const app = new Vue({
    el: '#main'
});
