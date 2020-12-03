(function ($) {

    "use strict";
    //body onclick start
    $('body').on('click', function () {
        if ($(window).width() > 993) {
            $('.dropdown__dropdown').slideUp();
        };
        $('.js__dropdown').removeClass("active");
    });
    //body onclick end

    //dropdown select start
    $('.js__dropdown').on('click', function (e) {
        var thisItem = $(this);
        function dropdownToggle() {
            $(thisItem).toggleClass('active');
            $(thisItem).find('.dropdown__dropdown').slideToggle();
            e.stopPropagation();
        }
        if($(window).width() > 993) {
            dropdownToggle();
        } else if($(window).width() <= 993 && $(this).closest('.header__currency').length==false) {
            dropdownToggle();
        }
    });

    /*$('.js__dropdown a').on('click', function (e) {
        e.preventDefault();
    });*/
    //dropdown select end

    /*CustomInputNumber start*/
    if(jQuery('.input-number').length) {
        jQuery('.input-number').each(function() {
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.input-number_arrow.next'),
                btnDown = spinner.find('.input-number_arrow.prev'),
                min = input.attr('min'),
                max = input.attr('max');
            spinner.click(function (e) {
                e.stopPropagation();
                e.preventDefault();
            });
            btnUp.click(function(e) {
                e.stopPropagation();
                e.preventDefault();
                if(spinner.hasClass("disabled")) {
                } else {
                    var oldValue = parseFloat(input.val());
                    if (oldValue >= max) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue + 1;
                    }
                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                }
            });
            btnDown.click(function(e) {
                e.stopPropagation();
                e.preventDefault();
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });
        });
    }
    /*CustomInputNumber end*/
    /*header scroll*/
    $(document).on( 'scroll', function(){
        if($(window).scrollTop()>0) {
            $('body').addClass('scroll');
        } else {
            $('body').removeClass('scroll');
        }
    });
    /*header scroll*/

    /* -------------------------------------------------------------------------
        begin Validation
        * ------------------------------------------------------------------------- */
    $(document).ready(function () {

        $(document).on("change", '.js_validate *[required]', function () {
            $(this).each(function () {
                var valid = validate($(document).find($(this)));
                if (valid == false) {
                    console.log("valid not passed");
                    return false;
                } else {
                    console.log("valid passed");
                }
            });

        });


        $('.js_validate .btn[type="submit"]').on("click", function () {
            //console.log($(document).find($(this).parents(".js_validate")));
            var valid = validate($(document).find($(this).parents(".js_validate")));
            //console.log($(this).closest(".js_validate"));
            if (valid == false) {
                console.log("valid not passed");
                return false;
            } else {
                console.log("valid passed");
            }
        });


    });

    function formatValidate(inputFile) {
        function showMsg(massage) {
            $($($($(inputFile)[0]).siblings(".text-error"))[0]).text(massage);
            $(inputFile[0]).closest(".input-container__file").addClass("error");
            return false;
        }

        var format = [".pdf", ".txt", ".doc", ".docx", ".rtf", ".odt"];

        console.log((inputFile)[0].files.length!=1);
        if ((inputFile)[0].files.length!=1) {
            //console.log($($(inputFile)[0]).attr("data-error-existence"));
            showMsg($($(inputFile)[0]).attr("data-error-existence"));
            return false;
        } else {
            var file = (inputFile)[0].files;
            var fileName = file[0].name;
            //console.log(file[0].size/1024/1024);
            if ((file[0].size/1024/1024) < 5) {
                for (var i = 0; i < format.length; i++) {
                    if (-1 !== fileName.indexOf(format[i])) {
                        $($(inputFile)[0]).closest(".input-container__file").removeClass("error");
                        $($(inputFile)[0]).closest(".input-container__file").addClass("pass");
                        $($(inputFile)[0]).siblings(".text-error").text("");
                        return true;
                    } else {
                        showMsg($($(inputFile)[0]).attr("data-error-type"));
                    }
                }
            }
            else {
                showMsg($($(inputFile)[0]).attr("data-error-size"));
            }
        }
    }


    function validate(form) {
        var error_class = "error";
        var norma_class = "pass";
        var item = form.find("[required]");
        var e = 0;
        var reg = undefined;
        var pass = $('.password').val();
        var pass1 = $('.password_1').val();
        var passold = $('.password_old').val();
        var email = false;
        var password = false;
        var password_1 = false;
        var password_old = false;
        var phone = false;
        var undef = false;
        var date = false;
        var number = false;
        var arr = [];

        function mark(object, expression, minSign, maxSign) {
            if (expression) {
                object.parent('div').addClass(error_class).removeClass(norma_class);
                if (email) {
                    ///console.log(object.val());
                    if (object.val().length > 0) {
                        if (object.val().length < 6) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-min"));
                        }
                        else if  (object.val().length > 37) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-max"));
                        } else {
                            object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                        }
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    }
                }
                if (password_old) {
                    //console.log(object.val());
                    if (object.val().length > 0) {
                        if (object.val().length < 6) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-min"));
                        }
                        else if  (object.val().length > 20) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-max"));
                        }
                        else {
                            if(object.val()==pass||object.val()==pass1) {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong-old"));
                            } else {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                            }
                        }
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    }
                }
                if (password) {
                    if (object.val().length > 0) {
                        if (object.val().length < 6) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-min"));
                        }
                        else if  (object.val().length > 20) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-max"));
                        }
                        else {
                            if(object.val()==passold) {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong-old"));
                            } else if (object.val()!==pass1) {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong-new"));
                            } else {
                                //console.log(object.val(), passold);
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                            }
                        }
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    }
                }
                if (password_1) {
                    if (object.val().length > 0) {
                        if (object.val().length < 6) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-min"));
                        }
                        else if  (object.val().length > 20) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-max"));
                        }
                        else {
                            if(object.val()==passold) {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong-old"));
                            }  else if (object.val()!==pass) {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong-new"));
                            } else {
                                object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                            }
                        }
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    }
                }
                if (phone) {
                    //console.log(object.val());
                    if (object.val().length != 17) {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                    }
                }
                if (date) {
                    //console.log(object.val());
                    if (object.val().length != 4) {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                    }
                }
                if (number) {
                    //console.log(object.val());
                    if (object.val().length < 4 ||object.val().length > 100) {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                    }
                }
                if (undef) {
                    //console.log(object.val());
                    if (object.val().length > 0) {
                        if (object.val().length > minSign && object.val().length < maxSign) {
                            object.parent('div').find('.text-error').text(object.attr("data-error-wrong"));
                        } else {
                            object.parent('div').find('.text-error').text('Введите колличество символов (2-100)');
                        }
                    } else {
                        object.parent('div').find('.text-error').text(object.attr("data-error-empty"));
                    }
                }
                //console.log("expression=true");
                e++;
            } else {
                if($(object[0]).hasClass("select")) {
                    if($(object[0]).prop("selectedIndex")!=0) {
                        object.parent('div').addClass(norma_class).removeClass(error_class);
                        e = 0;
                    } else {
                        object.parent('div').addClass(error_class).removeClass(norma_class);
                        e = 0;
                    }
                } else {
                    object.parent('div').addClass(norma_class).removeClass(error_class);
                    e = 0;
                    //console.log("expression=false");
                }
            }
            arr.push(expression);
        }

        if(form.hasClass('js_validate')) {
            var field = form.find("[required]"),
                select = form.find('.js_valid_select'),
                radio = form.find('.js_valid_radio'),
                file = form.find('.input-container__file'),
                checkbox = form.find('.js_valid_checkbox');
            field.each(function () {
                var dataValidate = $(this).attr("data-validate");
                caseDataValidate(dataValidate, $(this));
            });
            select.each(function () {
                validSelect($(this).find('select option'));
            });
            radio.each(function () {
                validRadio($(this).find('input[type="radio"]'));
            });
            checkbox.each(function () {
                validCheckbox($(this).find('input[type="checkbox"]'));
            });
            file.each(function () {
                validFile($(this).find('input[type="file"]'));
            });
        } else {
            var dataValidate =  form.attr("data-validate"),
                inputContainer = form.closest('.input-container'),
                field = form,
                select = inputContainer.find('select option'),
                radio = inputContainer.find('input[type="radio"]'),
                file = inputContainer.find('input[type="file"]'),
                checkbox = inputContainer.find('input[type="checkbox"]');
            //console.log(checkbox);
            if(inputContainer.hasClass('js_valid_select')) {
                validSelect(select);
            }
            else if(inputContainer.hasClass('js_valid_radio')) {
                validRadio(radio);
            }
            else if(inputContainer.hasClass('js_valid_checkbox')) {
                validCheckbox(checkbox);
            }
            else if(inputContainer.hasClass('input-container__file')) {
                validFile(file);
            }
            else {
                caseDataValidate(dataValidate, field);
            }
        }

        function caseDataValidate(dataValidate, fieldIn) {
            var minSign = fieldIn.attr("data-minsign");
            var maxSign = fieldIn.attr("data-maxsign");
            //console.log(dataValidate, fieldIn);
            switch (dataValidate) {
                case "text":
                    reg = new RegExp('^[\/\'"?!,.А-Яа-яёЁЇїІіЄєҐґa-zA-Z_0-9 -]{'+minSign+','+maxSign+'}$');
                    undef = true;
                    mark(fieldIn, !reg.test($.trim(fieldIn.val())), minSign, maxSign);
                    undef = false;
                    break;
                case "date":
                    reg = /^\d{2,10}[,.]?\d{2,10}[,.]?\d{2,10}$/;
                    date = true;
                    mark(fieldIn, !reg.test($.trim(fieldIn.val())));
                    date = false;
                    break;
                case "number":
                    //reg = /^\d+$/;
                    reg = new RegExp('^[0-9]{'+minSign+','+maxSign+'}$');
                    number = true;
                    mark(fieldIn, !reg.test($.trim(fieldIn.val())));
                    number = false;
                    break;
                case "email":
                    reg = /^([A-Za-z0-9_\-\.]{1,15})+\@([A-Za-z0-9_\-\.]{1,10})+\.([A-Za-z]{2,10})$/;
                    email = true;
                    if($.trim(fieldIn.val()).length>37) {
                        mark(fieldIn, true);
                    } else {
                        mark(fieldIn, !reg.test($.trim(fieldIn.val())));
                    }
                    email = false;
                    break;
                case "phone":
                    phone = true;
                    reg = /[0-9-()+]{17}$/;
                    mark(fieldIn, !reg.test($.trim(fieldIn.val())));
                    phone = false;
                    break;
                case "passold":
                    password_old = true;
                    reg = /^[a-zA-Z0-9!#@_\-|]{6,20}$/;
                    //console.log(passold, pass, pass1);
                    mark(fieldIn, (passold==pass||!reg.test($.trim(fieldIn.val()))||passold==pass1));
                    password_old = false;
                    break;
                case "pass":
                    password = true;
                    reg = /^[a-zA-Z0-9!#@_\-|]{6,20}$/;
                    mark(fieldIn, (pass1 !== pass||!reg.test($.trim(fieldIn.val()))||passold==pass));
                    password = false;
                    break;
                case "pass1":
                    password_1 = true;
                    reg = /^[a-zA-Z0-9!#@_\-|]{6,20}$/;
                    mark(fieldIn, (pass1 !== pass||!reg.test($.trim(fieldIn.val()))||passold == pass1));
                    password_1 = false;
                    break;
                case "file":
                    formatValidate(fieldIn);
                case "select2":
                    if (fieldIn.val()!=null||fieldIn.val()!=undefined||fieldIn.val()!="0") {
                        mark(fieldIn, false);
                        break;
                    } else {
                        mark(fieldIn, true);
                        break;
                    };
                default:
                    reg = new RegExp(fieldIn.attr("data-validate"), "g");
                    mark(fieldIn, !reg.test($.trim(fieldIn.val())));
                    break;
            }
        }

// js_valid_select
        function validSelect(inp) {
            //console.log(inp);
            var rezalt = 0;
            for (var i = 1; i < inp.length; i++) {
                //console.log($(inp[i]).is('selected'));
                if ($(inp[i]).is('selected') === true||$(inp[i]).prop('selected') === true) {
                    rezalt = 1;
                    break;
                } else {
                    rezalt = 0;
                }
            }
            if (rezalt === 0) {
                inp.closest('.input-container').addClass(error_class).removeClass(norma_class);
                e = 1;
            } else {
                inp.closest('.input-container').addClass(norma_class).removeClass(error_class);
            }
        };

// js_valid_radio
        function validRadio(inp) {
            var rezalt = 0;
            for (var i = 0; i < inp.length; i++) {
                if ($(inp[i]).is(':checked') === true) {
                    rezalt = 1;
                    break;
                } else {
                    rezalt = 0;
                }
            }
            if (rezalt === 0) {
                inp.closest('.input-container').addClass(error_class).removeClass(norma_class);
                e = 1;
            } else {
                inp.closest('.input-container').addClass(norma_class).removeClass(error_class);
            }
        };
// js_valid_checkbox
        function validCheckbox(inp) {
            var rezalt = 0;
            for (var i = 0; i < inp.length; i++) {
                //console.log($(inp[i]).is(':checked'));
                if ($(inp[i]).is(':checked') === true) {
                    rezalt = 1;
                    break;
                } else {
                    rezalt = 0;
                }
            }
            if (rezalt === 0) {
                inp.closest('.input-container').addClass(error_class).removeClass(norma_class);
                e = 1;
            } else {
                inp.closest('.input-container').addClass(norma_class).removeClass(error_class);
            }
        };

// js_valid_file
        function validFile(inp) {
            var rezalt = 0;
            for (var i = 0; i < inp.length; i++) {
                if (formatValidate(inp) == true) {
                    rezalt = 1;
                    //console.log("rezalt1");
                    break;
                } else {
                    rezalt = 0;
                    //console.log("rezalt0");
                }
            }
            if (rezalt === 0) {
                inp.closest('.input-container').addClass(error_class).removeClass(norma_class);
                e = 1;
            } else {
                inp.closest('.input-container').addClass(norma_class).removeClass(error_class);
            }
        };
// js_valid_rating
        form.find('.js-rating').each(function (indx, rating) {
            var i = 0;
            $(rating).find(".star").each(function (indx, star) {
                if($(star).hasClass("active")) {
                    i++;
                } else {
                }
            });
            if (i>0) {
                $(this).addClass(norma_class).removeClass(error_class);
            } else {
                $(rating).addClass(error_class).removeClass(norma_class);
                e = 1;
            }
        });


        if ($.inArray(true, arr) == -1 && e == 0) {
            return true;
        } else {
            form.find("." + error_class + " input:first").focus();
            return false;
        }
    }

    function validateReset() {
        var form = $('.popup-overlay').find("form");
        var error_class = "error";
        var norma_class = "pass";
        form.find("[required]").each(function (indx, element) {
            $(element).val("");
            $(element).parent('.input-container').removeClass(error_class);
            $(element).parent('.input-container').removeClass(norma_class);
        });
    }

    $('.popup-overlay').click(function() {
        validateReset();
    });

    $('.popup .close-btn').click(function() {
        validateReset();
    });

    $('.input-container .delete').click(function() {
        var error_class = "error";
        var inp = $(this).siblings('input');
        var label = $(this).siblings('label');
        inp.val('');
        inp.parent('.input-container').removeClass(error_class);
        inp.parent('.input-container').removeClass("filled");
        if(inp[0].hasAttribute("data-error-existence")) {
            label.text(inp.attr("data-error-existence"));
        } else {
        }
    });

    /* -------------------------------------------------------------------------
     end Validation
     * ------------------------------------------------------------------------- */

    /*Popup start*/
    $('*[data-target="call"]').on("click", function (e) {
        e.preventDefault();
        $('.popup-overlay').fadeIn(300);
        $('.popup').fadeOut(100);
        $('.popup[data-target="popup-call"]').fadeIn(300);
    });
    $('*[data-target="review"]').on("click", function (e) {
        e.preventDefault();
        $('.popup-overlay').fadeIn(300);
        $('.popup').fadeOut(100);
        $('.popup[data-target="popup-review"]').fadeIn(300);
    });
    $('.popup:not(.popup__cart-in)').click(function(e) {
        e.stopPropagation();
    });
    function closePopup(thisIt) {
        var popup = thisIt.closest('.popup');
        popup.fadeOut(300);
        setTimeout(function () {
            $('.popup-overlay').fadeOut(300);
        }, 500);
        $("html").removeClass("mobile-menu");
        $("body").removeClass("overflow");
    }
    $('.popup-overlay').click(function() {
        closePopup($(this));
    });
    $('.popup-header__link a').click(function() {
        closePopup($(this));
    });
    $('.popup .close-btn').click(function() {
        closePopup($(this));
    });

    /*Popup end*/

    /*Cut string start*/
    function cutString(string, quantity) {
        string.text(function(i, text) {
            if (text.length >= quantity) {
                text = text.substring(0, quantity);
                var lastIndex = text.lastIndexOf(" ");
                text = text.substring(0, lastIndex) + '...';
            }
            $(this).text(text);
        });
    }

    if ($(".post-wrapper .div-block-157").length) {
        cutString($(".post-wrapper .div-block-157"), 325);
    }
    /*Cut string end*/

    //tub_block click
    if ($(".tab-block").length) {
        $(".tab-block .tab_header li").on('click', function () {
            $(this).addClass("active").siblings().removeClass("active");
            $(".main_cont .tab_body").hide().eq($(this).index()).show();
        });
    }
    //tub_block click

    //select2 click
    if ($("#select").length) {
        $("#select").select2({
            placeholder: 'General Issues/Queries'
        });
    }
    //select2 click

})(jQuery);