<?php extract( $args ); 
$content = get_sub_field('content'); 
$order = get_sub_field('order'); 
$bg = get_sub_field('background'); 
$padding = get_sub_field('padding');
if(empty($padding)) {
    $padding = "py-5";
}
?>
<section id="section<?php echo $s; ?>" class="flexible-content content-grid-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $bg_image); ?>">
   <div class="container" >
	   <div class="row d-flex align-items-center">
		    <?php if( have_rows('grid_blocks') ): ?>
                <div class="col-12 col-lg-7 <?php echo $order; ?>">
                    <div class="row d-flex justify-content-center mb-3 mb-md-5 mb-lg-0">
                        <?php while ( have_rows('grid_blocks') ) : the_row();
                        $grid_block = get_sub_field('grid_block'); 
                        ?>
                        <div class="col-12 col-md-6 grid">
                            <div class="py-4 px-3">
                                <div class="unstyle-link"><?php echo $grid_block; ?></div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
		         <!-- Content Section ------------------------------------------------------------------------>
				<div class="col-12 col-lg-5 order-2">
			<div class="pad-r-lg text-center text-md-start">
			   <div><?php echo $content; ?></div>
				<!-- Buttons -->
				<?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
					<div>
						<?php if( have_rows('buttons') ): ?>
							<div class="flex-row flex-wrap">
								<?php while( have_rows('buttons') ) : the_row();
								$button = get_sub_field('button'); 
								?>
									<div class="me-3"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></div>
								<?php endwhile; ?>
							</div>	
						<?php endif; ?>
				   </div>
			   <?php } ?>
			</div>
        </div>
	   </div> 
	</div>
</section>