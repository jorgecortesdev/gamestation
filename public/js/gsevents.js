
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

    // El wizard salta al div por el hash #step
    // esto es para que se regrese al principio
    setTimeout(function() {
        window.scrollTo(0, 0);
    }, 1);
});