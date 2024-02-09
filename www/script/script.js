function getCookie(name) {
    var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}







function sell_req_check() {
    let hasEmpty = false;
    $('#sell_form').find('input').each(function () {
        if ($(this).prop('required')) {
            hasEmpty = hasEmpty || !$(this).val();
        }
    });

    if (hasEmpty) {
        message_fail()
    } else {
        send_request('sell_form')
    }
}
// function card_numb_check() {
//     if ()
// }




function message_success() {
    $('.message-success').fadeIn()
    setTimeout(function () {
        $('.message-success').fadeOut()
    }, 2500);
}

function message_fail() {
    $('.message-fail').fadeIn()
    setTimeout(function () {
        $('.message-fail').fadeOut()
    }, 2500);
}

function send_request(type) {

    let fd = new FormData();
    let items = $('#' + type + ' input');

    Object.keys(items).forEach(key => {
        if (items[key] && items[key].value) {
            fd.append($(items[key]).attr('name'), items[key].value);
        }
    });
    $.ajax({
        type: "POST",
        url: '/steamauth/offers.php',
        data: fd,
        success: message_success(),
        processData: false,
        contentType: false,

    });


}

// Куки
$(document).ready(function () { // Применяются после загрузки страницы

    if (getCookie("cookie_status")) {
        // Если куки подтверждены ничего не происходит, в противном случае
        // отображает сообщение
    } else {
        $('.cookie-message').css("display", "flex");
    }

    function getCookie(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    $('.cookie-message button').on('click', function () {
        let date = new Date();
        date.setTime(date.getTime() + (10000 * 365 * 24 * 60 * 60)); // 10 лет в мс
        document.cookie = "cookie_status=accepted; expires=" + date.toUTCString();
        $('.cookie-message').fadeOut();
    });

    $('#ru').on('click', function () {
        let date = new Date();
        date.setTime(date.getTime() + (10000 * 365 * 24 * 60 * 60)); // 10 лет в мс
        document.cookie = "lang=ru; expires=" + date.toUTCString();
    });

    $('#en').on('click', function () {
        let date = new Date();
        date.setTime(date.getTime() + (10000 * 365 * 24 * 60 * 60)); // 10 лет в мс
        document.cookie = "lang=en; expires=" + date.toUTCString();
    });

    if (getCookie("lang") === 'en') {
        translate_en()
    } else {
        translate_ru()
    }

    if (getCookie("lang") === null) {
        translate_en()
    }
});
