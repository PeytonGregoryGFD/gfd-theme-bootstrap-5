<?php get_header(); 
	 while(have_posts()) {
		the_post();  ?>
		<main id="top">
			<?php if ( ! post_password_required() ) : ?>
				<section class="content">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif;  ?>
		</main>
	<?php } ?>
<?php get_footer(); ?>