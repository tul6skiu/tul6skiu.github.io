/*
    Аккордеон меню для интернет-магазина на uCoz.
    Разработано web-студией PixelStyle - http://PixelStyle.ru/
    Email: info@PixelStyle.ru
    Версия: 1.0 от 13.07.2015 г.
*/


jQuery(function($) { // Начало кода самой меню
    /* параметры меню */

    var menu_animation_speed = 200; //Скорость анимации вверх/вниз
    var menu_id_name = 'ul#shop-hmenu '; // Значение id или класса, к которому привязывается меню. ОДИН СЕЛЕКТОР!
    var menu_site_id_name = '.menuvl .uMenuRoot'; // Значение id или класса, к которому привязывается меню сайта.
    /* конец параметров */
    $(document).ready(function() { // код меню
        /* Начинается код для меню-аккордеона верхнего уровня */
        $(menu_id_name+' > li > div.hmenu-corn').remove() //удаляем ненужный блок
        $(menu_id_name+' > li > div.hmenu-cont').each(function(t) { // Проверяем, есть ли подменю (ol, заключенная в div):
            if ($.cookie('topsubmenuMark-' + t)) { // Если в cookie есть запись об открытытии меню:
                $(this).show().prev().removeClass('collapsed').addClass('expanded'); // Открываем ее и добавляем класс открытия
            } else { // Если нет:
                $(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Скрываем ее и добавляем классы закрытия
            }
            $(this).prev().addClass('collapsible').click(function() { // Подключаем событие при клике на ссылку под которой есть меню
                var this_t = $(menu_id_name+' > li > div.hmenu-cont').index($(this).next()); // Устанавливаем метку по какой ссылке меню кликнули
                if ($(this).next().css('display') == 'none') {

                    // Если открыто одно подменю. мы скрываем остальные:
                    $(this).parent('li').parent('ul').find('div.hmenu-cont').each(function(v) {
                        if (v != this_t) {
                            $(this).slideUp(menu_animation_speed, function() {
                                $(this).prev().removeClass('expanded').addClass('collapsed');
                                topcookieDel($(menu_id_name+' > li > div.hmenu-cont').index($(this)));
                            });
                        }
                    });
                    // :конец

                    $(this).next().slideDown(menu_animation_speed, function() { // Покарываем меню:
                        $(this).prev().removeClass('collapsed').addClass('expanded');
                        topcookieSet(this_t);
                    });
                } else {
                    $(this).next().slideUp(menu_animation_speed, function() { // Скрываем меню:
                        $(this).prev().removeClass('expanded').addClass('collapsed');
                        topcookieDel(this_t);
                        $(this).each(function() {
                            $(this).hide(0, topcookieDel($(menu_id_name+' > li > div.hmenu-cont').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
                        });
                    });
                }
                return false; // Предотвращаем переход по ссылке меню
            });
        });
    /* Начинается код для меню-аккордеона подуровней */
    $(menu_id_name+' ul').each(function(i) { // Проверяем, есть ли под-подменю (ul):
        if ($.cookie('submenuMark-' + i)) { // Если в cookie есть запись об открытытии меню:
            $(this).show().prev().removeClass('collapsed').addClass('expanded'); // Открываем ее и добавляем класс открытия
        } else {
            $(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Скрываем ее и добавляем классы закрытия
        }
        $(this).prev().addClass('collapsible').click(function() { // Подключаем событие при клике на ссылку под которой есть меню
            var this_i = $(menu_id_name+' ul').index($(this).next());  // Устанавливаем метку по какой ссылке меню кликнули
            if ($(this).next().css('display') == 'none') {

                // Если открыто одно под-подменю. мы скрываем остальные:
                $(this).parent('li').parent('ol').find('ul').each(function(j) {
                    if (j != this_i) {
                        $(this).slideUp(menu_animation_speed, function() {
                            $(this).prev().removeClass('expanded').addClass('collapsed');
                            cookieDel($(menu_id_name+' ul').index($(this)));
                        });
                    }
                });
                // :конец

                $(this).next().slideDown(menu_animation_speed, function() { // Покарываем меню:
                    $(this).prev().removeClass('collapsed').addClass('expanded');
                    cookieSet(this_i);
                });
            } else {
                $(this).next().slideUp(menu_animation_speed, function() { // Скрываем меню:
                    $(this).prev().removeClass('expanded').addClass('collapsed');
                    cookieDel(this_i);
                    $(this).find('ol').each(function() {
                        $(this).hide(0, cookieDel($(menu_id_name+' ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
                    });
                });
            }
            return false; // Предотвращаем переход по ссылке меню
        });
    });


/* ----- */
        $(menu_site_id_name+' ul').each(function(i) { // Проверяем, есть ли под-подменю (ul):
        if ($.cookie('sitesubmenuMark-' + i)) { // Если в cookie есть запись об открытытии меню:
            $(this).show().prev().removeClass('collapsed').addClass('expanded'); // Открываем ее и добавляем класс открытия
        } else {
            $(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Скрываем ее и добавляем классы закрытия
        }
        $(this).prev().addClass('collapsible').click(function() { // Подключаем событие при клике на ссылку под которой есть меню
            var this_i = $(menu_site_id_name+' ul').index($(this).next());  // Устанавливаем метку по какой ссылке меню кликнули
            if ($(this).next().css('display') == 'none') {

                // Если открыто одно под-подменю. мы скрываем остальные:
                $(this).parent('li').parent('ul').find('ul').each(function(j) {
                    if (j != this_i) {
                        $(this).slideUp(menu_animation_speed, function() {
                            $(this).prev().removeClass('expanded').addClass('collapsed');
                            sitecookieDel($(menu_site_id_name+' ul').index($(this)));
                        });
                    }
                });
                // :конец

                $(this).next().slideDown(menu_animation_speed, function() { // Покарываем меню:
                    $(this).prev().removeClass('collapsed').addClass('expanded');
                    sitecookieSet(this_i);
                });
            } else {
                $(this).next().slideUp(menu_animation_speed, function() { // Скрываем меню:
                    $(this).prev().removeClass('expanded').addClass('collapsed');
                    sitecookieDel(this_i);
                    $(this).find('ul').each(function() {
                        $(this).hide(0, sitecookieDel($(menu_site_id_name+' ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
                    });
                });
            }
            return false; // Предотвращаем переход по ссылке меню
        });
    });


/* ----- */
});
/* функции установления cookie */
function cookieSet(index) {
    $.cookie('submenuMark-' + index, 'opened', {
        expires: null,
        path: '/'
    }); // Ставим метку cookie (подменю открыто):
}

function cookieDel(index) {
    $.cookie('submenuMark-' + index, null, {
        expires: null,
        path: '/'
    }); // Удаляем метку cookie (подменю закрыто):
}
    function topcookieSet(indext) {
        $.cookie('topsubmenuMark-' + indext, 'topened', {
            expires: null,
            path: '/'
        }); // Ставим метку cookie (подменю открыто):
    }

    function topcookieDel(indext) {
        $.cookie('topsubmenuMark-' + indext, null, {
            expires: null,
            path: '/'
        }); // Удаляем метку cookie (подменю закрыто):
    }
    function sitecookieSet(indext) {
        $.cookie('sitesubmenuMark-' + indext, 'topened', {
            expires: null,
            path: '/'
        }); // Ставим метку cookie (подменю открыто):
    }

    function sitecookieDel(indext) {
        $.cookie('sitesubmenuMark-' + indext, null, {
            expires: null,
            path: '/'
        }); // Удаляем метку cookie (подменю закрыто):
    }

$(function() { // При нажатии на ссылку добавляем класс
        _uBuildMenu('.sidebar' , 2, document.location.href + '/', 'sample-menuA');
    })
});
