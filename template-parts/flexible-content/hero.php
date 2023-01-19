<?php extract( $args ); 
$content = get_sub_field('content'); 
$image = get_sub_field('image'); 
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
<section id="section<?php echo $s; ?>" class="flexible-content hero-section <?php echo esc_attr($section_class ); ?>" <?php echo $bg_image; ?>>
    <div class="container <?php echo esc_attr($container_class); ?>">
        <div class="row gx-0 <?php echo esc_attr($vertical_alignment); ?>">
            <div class="order-1 <?php echo esc_attr($column_class ?: 'col' ); ?> <?php if(($image) && ($image_orientation == 'left')) { echo 'order-lg-3'; }  ?>">
                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>       
            </div>
            <?php if($image) { ?>
                <div class="col order-2">
                    <div class="section-image <?php if( $image_orientation == 'left') { echo 'pe-lg-5'; } else { echo 'ps-lg-5';} ?>">
                            <?php
                            // Cropped Image size attributes.
                            $size = 'full';
                            $thumb = $image['sizes'][ $size ];
                            $width = $image['sizes'][ $size . '-width' ];
                            $height = $image['sizes'][ $size . '-height' ];
                            $image_url = $image['url'];
                            if($width) {
                                $image_width = 'width="' . $width . '"';
                            }
                            if($height) {
                                $image_height = 'height="' . $height . '"';
                            }
                            $file_extension = pathinfo($image_url, PATHINFO_EXTENSION);
                             if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; 
                                ?>
                                <a class="d-block" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" >
                            <?php endif; ?>
                                    <?php if ($file_extension == 'svg') { ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid img-svg w-100">
                                    <?php } else { ?>
                                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid w-100 img-type-<?php echo esc_attr($file_extension); ?>" <?php echo $image_width; ?>  <?php echo $image_height; ?>>
                                    <?php } ?>
                            <?php if( $link ): ?>
                                </a>
                            <?php endif; ?>
                    </div>
                </div>	
            <?php } ?>
        </div>
    </div>
</section>