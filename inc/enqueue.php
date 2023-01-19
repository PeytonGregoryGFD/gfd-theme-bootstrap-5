<?php
function gfd_theme_files(){
	// Slick Slider - Optional
    wp_enqueue_script('slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array('jquery'), true);
    wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/lib/slick/slick.css' );
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/lib/slick/slick-theme.css' );

    // Bootstrap 5 Theme Variables. Add New SCSS Components to this file.
    wp_enqueue_style( 'bootstrap-5', get_template_directory_uri() .'/assets/css/theme-variables.min.css' );
    
    // Custom Style is a blank slate for project specific CSS -- make sure this file is empty when starting a new project
    wp_enqueue_style( 'custom', get_template_directory_uri() .'/assets/css/editor-style.css' );

    // Bootstrap 5 Component Scripts
    wp_enqueue_script('bootstrap-5', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.1', true);

    // Blank slate for project specific scripts -- make sure this file is empty when starting a new project
    wp_enqueue_script('gfd-custom', get_template_directory_uri() . '/assets/js/custom-script.js', array('jquery'), '1.1', true);

    // Default Theme Stylesheet - Dont Edit. Create new components and include them in the file above.
    wp_enqueue_style('styles', get_stylesheet_uri(),NULL, microtime());
}
add_action('wp_enqueue_scripts','gfd_theme_files');
?>