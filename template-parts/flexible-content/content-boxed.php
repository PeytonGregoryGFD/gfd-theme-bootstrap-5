<?php 
extract( $args );
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class');
$bg = get_sub_field('background');
$content = get_sub_field('content');
$content_width = get_sub_field('content_width');
$padding = get_sub_field('padding');
$section_options = get_sub_field('section_options');
$column_links = get_sub_field('column_links');
$columns = get_sub_field('columns');
$cb = get_sub_field('content_blocks');
if( $cb ): 
    $count = count($cb); 
endif;

if( have_rows('content_blocks') ): 
    
    $column_class = 'col-12 col-lg-4';
    if($columns == 2) {
        $column_class = 'col-12 col-md-6';
    } elseif($columns == 3) { 
        $column_class = 'col-12 col-lg-4';
    } elseif($columns == 4) { 
        $column_class = 'col-12 col-lg-3';
    } ?>

<section id="section<?php echo $s; ?>"  class="flexible-content content-boxed-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $bg_image); ?> boxed-content">
    <div class="<?php if ($content_width == 'narrow') { echo 'container-md'; } else { echo 'container';} ?> <?php if($container_class) { echo esc_attr($container_class);}  ?>">
         <!-- Content Section ------------------------------------------------------------------------>
			<div class="row">
                <?php if (!empty($content)) { ?>
                    <div class="<?php  if ($content_width == 'narrow') { echo 'col-8 offset-2'; } else { echo 'col-12 offset-0';} ?>"><?php echo $content; ?></div>
                <?php } ?>
            </div>
		<div class="row gx-3 justify-content-center d-flex">
            <?php while ( have_rows('content_blocks') ) : the_row();
                $graphic_type = get_sub_field('graphic_type');
                $icon = get_sub_field('icon'); 
                $title = get_sub_field('title'); 
                $text = get_sub_field('text'); 
                $class = get_sub_field('class'); 
                $link = get_sub_field('link'); 
                $bg_image = get_sub_field('bg_image');
                ?>
                <div class="<?php echo $column_class; ?> mb-5">
                    <div class="animated wow fadeInUp h-100 <?php if(($bg_image) && ($column_links != 'title')) { echo ' overlay-black-fade-left light'; }?>" <?php if($bg_image) { ?>style="background:url('<?php echo $bg_image; ?>') center no-repeat;background-size:cover;"<?php } ?>>
                        <div class="card <?php echo esc_attr($class);?>">

                            <?php if($icon): 
                                $url = $icon['url'];
                                $alt = $icon['alt'];
                                $caption = $icon['caption'];
                                // Thumbnail size attributes.
                                $size = 'thumbnail';
                                $thumb = $icon['sizes'][ $size ];
                                $width = $icon['sizes'][ $size . '-width' ];
                                $height = $icon['sizes'][ $size . '-height' ];
                                ?>
                                <img src="<?php echo $icon['sizes']['gallery-med']; ?>" alt="<?php echo $icon['alt']; ?>"  class="<?php echo esc_attr($graphic_type); ?>">
                            <?php endif; ?>

                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="card-content">
                                    <?php if($title) { ?><h4 class="mb-1 p-0 fw-bold card-title"><?php echo $title; ?></h4><?php } ?>
                                    <?php if($text) { ?><p class="mb-0 p-0 text-dark small"><?php echo $text; ?></p><?php } ?>
                                </div>
                                
                                <?php if(!empty($link)) { ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" class="d-block link-img" target="<?php echo $link['target']; ?>" aria-label="<?php echo $title; ?>">
                                        <img src="<?php echo esc_url( get_stylesheet_directory_uri(  ). '/images/icon-arrow-right.png'); ?>" class="img-fluid img-save-icon" width="54" height="54" alt="Arrow" loading="lazy">
                                    </a>
                                <?php } ?>
                            </div>
                        </div><!-- card -->
                    </div>
                </div>
		    <?php endwhile; ?>
		</div>
		<!-- Buttons -->
        <?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
	   		<div class="animated wow fadeInUp text-center">
             	<?php if( have_rows('buttons') ): ?>
					<div class="flex-row flex-wrap" style="justify-content: center;">
						<?php while( have_rows('buttons') ) : the_row();
						$button = get_sub_field('button'); 
						?>
							<div style="margin: 10px 20px;"><a class="button outline" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" style="margin-left: 30px;"><?php echo $button['title']; ?></a></div>
						<?php endwhile; ?>
					</div>	
				<?php endif; ?>
		   </div>
       <?php } ?>
    </div>
</section>
<?php endif; ?>