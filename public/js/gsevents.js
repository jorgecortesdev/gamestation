/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 79);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, exports) {

function init_EventDatePicker() {
    if (typeof daterangepicker === 'undefined') {
        return;
    }

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

    $('#eventDate').on('apply.daterangepicker', function (ev, picker) {
        var date = $('#eventDate').val();
        var span = $('#verifyEventDateMessage');
        var label = span.parent();

        label.removeClass();
        label.addClass('control-label');

        span.html('Verificando...');

        span.show();

        $.ajax({
            url: '/calendar/freebusy',
            data: { 'start': date },
            type: 'GET',
            success: function success(result) {
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
    if (typeof daterangepicker === 'undefined') {
        return;
    }

    $('#kidBirthday').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: false,
        locale: {
            format: 'MMMM D, YYYY'
        }
    });
}

function init_Select2() {
    if (!jQuery.fn.select2) {
        return;
    }

    $('#clientIdOrName').select2({
        tags: true,
        language: {
            inputTooShort: function inputTooShort(args) {
                var remainingChars = args.minimum - args.input.length;
                var message = 'Introduce ' + remainingChars + ' o más letras';
                return message;
            }
        },
        ajax: {
            url: "/client/search/select",
            dataType: 'json',
            delay: 250,
            data: function data(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function processResults(data, params) {
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: params.page * 30 < data.total_count
                    }
                };
            },
            cache: true
        },
        minimumInputLength: 2,
        createTag: function createTag(params) {
            return {
                id: params.term,
                text: params.term,
                newOption: true
            };
        }
    });

    $('#clientIdOrName').on('select2:select', function (event) {
        // HandlebarsIntl.registerWith(Handlebars);

        var source = $('#kid-template').html();
        var template = Handlebars.compile(source);

        var value = $(event.currentTarget).find("option:selected").val();

        $.ajax({
            url: '/client/search/autocomplete',
            type: 'GET',
            data: { 'q': value },
            success: function success(data) {
                $('#clientAddress').prop('readonly', false).val('');
                $('#clientTelephone').prop('readonly', false).val('');
                $('#clientEmail').prop('readonly', false).val('');

                var container = $('#clientKids');
                container.hide();

                if (data.client) {
                    $('#clientAddress').prop('readonly', true).val(data.client.address);
                    $('#clientTelephone').prop('readonly', true).val(data.client.telephone);
                    $('#clientEmail').prop('readonly', true).val(data.client.email);

                    if (data.client.kids) {
                        var div = container.find('div');
                        div.empty();
                        container.show();
                        $.each(data.client.kids, function (index, item) {
                            div.append(template(item));
                        });
                        div.find('button').on('click', function (event) {
                            var id = $(this).data('kid-id');
                            $('input[name=kidId]').val(id);
                            $.ajax({
                                url: '/kid/find/' + id,
                                type: 'GET',
                                success: function success(data) {
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

$(document).ready(function () {
    Handlebars.registerHelper({
        eq: function eq(v1, v2) {
            return v1 === v2;
        },
        ne: function ne(v1, v2) {
            return v1 !== v2;
        }
    });

    init_EventDatePicker();
    init_BirthdayDatePicker();
    init_Select2();
});

/***/ }),

/***/ 79:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(13);


/***/ })

/******/ });