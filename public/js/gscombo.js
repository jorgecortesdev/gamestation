function clearCheckboxes() {
    var elements = $("#combo-form-checkboxes").find(".combo-color-form");
    $.each(elements, function(index, item) {
        $(item).children('i').hide();
    });
}

function init_ColorCheckbox() {
    var input = $('#google_color_id');

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

function init_Dragula() {

    if (typeof (dragula) === 'undefined') { return; }

    var drake = dragula(
        [document.getElementById('left-container'), document.getElementById('right-container')]
    );
    init_ProductTypeSelect();
    init_SaveProductsForm();
}

function init_ProductTypeSelect() {
    HandlebarsIntl.registerWith(Handlebars);

    var source = $('#entry-template').html();
    var template = Handlebars.compile(source);

    $('#productType').on('change', function() {
        var id = this.value;
        $.ajax({
            url: '/product_type/' + id + '/list',
            type: 'GET',
            success: function(data) {
                var container = $('#left-container');
                container.empty();
                $.each(data, function(index, item) {
                    container.append(template(item));
                });
            }
        });
    });
}

function init_SaveProductsForm() {
    $('#saveProductForm').on('submit', function(e) {
        var elements = $('#right-container').find("> div");
        var form = $(this);
        $.each(elements, function(index, item) {
            var product_id = $(item).data('id');
            var quantity = $(item).find('input').val();
            $('<input>').attr({ type: 'hidden', name: 'product_ids[]', value: product_id}).appendTo('form');
            $('<input>').attr({ type: 'hidden', name: 'quantity[]', value: quantity}).appendTo('form');
        });
    });
}

$(document).ready(function() {
    init_ColorCheckbox();
    init_Dragula();
});