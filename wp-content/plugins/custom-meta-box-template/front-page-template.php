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
                  '<h2>Upload media</h2>',       // Title of metabox visible to user
                  'meta_box_background_image', // Function that prints box in wp-admin
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
    <style>
        .media-upload h2 {
            font-weight: bold;
        }
    </style>
    <script>
        (function ($) {
            $(document).ready(function () {
                $('#select_image_button').click(function () {
                    wp.media.editor.send.attachment = function(attachment, data) {
                        $('#HEJ').val(data.id);
                    }
                    
                    wp.media.editor.open('#select_image_button');
                });
            });
        })(jQuery);
    </script>
    <div class="media-select">
        <table>
            <tr valign="top">
                <td>
                    <input id="HEJ" name="background" disabled value="<?php echo get_post_meta($page->ID, 'background_image', true); ?>">
                    <input id="select_image_button" name="background_image" type="button" value="Select background image"> </td>
            </tr>
        </table>
    </div>
    <?php
}

add_action( 'add_meta_boxes', 'add_image_page_meta_box' );
?>