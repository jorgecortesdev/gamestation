function init_DateRangePicker() {

    if (typeof(daterangepicker) === 'undefined') { return; }

    $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePickerIncrement: 30,
        timePicker24Hour: true,
        locale: {
            format: 'MMMM D, YYYY h:mm A'
        }
    });
}

function init_SmartWizard() {

    if (!jQuery.fn.smartWizard) { return; }

    $('#smartwizard').smartWizard({
        theme: 'arrows',
        keyNavigation: false,
        toolbarSettings: {
            showNextButton: false,
            showPreviousButton: false
        },
        anchorSettings: {
            anchorClickable: false,
            enableAllAnchors: false,
            markDoneStep: true
        },
    });
}

$(document).ready(function() {
    init_SmartWizard();
    init_DateRangePicker();

    // El wizard salta al div por el hash #step
    // esto es para que se regrese al principio
    setTimeout(function() {
        window.scrollTo(0, 0);
    }, 1);
});