function open_lang_panel() {
    let menu = $(".lang-panel")[0];
    if (menu.classList.contains("lang-panel-closed")) {
        menu.classList.remove("lang-panel-closed");
        menu.classList.add("lang-panel-opened")
    } else {
        menu.classList.remove("lang-panel-opened")
        menu.classList.add("lang-panel-closed")
    }
}



$(function () {
    $('.lang-panel-el').click(function () {
        let lang = $(this).attr('id');
        $('.translatable-item').each(function (index, item) {
            $(this).text(languages[lang][$(this).attr('key')]);
        });
    });
});

function translate_en() {
    $('.translatable-item').each(function (index, item) {
        $(this).text(languages["en"][$(this).attr('key')]);
    });
}

function translate_ru() {
    $('.translatable-item').each(function (index, item) {
        $(this).text(languages["ru"][$(this).attr('key')]);
    });
}


$(document).on("scroll", window, function () {
    if ($(window).scrollTop() > 800) {
        $(".slider").css("display", "flex");
    } else {
        $(".slider").fadeOut();
    }
});
$(document).on("scroll", window, function () {
    if ($(window).scrollTop() > 10) {
        $(".bg-dark").css("background", "black");
    } else {
        $(".bg-dark").css("background", "transparent")
    }
});

function login() {
    let menu = document.getElementsByClassName("login")[0];
    if (menu.classList.contains("login-closed")) {
        menu.classList.remove("login-closed");
        menu.classList.add("login-opened")
    } else {
        menu.classList.remove("login-opened")
        menu.classList.add("login-closed")
    }
}

function personal_data() {
    let data = document.getElementsByClassName("user-data")[0];
    let screen = document.getElementsByClassName("black-screen")[0];
    if (data.classList.contains("user-data-closed")) {
        data.classList.remove("user-data-closed")
        data.classList.add("user-data-opened")
        $('.user-data').fadeIn();
        screen.classList.remove("black-screen-closed")
        screen.classList.add("black-screen-opened")
        $('.black-screen').fadeIn();
    } else {
        data.classList.remove("user-data-opened")
        data.classList.add("user-data-closed")
        $('.user-data').fadeOut();
        screen.classList.remove("black-screen-opened")
        screen.classList.add("black-screen-closed")
        $('.black-screen').fadeOut();
    }
}


function deal_menu_buy() {
    let data = document.getElementsByClassName("menu")[0];
    let screen = document.getElementsByClassName("black-screen")[0];
    if (data.classList.contains("menu-closed")) {
        data.classList.remove("menu-closed")
        data.classList.add("menu-opened")
        $('.menu').fadeIn();
        screen.classList.remove("black-screen-closed")
        screen.classList.add("black-screen-opened")
        $('.black-screen').fadeIn();
        $('.menu-title h3').html("Покупка")
        $('#sell_form').css("display", "none")
        $('#buy_form').css("display", "flex")

        $(document).on('change', function () {

            let result = $('#buy-number').val() * $('#buy-price').val();
            $('#buy-result').val(result);

        });


    } else {
        data.classList.remove("menu-opened")
        data.classList.add("menu-closed")
        $('.menu').fadeOut();
        screen.classList.remove("black-screen-opened")
        screen.classList.add("black-screen-closed")
        $('.black-screen').fadeOut();

    }

}

function buy_card_pay() {
    $('.card-btn').css("background", "wheat")
    $('.qiwi-btn').css("background", "none")
    $('.buy-payment-form').html('<span>После оформления заявки переведите деньги на указанную карту:</span>\n' +
        '                    <input type="hidden" readonly name="payment_info" value="card">\n' +
        '                    <input type="hidden" readonly name="type" value="buy">\n' +
        '                    <input type="text" readonly value="4890 4947 2222 6222" class="input-styled">')
    $('.buy-payment-form').fadeIn()
}

function buy_qiwi_pay() {
    $('.card-btn').css("background", "none")
    $('.qiwi-btn').css("background", "wheat")
    $('.buy-payment-form').html('<span>После оформления заявки переведите деньги на указанный Qiwi кошелёк:</span>\n' +
        '                    <input type="hidden" readonly name="payment_info" value="Qiwi">\n' +
        '                    <input type="hidden" readonly name="type" value="buy">\n' +
        '                    <input type="text" readonly value="+79634261029" class="input-styled">')
    $('.buy-payment-form').fadeIn()
}

function buy_req_check() {
    let hasEmpty = false;
    $('#buy_form').find('input').each(function () {
        if ($(this).prop('required')) {
            hasEmpty = hasEmpty || !$(this).val();
        }
    });

    if (hasEmpty) {
        message_fail()
    } else {
        send_request('buy_form')
    }
}


function deal_menu_sell() {
    let data = document.getElementsByClassName("menu")[0];
    let screen = document.getElementsByClassName("black-screen")[0];
    if (data.classList.contains("menu-closed")) {
        data.classList.remove("menu-closed")
        data.classList.add("menu-opened")
        $('.menu').fadeIn();
        screen.classList.remove("black-screen-closed")
        screen.classList.add("black-screen-opened")
        $('.black-screen').fadeIn();
        $('.menu-title h3').html("Продажа")
        $('#buy_form').css("display", "none")
        $('#sell_form').css("display", "flex")

        $(document).on('change', function () {

            let result = $('#sell-number').val() * $('#sell-price').val();
            $('#sell-result').val(result);

        });


    } else {
        data.classList.remove("menu-opened")
        data.classList.add("menu-closed")
        $('.menu').fadeOut();
        screen.classList.remove("black-screen-opened")
        screen.classList.add("black-screen-closed")
        $('.black-screen').fadeOut();
    }

}

function sell_card_pay() {
    $('.qiwi-btn').css("background", "none")
    $('.card-btn').css("background", "wheat")
    $('.qiwi-form').css("display", "none")
    $('.sell-payment-form').html('<span>Номер карты:</span>\n' +
        '                    <input type="hidden" name="type" value="sell">\n' +
        '                    <input type="hidden" name="payment_info" value="Card">\n' +
        '                    <input type="text" name="card_info"  minlength="16" maxlength="16"\n' +
        '                                               class="input-styled card-inf"\n' +
        '                                               value=""\n' +
        '                                               placeholder="Реквизиты для выплат">')
    let card_numb = getCookie('card_info')
    $('.card-inf').val(card_numb)
    $('.sell-payment-form').fadeIn()
}

function sell_qiwi_pay() {
    $('.card-btn').css("background", "none")
    $('.qiwi-btn').css("background", "wheat")
    $('.card-form').css("display", "none")
    $('.sell-payment-form').html('<span>Qiwi:</span>\n' +
        '                    <input type="hidden" name="type" value="sell">\n' +
        '                    <input type="hidden" name="payment_info" value="Qiwi">\n' +
        '                    <input type="text" name="qiwi_info"\n' +
        '                           value=""\n' +
        '                           class="input-styled qiwi-inf"\n' +
        '                           placeholder="Ваш Qiwi номер">')
    let qiwi_numb = getCookie('qiwi_info')
    $('.qiwi-inf').val(qiwi_numb)
    $('.sell-payment-form').fadeIn()

}
function black_screen_close_all() {
    let menu = document.getElementsByClassName("menu")[0];
    let data = $('.user-data');
    if (menu.classList.contains("menu-opened")) {
        menu.classList.remove("menu-opened")
        menu.classList.add("menu-closed")
        $('.menu').fadeOut();
    }
    if (data.length > 0) {
        if (data.hasClass("user-data-opened")) {
            data.removeClass("user-data-opened")
            data.addClass("user-data-closed")
            $('.user-data').fadeOut();
        }
    }
    $('.black-screen').fadeOut();
}