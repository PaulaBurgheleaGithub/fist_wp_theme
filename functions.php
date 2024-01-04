<?php

//adding title tags
function pb_theme_support() {
	add_theme_support('title-tag');
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}

add_action('after_setup_theme', 'pb_theme_support');

function pb_menus(){
	$locations = array(
		'primary' => "Desktop Primary Left Sidebar",
		'footer' => "Footer Menu Items"
	);

	register_nav_menus($locations);
}

add_action('init','pb_menus');


$version = wp_get_theme()->get('Version');

function pb_register_styles(){
	global $version;
	wp_enqueue_style('pb-style', get_template_directory_uri()."/style.css", array('pb-bootstrap'), $version, "all");
	wp_enqueue_style('pb-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", "all");
	wp_enqueue_style('pb-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", "all");
}

add_action('wp_enqueue_scripts', 'pb_register_styles');

function pb_register_scripts(){
	global $version;
	wp_enqueue_script('pb-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
	wp_enqueue_script('pb-pooper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
	wp_enqueue_script('pb-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
	wp_enqueue_script('pb-main', get_template_directory_uri()."/assets/js/main.js", array(), $version, true);

}

add_action('wp_enqueue_scripts', 'pb_register_scripts');

function pb_widget_areas() {

	register_sidebar(
		array(
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
			'name' => 'Sidebar Area',
			'id' => 'sidebar-1',
			'description' => 'Sidebar Widget Area',
		)
	);

	register_sidebar(
		array(
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
			'name' => 'Footer Area',
			'id' => 'footer-1',
			'description' => 'Footer Widget Area',
		)
	);
}
add_action('widgets_init', 'pb_widget_areas');


?>

