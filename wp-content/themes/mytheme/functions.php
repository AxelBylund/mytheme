<?php

function wpbootstrap_scripts_with_jquery()
{
    // comment out the next two lines to load the local copy of jQuery
    wp_deregister_script('bootstrap');
    wp_register_script('boostrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet', false, '3.3.5');
    wp_enqueue_script('bootsrap');

    add_action('init', 'replace_jquery');
    
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
    
    wp_register_script( 'my-custom-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	
    wp_enqueue_script('custom-script');
    wp_enqueue_script('my-custom-script');
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

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

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

function saveBackgroundImagePosition($post) {
    $select = isset($_POST['background-image-position']) ? $_POST['background-image-position']: null;
    if($select) {
        update_post_meta($post, 'background-image-position', $select);
    }
}

add_action('save_post', 'saveBackgroundImagePosition');

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

function saveSecondBackgroundImagePosition($post) {
    $select = isset($_POST['second-background-image-position']) ? $_POST['second-background-image-position']: null;
    if($select) {
        update_post_meta($post, 'second-background-image-position', $select);
    }
}

add_action('save_post', 'saveSecondBackgroundImagePosition');