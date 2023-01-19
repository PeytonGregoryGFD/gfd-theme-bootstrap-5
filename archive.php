<?php get_header(); ?>
<main id="top">
	<section id="archive" class="py-5">
		<div class="container text-center">
			<?php if(have_posts()) { ?>
				<h1><?php echo single_term_title(); ?></h1>
				<div class="row">
					<?php while(have_posts()) {
					the_post(); 
						$post_id = get_the_ID();
						$alt_link = get_field('more_info', $post_id);
						?>
						<div class="col-12 col-md-4 mb-4">
							<div class="card border-0">
								<div class="image">
									<a href="<?php if($alt_link){ echo $alt_link; } else { the_permalink(); } ?>" class="no-underline" tabindex="-1">
										<?php gfd_featured_image('landscape-550', 'custom-class'); ?>
									</a>
								</div>
								<div class="my-3">
									<a href="<?php if($alt_link){ echo $alt_link; } else { the_permalink(); } ?>" class="no-underline">
										<p><?php the_title(); ?></p>
									</a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div id="pagination" class="pagination my-3">
					<?php
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'prev_text' => '<span class="btn btn-black"><i class="fa-solid fa-angle-left"></i> Back</span>',
						'next_text' => '<span class="btn btn-black">Next <i class="fa-solid fa-angle-right"></i></span>'
					) );
					?>
				</div>
			<?php wp_reset_postdata(); } //endif posts ?>
		</div>
	</section>
	<?php  get_template_part('bootstrap/bs-parts/bs-flex-full'); ?>
</main>
<?php get_footer(); ?>