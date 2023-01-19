<?php 
extract( $args );
$section_options = get_sub_field('section_options'); 
$bg = get_sub_field('background'); 
$content = get_sub_field('content'); 
$content_width = get_sub_field('content_width');
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
<section id="section<?php echo $s; ?>" class="flexible-content recommended-posts-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $bg_image); ?>">
    <div class="container">
         <!-- Content Section ------------------------------------------------------------------------>
		<div <?php if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
            <!-- Text -->
            <div><?php echo $content; ?></div>
        </div>
		<?php
		$posts = get_sub_field('posts');
		if( $posts ): ?>
        <div class="row">
			<?php foreach( $posts as $post ): 
			setup_postdata($post);
        		$terms = get_the_terms( $post->ID, 'category' );
				if(!$terms) {
					$terms = get_the_terms( $post->ID, 'resource-type' );
				}
				$categories = wp_list_pluck( $terms, 'name' );
				
                $playClass = 'no-play-btn';
                if(in_array('Videos', $categories)) {
                    $playClass = 'play-btn-overlay';
                }
				$more_info = get_field('more_info');
				if($more_info) {
					$permalink = $more_info;
				} else {
					$permalink = get_the_permalink();
				}
			?>
			<div class="col-12 col-md-4">
				<div class="post-container text-center">
					<a href="<?php echo $permalink; ?>" class="post-img mb-3  <?php echo esc_attr($playClass); ?>" tabindex="-1">
						<?php gfd_featured_image('landscape-550', 'custom-class'); ?>
					</a>
                    <div class="post-category mb-3">
                        <a class="no-underline text-dark post-category-link text-uppercase fw-bold small" href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>"><?php echo $categories[0]; ?></a>
                    </div>
					<div class="post-title">
						<a class="no-underline text-black fw-bold" href="<?php echo $permalink; ?>"><?php the_title(); ?></a>
					</div>
                    <?php // echo wp_trim_words( $excerpt, 26, '...'); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php wp_reset_postdata(); endif; ?>
    </div>
</section>