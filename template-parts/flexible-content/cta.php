<?php extract( $args ); 
$content = get_sub_field('content');
$image = get_sub_field('image');
$bg = get_sub_field('background'); 
$content = get_sub_field('content'); 
$content_width = get_sub_field('content_width');
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class');
$section_options = get_sub_field('section_options'); 
$bg_image = '';
 if((!empty($background_image)) && ($bg == 'bg-image')) { 
    $bg_image = 'style="background-image:url(' . esc_url($background_image['url']) . '); background-size:cover;"';
}?>
<section id="section<?php echo $s; ?>" class="flexible-content cta-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $bg_image); ?> cta">
    <div class="container <?php if($container_class) { echo esc_attr($container_class);}  ?>">
        <div class="row d-flex align-items-center">
            <?php if(!empty($image)) : ?>
            <div class="col-12 col-md-2 text-center text-lg-end">
                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid img-cta-icon mb-3 mb-md-0" />
            </div>
            <?php endif; ?>
            <?php if(!empty($content)) {?>
                <div class="col-12 col-md-6">
                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>
                </div>
            <?php } ?>
            <?php if( have_rows('buttons') ): ?>
                <div class="col-12 col-md-4 text-center">
					<div class="cta-btn-holder animated wow fadeInRight">
						<?php while( have_rows('buttons') ) : the_row();
						$button = get_sub_field('button');
                        $background_color = get_sub_field('background_color');
                        $background_class = 'btn-black text-white';
                        if(!empty($background_color)) {
                            $background_class = $background_color;
                        } ?>
							<a class="btn <?php echo $background_class; ?>"  href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						<?php endwhile; ?>
				   </div>
                 </div>
			   <?php endif; ?>
        </div>
    </div>
</section>