$(document).ready(function () {
    console.log('main.js loaded');
    $('#select_image_button').click(function () {
        wp.media.editor.send.attachment = function (attachment, data) {
            $('#background-image').val(data.id);
            $('#background-image-thumbnail').attr('src', data.sizes.thumbnail.url);
        };
        wp.media.editor.open('#select_image_button');
    });
    $(function () {
        //caches a jQuery object containing the header element
        var brand = $(".navbar-inverse .brand");
        var menuItems = $('.navbar .nav > li > a');
        $('.parallax').scroll(function () {
            var scroll = $('.parallax').scrollTop();
            if (scroll >= 265 && scroll <= 420) {
                brand.addClass('scroll-color');
                menuItems.addClass('scroll-color');
            }
            else if (scroll <= 265 || scroll >= 420) {
                brand.removeClass('scroll-color');
                menuItems.removeClass('scroll-color');
            }
            console.log(scroll);
        });
    });
    //material contact form animation
    $('.contact-form').find('.form-control').each(function () {
        var targetItem = $(this).parent();
        if ($(this).val()) {
            $(targetItem).find('label').css({
                'top': '10px'
                , 'fontSize': '14px'
            });
        }
    })
    $('.contact-form').find('.form-control').focus(function () {
        $(this).parent('.input-block').addClass('focus');
        $(this).parent().find('label').animate({
            'top': '10px'
            , 'fontSize': '14px'
        }, 300);
    })
    $('.contact-form').find('.form-control').blur(function () {
        if ($(this).val().length === 0) {
            $(this).parent('.input-block').removeClass('focus');
            $(this).parent().find('label').animate({
                'top': '25px'
                , 'fontSize': '18px'
            }, 300);
        }
    });
    console.log('end of main.js loaded');
});