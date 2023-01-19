<?php 
// Site Title / Logo
function gfd_sitetitle_header() {
	// ACF Logo Fields
	$logo_primary = get_field( 'logo_primary', 'option' );
	$logo_secondary = get_field( 'logo_secondary', 'option' );
	$logo_width = get_field( 'logo_width', 'option' );
	$logo_height = get_field( 'logo_height', 'option' );

    echo '<a class="navbar-brand py-3" target="_self" href="'. home_url() .'" rel="home" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .' Home Page">';
        if ( $logo_primary ) { 
			// Image variables.
			$url = $logo_primary['url'];
			$title = $logo_primary['title'];
			$alt = $logo_primary['alt'];
			$pathinfo = pathinfo($url);
			if($pathinfo['extension'] == 'svg') {
				
			}
			// Thumbnail size attributes.
			$size = 'medium';
			$thumb = $logo_primary['sizes'][ $size ];
			$width = $logo_primary['sizes'][ $size . '-width' ];
			$height = $logo_primary['sizes'][ $size . '-height' ];
			?>
            <img class="site-logo img-fluid" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($logo_width); ?>" height="<?php echo esc_attr($logo_height); ?>" />
        <?php } else { ?>
            <h1 class="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
        <?php } 
    echo '</a>';
}
add_filter('gfd_sitetitle','gfd_sitetitle_header');
?>