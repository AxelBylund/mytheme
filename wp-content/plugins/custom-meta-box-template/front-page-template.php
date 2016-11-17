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

function add_front_page_meta_box()
{                                      // --- Parameters: ---
    add_meta_box( 'demo-meta-box', // ID attribute of metabox
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
                    $('#upload_image_button').click(function () {
                        tb_show('', 'media-upload.php?page_id=<?php  echo $page->ID; ?>&type=image&amp;TB_iframe=true');
                        return false;
                    });
                });
            })(jQuery);
        </script>
        <div class="media-upload">
            <table>
                <tr valign="top">
                    <td>
                        <input id="upload_image_button" type="button" value="Upload Media"> </td>
                </tr>
            </table>
        </div>
        <?php
}

add_action( 'add_meta_boxes', 'add_front_page_meta_box' );
?>