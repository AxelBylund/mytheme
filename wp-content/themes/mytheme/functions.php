<?php
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
/*
function main_jquery_scripts()
{
	// Register the script like this for a theme:
	wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'main-script' );
}
add_action( 'wp_enqueue_scripts', 'main_jquery_scripts' );
*/

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
        update_post_metadata($post, 'background_image', $bg);
    }
}

add_action('save_post', 'saveBackgroundImage');

function saveSecondBackgroundImage($post) {
    $bg = isset($_POST['background']) ? $_POST['background']: null;
    if($bg) {
        update_post_metadata($post, 'second_background_image', $bg);
    }
}

add_action('save_post', 'saveSecondBackgroundImage');