$(function () {
    $(document).ready(function () {
        $('#select_image_button').click(function () {
            wp.media.editor.open('#select_image_button');
        });
    });
});

/* disable mm btn for / scroll circle
$(function () {
    $('html').mousedown(function (e) {
        if (e.button == 1) return false
    });
});
*/

$(document).ready(function() {
   console.log('hejasdasdasd');
});