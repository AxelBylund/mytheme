<?php

/*
Plugin Name: Front Page Template
Description: Testing out meta boxes.
Author: Axel Bylund
Version: 1.0
*/

/**
* Adds a meta box to the post editing screen
*/

function add_image_page_meta_box()
{   // --- Parameters: ---
    add_meta_box( 'add_image_page_meta_box', // ID attribute of metabox
                  '<h1>First background.</h1>',       // Title of metabox visible to user
                  'meta_box_background_image', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'side',            // Where on the page to show the box
                  'high'           // Priority of box in display order
                );            
}

function add_second_image_page_meta_box()
{   // --- Parameters: ---
    add_meta_box( 'add_second_image_page_meta_box', // ID attribute of metabox
                  '<h1>Second background.</h1>',       // Title of metabox visible to user
                  'meta_box_background_image_second', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'side',            // Where on the page to show the box
                  'high'           // Priority of box in display order
                );            
}

/**
 * Outputs the content of the meta box
 */
function meta_box_background_image($page) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('#select_image_button').click(function () {
                    wp.media.editor.send.attachment = function (attachment, data) {
                        $('#background-image').val(data.id);
                        $('#background-image-thumbnail').attr('src', data.sizes.thumbnail.url);
                    }
                    wp.media.editor.open('#select_image_button');
                });
            });
        })(jQuery);
    </script>
    <div class="media-select">
        <table>
            <tr valign="top">
                <td> <img id="background-image-thumbnail" src="<?php echo wp_get_attachment_image_src(get_post_meta($page->ID, 'background_image', true))[0]; ?>"> </td>
                <td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" id="background-image" name="background" value="<?php echo get_post_meta($page->ID, 'background_image', true); ?>">
                    <input id="select_image_button" name="background_image" type="button" value="Select background image"> </td>
            </tr>
            <tr>
                <td id="first-overlay-title">
                    <h2>Overlay title</h2>
                    <input id="overlay-title-input" name="overlay_text" type="text" placeholder="Write title here." value="<?php echo get_post_meta($page->ID, 'overlay_text', true); ?>"> </td>
            </tr>
        </table>
    </div>
    <?php
}

function meta_box_background_image_second($page) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('#select_second_image_button').click(function () {
                        wp.media.editor.send.attachment = function (attachment, data) {
                            $('#second-background-image').val(data.id);
                            $('#second-background-image-thumbnail').attr('src', data.sizes.thumbnail.url);
                        }
                        wp.media.editor.open('#select_second_image_button');
                    });
                });
            })(jQuery);
        </script>
        <div class="media-select">
            <table>
                <tr valign="top">
                    <td> <img id="second-background-image-thumbnail" src="<?php echo wp_get_attachment_image_src(get_post_meta($page->ID, 'second_background_image', true))[0]; ?>"> </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" id="second-background-image" name="second-background" value="<?php echo get_post_meta($page->ID, 'second_background_image', true); ?>">
                        <input id="select_second_image_button" name="second_background_image" type="button" value="Select background image"> </td>
                </tr>
                <tr>
                    <td id="overlay-title">
                        <h2>Overlay title</h2>
                        <input id="second-overlay-title-input" name="second_overlay_text" type="text" placeholder="Write title here." value="<?php echo get_post_meta($page->ID, 'second_overlay_text', true); ?>"> </td>
                </tr>
            </table>
        </div>
        <?php
}



add_action( 'add_meta_boxes', 'add_image_page_meta_box' );
add_action( 'add_meta_boxes', 'add_second_image_page_meta_box' );
?>