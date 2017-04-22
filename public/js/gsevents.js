function init_EventDatePicker() {
    if (typeof(daterangepicker) === 'undefined') { return; }

    $('#eventDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        opens: 'center',
        locale: {
            format: 'MMMM D, YYYY h:mm A'
        }
    });

    $('#eventDate').on('apply.daterangepicker', function(ev, picker) {
        var date = $('#eventDate').val();
        var span = $('#verifyEventDateMessage');
        var label = span.parent();

        label.removeClass();
        label.addClass('control-label');

        span.html('Verificando...');

        span.show();

        $.ajax({
            url: '/calendar/freebusy',
            data: {'start': date},
            type: 'GET',
            success: function(result) {
                var i = $('<i>');
                var message = '';

                if (result.busy) {
                    label.addClass('text-danger');
                    i.addClass('fa fa-ban');
                    message = 'No disponible';
                } else {
                    label.addClass('text-success');
                    i.addClass('fa fa-check');
                    message = 'Disponible';
                }

                span.html(i).append(' ' + message);
            }
        });
    });
}

function init_BirthdayDatePicker() {
    if (typeof(daterangepicker) === 'undefined') { return; }

    $('#kidBirthday').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: false,
        locale: {
            format: 'MMMM D, YYYY'
        }
    });
}

function init_Dragula() {
    if (typeof (dragula) === 'undefined') { return; }

    var drake = dragula(
        [document.getElementById('left-container'), document.getElementById('right-container')]
    );

    init_AvailableExtras();
}

function init_AvailableExtras() {
    HandlebarsIntl.registerWith(Handlebars);

    var source = $('#entry-template').html();
    var template = Handlebars.compile(source);

    $.ajax({
        url: '/productmanager/extras/list',
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

function init_Select2() {
    if (!jQuery.fn.select2) { return; }

    $('#clientSelect').select2({
        tags: true,
        ajax: {
            url: "/client/search/select",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 2,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                newOption: true
            }
        }
    });

    $('#clientSelect').on('select2:select', function (event) {
        HandlebarsIntl.registerWith(Handlebars);

        var source = $('#kid-template').html();
        var template = Handlebars.compile(source);

        var value = $(event.currentTarget).find("option:selected").val();

        $.ajax({
            url: '/client/search/autocomplete',
            type: 'GET',
            data: {'q': value},
            success: function(data) {
                $('#clientAddress').val('');
                $('#clientPhone').val('');
                $('#clientEmail').val('');

                var container = $('#clientKids');
                container.hide();

                if (data.client) {
                    $('#clientAddress').val(data.client.address);
                    $('#clientPhone').val(data.client.telephone);
                    $('#clientEmail').val(data.client.email);

                    if (data.client.kids) {
                        var div = container.find('div');
                        div.empty();
                        container.show();
                        $.each(data.client.kids, function(index, item) {
                            div.append(template(item));
                        });
                        div.find('button').on('click', function (event) {
                            var id = $(this).data('kid-id');
                            $.ajax({
                                url: '/kid/find/' + id,
                                type: 'GET',
                                success: function(data) {
                                    if (data.kid) {
                                        $('#kidName').val(data.kid.name);
                                        $('#kidBirthday').val(moment(data.kid.birthday_at).format('MMMM DD, YYYY'));
                                        init_BirthdayDatePicker();
                                        var kidSexMale = $('#kidSexMale');
                                        var kidSexFemale = $('#kidSexFemale');
                                        if (data.kid.sex == 1) {
                                            if (!kidSexMale.hasClass('active')) {
                                                kidSexMale.addClass('active');
                                            }
                                            kidSexFemale.removeClass('active');
                                            kidSexMale.find('input[type=radio]').prop('checked', true);
                                        }
                                        if (data.kid.sex == 2) {
                                            if (!kidSexFemale.hasClass('active')) {
                                                kidSexFemale.addClass('active');
                                            }
                                            kidSexMale.removeClass('active');
                                            kidSexFemale.find('input[type=radio]').prop('checked', true);
                                        }
                                    }
                                }
                            });
                        });
                    }
                }
            }
        });
    });
}

function init_CombosOnChange() {
    $('#combos input[type=radio]').on('change', function () {
        getConfigurableProducts(this.value);
        getProperties(this.value);
    });
}

function getConfigurableProducts(combo_id) {
    HandlebarsIntl.registerWith(Handlebars);

    var source   = $('#configurable-template').html();
    var template = Handlebars.compile(source);

    var container    = $('#container-configurable > .configurable-products');
    var emptyMessage = $('#container-configurable > .configurable-message');

    container.empty();

    $.ajax({
        url: '/combo/configurable/' + combo_id,
        type: 'GET',
        success: function(data) {
            if (data.configurables[0] != null) {
                container.append(template(data));
                emptyMessage.hide();
                $('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            } else {
                emptyMessage.show();
            }
        }
    });
}

function getProperties(combo_id) {
    HandlebarsIntl.registerWith(Handlebars);

    var source   = $('#property-template').html();
    var template = Handlebars.compile(source);

    var container    = $('#container-properties > .properties-items');
    var emptyMessage = $('#container-properties > .properties-message');

    container.empty();

    $.ajax({
        url: '/combo/properties/' + combo_id,
        type: 'GET',
        success: function(data) {
            if (data.properties[0] != null) {
                container.append(template(data));
                emptyMessage.hide();
                $('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            } else {
                emptyMessage.show();
            }
        }
    });
}

$(document).ready(function() {
    Handlebars.registerHelper({
        eq: function (v1, v2) {
            return v1 === v2;
        },
        ne: function (v1, v2) {
            return v1 !== v2;
        }
    });

    init_EventDatePicker();
    init_BirthdayDatePicker();
    init_Dragula();
    init_Select2();
    init_CombosOnChange();
});
