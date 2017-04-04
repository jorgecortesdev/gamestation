function init_Dragula() {

    if (typeof (dragula) === 'undefined') { return; }

    var drake = dragula(
        [document.getElementById('left-container'), document.getElementById('right-container')]
    );
    fillCurrentProducts();
    init_SaveProductsForm();
}

function fillCurrentProducts() {
    HandlebarsIntl.registerWith(Handlebars);

    var source = $('#entry-template').html();
    var template = Handlebars.compile(source);

    $.ajax({
        url: '/productmanager/' + pm_entity + '/' + pm_entity_id,
        type: 'GET',
        success: function(data) {
            var container = $('#right-container');
            container.empty();
            $.each(data, function(index, item) {
                container.append(template(item));
            });
        }
    });
}

function init_AvailableProducts() {
    HandlebarsIntl.registerWith(Handlebars);

    var source = $('#entry-template').html();
    var template = Handlebars.compile(source);

    $.ajax({
        url: '/productmanager/' + pm_entity + '/' + pm_entity_id + '/product_types',
        type: 'GET',
        success: function(data) {
            var container = $('#left-container');
            container.empty();
            $.each(data, function(index, item) {
                container.append(template(item));
            });
        }
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
            $('<input>').attr({ type: 'hidden', name: 'quantities[]', value: quantity}).appendTo('form');
        });
    });
}

$(document).ready(function() {
    init_Dragula();
    init_AvailableProducts();
});