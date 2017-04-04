function fillSupplierProductSelect(supplier_id) {
    HandlebarsIntl.registerWith(Handlebars);

    var source = $('#entry-template').html();
    var template = Handlebars.compile(source);

    $.ajax({
        url: '/product_type/supplier/' + supplier_id + '/products',
        type: 'GET',
        success: function(data) {
            var container = $('#products');
            container.empty();
            if (data.length !== 0) {
                $.each(data, function(index, item) {
                    container.append(template(item));
                });
                container.prop('disabled', false);
            } else {
                container.prop('disabled', true);
                container.append($('<option value="-1">-- Seleccionar --</option>'));
            }
        }
    });
}

$(document).ready(function() {
    $('#suppliers').on('change', function(e) {
        fillSupplierProductSelect(this.value);
    }).trigger('change');
});