$(function() {
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
});