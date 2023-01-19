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
$section_class = get_sub_field('section_class') . ' ' . $background_color . ' ' . $padding;
$container_class = get_sub_field('container_class'); 
$column_class = get_sub_field('column_class'); 

$testimonials = get_sub_field('testimonials');
if( $testimonials ): ?>
<section id="section<?php echo $s; ?>"  class="flexible-content testimonials-section slick-slider-content <?php echo esc_attr($section_class); ?>"<?php echo esc_attr($bg_image); ?>>
   <div class="<?php if ($content_width == 'narrow') { echo 'container-md'; } else { echo 'container';} ?> <?php if($container_class) { echo esc_attr($container_class);}  ?>">
		<div class="row">
			<div class="col-12">
				<div class="mb-5 section-content"><?php echo $content; ?></div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-11">
			<div class="testimonials-slider">
				<?php foreach( $testimonials as $post ): 
					setup_postdata($post); 
					$first = get_field('first_name');
					$last = get_field('last_name');
					$title = get_field('title');
					$company = get_field('company');
					$image = get_field('image');
				?>
				<div>
					<div class="testimonail-container text-center mx-4 mb-5">
						<div class="card shadow px-3 py-4">
							<div class="container">
								<div class="row">
									<div class="col-12 d-flex py-3 text-center justify-content-center">
										<i class="fa-thin fa-comment-quote"></i>
										<img class="img-fluid testimonail-quote-icon" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/purple-quote.svg'); ?>" />
									</div>
									<div class="col-12">
										<div class="section-content testimonial-content">
											<?php the_content(); ?>
										</div>
									</div>
									<div class="col-12">
										<div class="fw-bold">-- <?php echo $first . ' ' . $last; ?></div>
										<div class="p-0 small"><?php echo $title; if($title && $company) {echo ', ';} echo $company; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php // $r++; 
				endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			</div>
			</div>
		</div>

</section>
<script>
    jQuery(function($){
	$('.testimonials-slider').slick({
	 //centerMode: true,
	 //centerPadding: '150px',
	  slidesToShow: 1,
	  slidesToScroll: 1,
      arrows: true,
	  dots: false,
      autoplaySpeed: 4000,
	  responsive: [
		{
      breakpoint:991,
      settings: {
        //centerMode: true,
        //centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        //centerMode: true,
        //centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        //centerMode: true,
        //centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
	});
});
</script>
<?php endif; ?>