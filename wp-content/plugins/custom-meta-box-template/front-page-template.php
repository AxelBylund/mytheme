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
                  '<h2>Select first background picture.</h2>',       // Title of metabox visible to user
                  'meta_box_background_image', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'side',            // Where on the page to show the box
                  'high'           // Priority of box in display order
                );            
}

function add_second_image_page_meta_box()
{   // --- Parameters: ---
    add_meta_box( 'add_second_image_page_meta_box', // ID attribute of metabox
                  '<h2>Select second background picture.</h2>',       // Title of metabox visible to user
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
                        $('#background-image').val(data.id);
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
                    <input id="background-image" name="background" disabled value="<?php echo get_post_meta($page->ID, 'background_image', true); ?>">
                    <input id="select_image_button" name="background_image" type="button" value="Select background image"> </td>
            </tr>
        </table>
    </div>
    <?php
}

function meta_box_background_image_second($page) {
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
                $('#select_second_image_button').click(function () {
                    wp.media.editor.send.attachment = function(attachment, data) {
                        $('#second-background-image').val(data.id);
                    }
                    
                    wp.media.editor.open('#select_second_image_button');
                });
            });
        })(jQuery);
    </script>
    <div class="media-select">
        <table>
            <tr valign="top">
                <td>
                    <input id="second-background-image" name="background" disabled value="<?php echo get_post_meta($page->ID, 'second_background_image', true); ?>">
                    <input id="select_second_image_button" name="second_background_image" type="button" value="Select background image"> </td>
            </tr>
        </table>
    </div>
    <?php
}



add_action( 'add_meta_boxes', 'add_image_page_meta_box' );
add_action( 'add_meta_boxes', 'add_second_image_page_meta_box' );
?>