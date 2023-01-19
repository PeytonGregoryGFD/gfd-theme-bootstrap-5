<?php
$categories = wp_get_post_categories();
$category = $categories[0];
$cat = $category->name;
$author_id = get_the_author_meta( 'ID' ); 
$author = get_the_author_meta( 'display_name', $author_id ); 
$author_img = get_field('author_photo', 'user_' . $author_id);
// Cropped Image size attributes.
$size = 'square-300';
$a_img = $author_img['sizes'][ $size ];
$blog_bg = get_field('blog_bg','options');
$terms = get_the_terms( $post->ID, 'category' );
$categories = wp_list_pluck( $terms, 'name' );
?>
<section class="heading-post-section bg-light teal-accent-bottom yellow-triangle-bottom-right-500 " id="heading">
	<div class="container">
		<div class="row align-items-center" style="min-height: 500px;">
			<div class="col-12 pt-3 small">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
					}
				?>
			</div>
			<div class="col-12 col-lg-5 mb-lg-5">
				<div class="h-content animated fadeInLeft">
					<a class="no-underline text-uppercase fw-bold text-dark d-none"  href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>"><?php echo $categories[0]; ?></a>
					<?php if(!is_single()) { ?>
						<div class="text-dark fw-bold">FEATURED</div>
					<?php } ?>
					<h1 class="post-title"><?php the_title(); ?></h1>
					<div class="post-meta">
						<p class="p-0 mb-3 mb-lg-0 fw-bold text-uppercase"><?php echo get_the_date( 'M d, Y' ); ?></p>
					</div>
				</div>
			</div>
			<div class="h-img col-12 col-lg-6 offset-lg-1 mb-lg-5">
				<div class="position-relative mb-3 mb-lg-0">
					<?php gfd_featured_image('landscape-600', 'shadow z-index-1'); ?>
				</div>
			</div>
		</div>
	</div>
</section>