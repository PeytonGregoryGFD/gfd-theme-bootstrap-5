<?php
function gfd_theme_setup(){
	// Register menus.
	register_nav_menus(
		array(
			'header'   => __( 'Header Navigation', 'gfd-theme' ),
			'footer'   => __( 'Footer Navigation', 'gfd-theme' ),
			'footer_1' => __( 'Footer Navigation 1', 'gfd-theme' ),
		)
	);


add_post_type_support( 'post', 'excerpt' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'yoast-seo-breadcrumbs' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails', array('post','page') );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'html5', [ 'script', 'style' ] );
	// Add WYSIWYG editor stylesheet.
	add_editor_style( '/assets/css/editor-styles.min.css' );

	// Logo Customizer
	add_theme_support( 'custom-logo', 
		array(
			'height'      => 70,
			'width'       => 190,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
 	); 

	// Cleanup Head
	//remove_action( 'wp_head', 'rsd_link' );
	//remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links', 2 );
	//remove_action( 'wp_head', 'index_rel_link' );
	//remove_action( 'wp_head', 'wlwmanifest_link' );
	//remove_action( 'wp_head', 'feed_links_extra', 3 );
	//remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	//remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	//remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	//remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	//remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	
	add_filter('widget_text', 'do_shortcode');
	
	// Add custom image sizes.
	add_image_size( '3x2-md', 768, 512, true );
	add_image_size( '13x5-md', 780, 300, true );
	add_image_size( '13x5-xxl', 1443, 555, true );
	add_image_size( '1x1-sm', 576, 576, true );
	 add_image_size( '4x3-md', 768, 576, true );
    // add_image_size( 'square-300', 300, 300, array( 'center', 'center' ) ); // Custom Image Size: 300 pixels square, hard crop mode
	// add_image_size( 'square-600', 600, 600, array( 'center', 'center' ) ); // Custom Image Size: 300 pixels square, hard crop mode
	// add_image_size( 'landscape-600', 600, 450, array( 'center', 'center' ) ); // Custom Image Size: 600 x 450 pixels, hard crop mode
	// add_image_size( 'portrait-600', 600, 800, array( 'center', 'center' ) ); // Custom Image Size: 600 x 800 pixels, hard crop mode
	add_image_size( '16x9-md', 560, 315, array( 'center', 'center' ) ); // Custom Image Size: 560 x 315 pixels, hard crop mode
	// add_image_size( 'team-portrait', 240, 270, array( 'center', 'center' ) ); 

	// Include custom post types, custom taxonomies, general includes, and plugin customizations.
	$includes = array_merge(
		glob( get_theme_root() . '/' . get_template() . '/inc/*.php' ), // All includes.
		glob( get_theme_root() . '/' . get_template() . '/types/*.php' ), // All custom post types.
		glob( get_theme_root() . '/' . get_template() . '/taxonomies/*.php' ), // All custom taxonomies.
	);

	// Include files.
	if ( $includes ) {
		foreach ( $includes as $include ) {
			include_once $include;
			}
	}

}
add_action('after_setup_theme', 'gfd_theme_setup');