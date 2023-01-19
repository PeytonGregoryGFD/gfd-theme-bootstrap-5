<?php 
// Widgets
add_action( 'widgets_init', 'gfd_widgets_init' );
function gfd_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar', 
		'id'            => 'sidebar-1',
		'description'   => 'Add sidebar widgets here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar(array(
		'name'	=> 'Hero',
		'id'    => 'hero-1',
		'description' => 'Add widgets between main navbar and page content here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

    register_sidebar( array(
		'name'          => 'Footer 1', 
		'id'            => 'footer-1',
		'description'   => 'Add widgets to footer here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

     register_sidebar( array(
		'name'          => 'Footer 2', 
		'id'            => 'footer-2',
		'description'   => 'Add widgets to footer here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 3', 
		'id'            => 'footer-3',
		'description'   => 'Add widgets to footer here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

    register_sidebar( array(
		'name'          => 'Footer 4', 
		'id'            => 'footer-4',
		'description'   => 'Add widgets to footer here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 5', 
		'id'            => 'footer-5',
		'description'   => 'Add widgets to footer here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

}
?>