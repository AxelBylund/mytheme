$(document).ready(function () {
    console.log('main.js loaded');
    $('#select_image_button').click(function () {
        wp.media.editor.send.attachment = function (attachment, data) {
            $('#background-image').val(data.id);
            $('#background-image-thumbnail').attr('src', data.sizes.thumbnail.url);
        }
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
});