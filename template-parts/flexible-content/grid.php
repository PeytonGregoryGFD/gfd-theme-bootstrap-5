<?php extract( $args ); 
$grid_columns = get_sub_field('grid_columns'); 
$grid_blocks = get_sub_field('grid_blocks');
$content = get_sub_field('content'); 
$content_width = get_sub_field('content_width'); 
$grid_caption = get_sub_field('grid_caption'); 
$bg = get_sub_field('background'); 
if( $grid_blocks ): 
$count = count($grid_blocks); 
endif;
$section_options = get_sub_field('section_options'); 
$padding = get_sub_field('padding');
if(empty($padding)) {
    $padding = "py-5";
}
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class'); 
$bg_image = '';
 if((!empty($background_image)) && ($bg == 'bg-image')) { 
$bg_image = 'style="background-image:url(' . esc_url($background_image['url']) . '); background-size:cover;"';
    }
?>
<section id="section<?php echo $s; ?>"  class="flexible-content grid-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class); ?>">
   <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="animated fadeInUp wow" <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
					<?php if(!empty($content)) { ?>
						<div class="section-content pb-3">
							<?php echo $content; ?>
						</div>       
					<?php } ?>
				</div>
			</div>
		<?php if( have_rows('grid_blocks') ): ?>
			<div class="col-12">
				<div class="row justify-content-center justify-content-md-start animated fadeInUp wow grid grid-column-<?php echo esc_attr($grid_columns); ?>">
					<?php while ( have_rows('grid_blocks') ) : the_row();
						$icon = get_sub_field('icon'); 
						$icon_orientation = get_sub_field('icon_orientation'); 
						$grid_block = get_sub_field('grid_block'); 
						?>
						<div class="<?php if($grid_columns == 3) { echo 'col-md-4'; } else if($grid_columns == 2) { echo 'col-md-6'; } else if($grid_columns == 4) { echo 'col-md-3'; } ?> col-12 grid-item">
							<?php if($icon) { ?>
								<div class="text-center pt-3">
									<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
								</div>
							<?php } ?>
							<div class="grid-block pt-3 pb-3">
								<?php echo $grid_block; ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	   <!-- Buttons -->
        <?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
	   		<div style="text-align: center;">
             	<?php if( have_rows('buttons') ): ?>
					<div class="flex-row flex-wrap">
						<?php while( have_rows('buttons') ) : the_row();
						$button = get_sub_field('button'); 
						?>
							<div style="margin-right: 20px;"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></div>
						<?php endwhile; ?>
					</div>	
				<?php endif; ?>
		   </div>
       <?php } ?>
	   <?php if(!empty($grid_caption)) { ?>
			<div class="grid-caption text-center w-100 small">
				<?php echo $grid_caption; ?>
			</div>
	   <?php } ?>
	   </div>
	</div>
</section>