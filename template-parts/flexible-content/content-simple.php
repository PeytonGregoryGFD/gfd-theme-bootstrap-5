<?php extract( $args ); 
$content = get_sub_field('content'); 
$image = get_sub_field('simple_image'); 
$link = get_sub_field('link'); 
$image_orientation = get_sub_field('image_orientation'); 
$background_image = get_sub_field('background_image'); 
$bg_image = '';
if($background_image) { 
    $bg_image = 'style="background-image:url(' . esc_url($background_image['url']) . '); background-size:cover;"';
}
$background_color = get_sub_field('background_color'); 
$text_color = get_sub_field('text_color'); 
$vertical_alignment = get_sub_field('vertical_alignment'); 
$content_width = get_sub_field('content_width');
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class') . ' ' . $bg . ' ' . $padding;
$container_class = get_sub_field('container_class'); 
$column_class = get_sub_field('column_class'); 
?>
<section id="section<?php echo $s; ?>" class="flexible-content content-simple-section text-center text-lg-start <?php echo esc_attr($section_class); ?>" <?php echo $bg_image; ?>>
    <div class="container <?php echo esc_attr($container_class); ?>">
        <div class="row <?php echo esc_attr($vertical_alignment); ?>">
            
            <div class="<?php echo esc_attr($column_class ?: 'col order-3'); ?> <?php if( $image_orientation == 'left') { echo 'order-lg-2'; } else { echo 'order-lg-1';} ?>">
                <div class="section-content">
                    <?php echo $content; ?>
                </div>       
            </div>

            <?php if($image) { ?>
                <div class="col order-2 <?php if( $image_orientation == 'left') { echo 'order-lg-1'; } else { echo 'order-lg-4';} ?>">
                    <div class="section-image">
                            <?php
                            // Cropped Image size attributes.
                            // Image variables.
                            $url = $image['url'];
                            $title = $image['title'];
                            $alt = $image['alt'];
                            $caption = $image['caption'];

                            // Thumbnail size attributes.
                            $size = 'full';
                            $thumb = $image['sizes'][ $size ];
                            $width = $image['sizes'][ $size . '-width' ];
                            $height = $image['sizes'][ $size . '-height' ];
                            
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="d-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" >
                                <?php endif; ?>
                                    <img loading="lazy" src="<?php echo $url; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid w-100">
                                <?php if( $link ): ?>
                                </a>
                            <?php endif; ?>
                    </div>
                </div>	
            <?php } ?>

        </div>
    </div> 
</section>