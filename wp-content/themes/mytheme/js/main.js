$(document).ready(function () {
    console.log('main.js loaded');
});
$(document).ready(function () {
    $('#select_image_button').click(function () {
        wp.media.editor.send.attachment = function (attachment, data) {
            $('#background-image').val(data.id);
            $('#background-image-thumbnail').attr('src', data.sizes.thumbnail.url);
        }
        wp.media.editor.open('#select_image_button');
    });
    $title = $('#first-title');
    $(document).scroll(function() {
        $title.toggleClass('.title-box-scroll')
    })
});