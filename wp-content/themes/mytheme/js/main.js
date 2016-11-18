(function ($) {
    $(document).ready(function () {
        $('#select_image_button').click(function () {
            wp.media.editor.open('#select_image_button');
        });
    });
})(jQuery);