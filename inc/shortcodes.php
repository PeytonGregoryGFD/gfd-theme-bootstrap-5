<?php
/*WP Admin Notices*/
function wp_admin_notice(){
	global $pagenow;
    if ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) { 
      ?>
      <div class="updated" style="padding-top:10px;">  
		<span style="font-size: 18px; line-height: 22px;"><strong>Shortcodes:</strong></span>
		 <br>Target, class, and label are optional. Blank will open link in new window. Use label when the link text is vague (i.e. Click Here).
        <p>
		<strong>Button</strong>: [button url="https://sample.com" text="Button text goes here"] 
        </p>
		 <p>
		<strong>Button with options</strong>: [button url="https://sample.com" text="Button text goes here" class="btn-secondary text-dark" target="blank" label="aria label text"] 
        </p>
		<p>
		<strong>Popup</strong>: [popup text="Button text goes here" ] 
        </p>
        <p>
		<strong>Small Accent Text</strong>: [accent text="Text goes here"]
		</p>
		<p>
		  <strong>Small Disclosure Text</strong>: [disclosure text="Small text goes here."]  
		</p>
      </div>
     <?php }
 }
 add_action('admin_notices','wp_admin_notice');

/*Shortcodes*/

//[year]
function currentYear( $atts ){ return date('Y');}
add_shortcode( 'year', 'currentYear' );

//[button]
function custom_button_shortcode( $atts, $content = null ) {
    // shortcode attributes
    extract( shortcode_atts( array(
        'url'    => '',
        'title'  => '',
        'target' => '',
		'class' => '',
        'text'   => '',
		'label'   => ''
    ), $atts ) );
    $content = $text ? $text : $content;
	if ( empty($class) ) {
		$class = 'btn';
	}
// Returns the button with a link
    if ( $url ) {
        $link_attr = array(
            'href'   => esc_url( $url ),
            'title'  => esc_attr( $title ),
            'target' => ( 'blank' == $target ) ? '_blank' : '',
            'class'  => $class . ' btn mb-3',
			'aria-label'  => $label
        );
        $link_attrs_str = '';
        foreach ( $link_attr as $key => $val ) {
            if ( $val ) {
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
            }
        }
        return '<a' . $link_attrs_str . '>' . do_shortcode( $content ) . '</a>';
    }
    // Return as span when no link defined
    else {
        return '<span class="text-secondary fw-bold small">' . do_shortcode( $content ) . '</span>';
    }
}
add_shortcode( 'button', 'custom_button_shortcode' );

//[popup]
function popup_shortcode( $atts, $content = null ) {
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
    $content = $text ? $text : $content;
    // Returns the button with a link
    return '<div class="popup button" tabindex="0">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'popup', 'popup_shortcode' );

//[accent]
function accent_text_shortcode( $atts, $content = null ) {
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
    $content = $text ? $text : $content;
    // Returns the button with a link
    return '<span class="text-info h4 accent-shortcode">' . do_shortcode( $content ) . '</span>';
}
add_shortcode( 'accent', 'accent_text_shortcode' );

//[disclosure]
function disclosure_shortcode( $atts, $content = null ) {
    // shortcode attributes
    extract( shortcode_atts( array(
        'text'   => ''
    ), $atts ) );
    $content = $text ? $text : $content;
    // Returns the button with a link
    return '<p class="small disclosure-shortcode">' . do_shortcode( $content ) . '</p>';
}
add_shortcode( 'disclosure', 'disclosure_shortcode' );
?>