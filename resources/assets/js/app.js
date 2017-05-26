require('./bootstrap');

window.Vue = require('vue');

import { Vue2Dragula } from 'vue2-dragula';
Vue.use(Vue2Dragula);

import QuantifiableManager from './components/QuantifiableManager.vue';
import Statement from './components/Statement.vue';

Vue.component('quantifiable-manager', QuantifiableManager);
Vue.component('gs-statement', Statement);

/**
 * Combo pages
 */
function clearCheckboxes() {
    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    $.each(elements, function(index, item) {
        $(item).children('i').hide();
    });
}

function init_ColorCheckbox() {
    var input = $('#google_color_id');

    if (input.length <= 0) { return; }

    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    clearCheckboxes();

    $.each(elements, function(index, item) {
        $(item).on('click', function(e) {
            input.val(index);
            clearCheckboxes();
            $(this).children('i').toggle();
        });
    });

    var currentValue = input.val();

    if (!currentValue.trim()) {
        $(elements[0]).children('i').show();
    } else {
        $(elements[currentValue]).children('i').show();
    }
}

$(document).ready(function() {
    init_ColorCheckbox();
});