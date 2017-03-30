function init_DateRangePicker(selector) {

    if (typeof(daterangepicker) === 'undefined') { return; }

    $(selector).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: false,
        locale: {
            format: 'MMMM D, YYYY'
        }
    });
}

function init_Select2(selector) {
    $(selector).select2({
        ajax: {
            url: "/client/search",
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
    });
}

$(document).ready(function() {
    init_DateRangePicker('#birthday_at');
    init_Select2('#clientSelect');
});
