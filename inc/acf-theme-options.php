<?php
/*Theme Options Page*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Load ACF Script Header
function gfd_scripts_header() {
	the_field('scripts_header', 'option');
}
add_action('wp_head', 'gfd_scripts_header');

// Load ACF Script Body
function gfd_scripts_body() {
	the_field('scripts_body', 'option');
}
add_action('wp_body_open', 'gfd_scripts_body');

// Load ACF Script Header
function gfd_scripts_footer() {
	the_field('scripts_footer', 'option');
}
add_action('wp_footer', 'gfd_scripts_footer');
?>