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
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class'); 
$column_class = get_sub_field('content_class'); ?>

<section id="section<?php echo $s; ?>"  class="flexible-content logo-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $background_color); ?>">
   <div class="<?php if ($content_width == 'narrow') { echo 'container-md'; } else { echo 'container';} ?>">
            <div class="row">
                <div class="<?php echo esc_attr($column_class); ?>">
                   <div class="section-content">
                        <?php echo $content; ?>
                   </div>
                </div>
            </div>
		<div class="row d-flex">
		    <?php while( have_rows('logos') ) : the_row();
                $image = get_sub_field('logo');
                $image_hover = get_sub_field('logo_hover');
                $link = get_sub_field('link');
                $size = 'medium';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
            ?>
                <div class="col mb-3">
                    <div class="text-center logo-block <?php if(!empty($image_hover)) { echo 'logo-block-hover'; } ?>">
                        <?php if(!empty($link)) {?><a href="<?php echo  esc_url($link['url']); ?>" class="d-block acf-link text-dark no-underline"><?php } ?>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" loading="lazy" class="img-fluid mb-3 logo-default" />
                            <?php if(!empty($image_hover)) {?>
                                <img src="<?php echo esc_url($image_hover['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-fluid mb-3 d-none logo-hover" />
                            <?php } ?>
                            <?php if(!empty($link['title'])) { ?>
                                <div class="logo-text">
                                    <?php echo $link['title']; ?>
                                </div>
                            <?php } ?>
                        <?php if(!empty($link)) {?></a><?php } ?>
                    </div>
                </div>
			<?php endwhile; ?>
		</div>
	</div>
</section>