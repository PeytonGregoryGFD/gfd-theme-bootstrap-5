<?php get_header(); 
$ID = get_option( 'page_for_posts' );
$header_content = get_field('header_content', $ID);
$featured_post = get_field('featured_post', $ID);
$footer_image = get_field('footer_image', $ID);
$footer_content = get_field('footer_content', $ID);
?>
    <main id="top">
        <section class="blog-header bg-light text-black yellow-triangle-bottom-right position-relative py-5" id="blogHeader">
            <?php if(!empty($header_content)) {?>    
                <div class="container py-5 position-relative">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $header_content; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if(!empty($featured_post)) :
                $terms = get_the_terms( $featured_post->ID, 'category' );
				if(!$terms) {
					$terms = get_the_terms( $featured_post->ID, 'resource-type' );
				}
				$categories = wp_list_pluck( $terms, 'name' );?>    
                <div class="container shadow border-radius-1 p-4 position-relative bg-white teal-accent-flush-lb overflow-hidden">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-md-5 order-2">
                           <article class="post-container">
                                <div class="post-category mb-3">
                                    <a class="d-none no-underline text-dark post-category-link text-uppercase fw-bold small" href="<?php echo esc_url( get_term_link( $terms ) ); ?>"><?php echo $categories[0]; ?></a>
                                    <span class="no-underline text-dark post-category-link text-uppercase fw-bold small">Featured</span>
                                </div>
                                <h2 class="post-title"><a class="no-underline text-black" href="<?php echo get_the_permalink($featured_post->ID); ?>"><?php echo esc_html( $featured_post->post_title ); ?></a></h2>
                                <div class="post-content mb-3">
                                    <?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
                                </div>
                                <div class="post-button">
                                    <a class="btn btn-primary mb-5 mb-md-0" href="<?php echo get_the_permalink($featured_post->ID); ?>">Read More</a>
                                </div>
                           </article>
                        </div>
                        <div class="col-12 col-md-6 offset-0 offset-md-1 order-1 order-md-3">
                            <a href="<?php echo get_the_permalink($featured_post->ID); ?>"><?php echo get_the_post_thumbnail($featured_post->ID, 'large', array('class'=>'img-fluid post-thumbnail rounded w-100 mb-3 mb-md-0') ) ?></a>
                        </div>
                    </div>
                </div>
                <?php wp_reset_postdata(  ); ?>
            <?php endif; ?>
        </section>
        <section class="recent-posts bg-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">Recent Posts</h2>
                    </div> 
                    <div class="col-12">
                        <div class="category-links d-flex justify-content-center mb-4 row gx-0">
                        <div class="col-auto"><a class="category-filter rounded-pill btn btn-light text-black m-1 fw-lighter text-nowrap" title="" href="">All</a></div>
                            <?php
                                $categories = get_categories();
                                foreach($categories as $category) {
                                echo '<div class="col-auto"><a class="category-filter rounded-pill btn btn-light text-black m-1 fw-lighter text-nowrap" title="' . $category->slug . '" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
                                }
                            ?>
                        </div>
                    </div>
                    </div>
                      <div class="filter-post-container row">
                      <?php 
                      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                            'paged'          => $paged, 
                            'post_type' => 'post',
                            'status' => 'published',
                            'posts_per_page' => 9,
                        );
                        $the_query = new WP_Query( $args );
                        while($the_query->have_posts()) {
                        $the_query->the_post();  
                            $post_categories = get_the_category();
                            $cat_name = $post_categories[0]->cat_name;
                            $cat_id = $post_categories[0]->ID;
                            ?>     
                            <article class="post-container text-center mb-4 col-12 col-md-6 col-lg-4">
                                <a href="<?php the_permalink(); ?>"> <?php gfd_featured_image('square-300', 'custom-class'); ?></a> 

                                <a class="no-underline text-dark post-category-link text-uppercase fw-bold small d-block mb-2" href="<?php echo esc_url( get_category_link( $cat_id ) ); ?>"><?php echo $cat_name; ?></a>
                                <h5 class="post-title"><a class="no-underline mb-5 text-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </article>
                        <?php } ?>
                      </div>
                      
                      <div class="pagination justify-content-center d-flex my-5 align-items-center">
                        <?php
                        $big = 999999999; // need an unlikely integer
                        $args = array(
                            'base' => home_url( '/%_%' ),
                            'format' => 'page/%#%/',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $the_query->max_num_pages,
                            'prev_text' => __( '<span class="bg-black text-white btn btn-black p-3"><i class="fa-solid fa-angle-left text-primary"></i> Previous Page</span>', 'go-fish' ),
                            'next_text' => __( '<span class="bg-black text-white btn btn-black p-3">Next Page <i class="fa-solid fa-angle-right text-primary"></i></span>', 'go-fish' ),
                        );
                        // echo paginate_links( $args );
                        ?>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-black py-5 yellow-triangle-bottom-right-450 overflow-hidden teal-accent-flush-lb">
            <div class="container position-relative">
                <div class="row justify-content-center d-flex align-items-center">
                    <?php if($footer_image) { ?>
                    <div class="col-12 col-md-4">
                            <img class="img-fluid acf-image w-100 mb-3 mb-md-0" src="<?php echo esc_url($footer_image['url']); ?>" alt="" loading="lazy" >
                    </div>
                    <?php } ?>
                    <div class="col-12 col-md-6">
                        <div class="section-content">
                            <?php echo $footer_content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>