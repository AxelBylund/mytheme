<?php
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
    
    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin/wp-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

function saveBackgroundImage($post) {
    $bg = isset($_POST['background']) ? $_POST['background']: null;
    if($bg) {
        update_post_meta($post, 'background_image', $bg);
    }
}

add_action('save_post', 'saveBackgroundImage');

function saveTextOverlayTitle($post) {
    $txt = isset($_POST['overlay_text']) ? $_POST['overlay_text']: null;
    if($txt) {
        update_post_meta($post, 'overlay_text', $txt);
    }
}

add_action('save_post', 'saveTextOverlayTitle');

function saveSecondBackgroundImage($post) {
    $bg = isset($_POST['second-background']) ? $_POST['second-background']: null;
    if($bg) {
        update_post_meta($post, 'second_background_image', $bg);
    }
}

add_action('save_post', 'saveSecondBackgroundImage');

function saveSecondTextOverlayTitle($post) {
    $txt = isset($_POST['second_overlay_text']) ? $_POST['second_overlay_text']: null;
    if($txt) {
        update_post_meta($post, 'second_overlay_text', $txt);
    }
}

add_action('save_post', 'saveSecondTextOverlayTitle');
