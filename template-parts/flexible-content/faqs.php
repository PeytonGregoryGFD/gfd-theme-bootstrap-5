<?php extract( $args ); 
$background_color = get_sub_field('background_color'); 
$content = get_sub_field('content'); 
$content_width = get_sub_field('content_width');
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class') . ' ' . $padding . ' ' . $background_color;
$container_class = get_sub_field('container_class');
$column_class = get_sub_field('column_class');
?>
<section id="section<?php echo $s; ?>"  class="flexible-content faqs-section <?php echo esc_attr($section_class); ?>">
   <div class="container <?php echo esc_attr($container_class); ?>">
  	    
  	    <?php if($content){ ?>
			<div class="row">
				<div class="col-12">
					<div class="section-content">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if( have_rows('faqs') ): ?>
			<div class="row">
				<div class="<?php echo esc_attr($column_class ?: 'col'); ?>">
					<div class="accordion accordion-flush" id="accordion<?php echo $s; ?>">
						<?php 
						$f=1;
						while ( have_rows('faqs') ) : the_row();
						$question = get_sub_field('question'); 
						$answer = get_sub_field('answer');  
						?>
							<div class="accordion-item py-3 px-5 bg-light rounded-1 mb-3">
								<h2 class="accordion-header bg-light" id="heading<?php echo $f; ?>">
									<button class="accordion-button bg-light shadow-none fw-bold h3 mb-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $f; ?>" aria-expanded="true" aria-controls="collapse<?php echo $f; ?>">
										<?php echo $question; ?>
									</button>
								</h2>
								<div id="collapse<?php echo $f; ?>" class="accordion-collapse collapse <?php if($f == 1) {echo 'show';} ?>" aria-labelledby="heading<?php echo $f; ?>" data-bs-parent="#accordion<?php echo $s; ?>">
									<div class="accordion-body border-top mt-3">
										<?php echo $answer; ?>
									</div>
								</div>
							</div>
						<?php $f++;
						endwhile; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>
</section>