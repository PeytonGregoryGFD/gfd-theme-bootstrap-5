<?php /*Template Name: Flexible*/ 
get_header();  ?>
	<main id="top">
			<?php 
			// ID of the current item in the WordPress Loop
			$id = get_the_ID();

			// check if the flexible content field has rows of data
			if ( have_rows( 'flexible_content', $id ) ) :
				
					// Variable for unique Section ID
					$section_id = 1;
					
						// loop through the selected ACF layouts and display the matching partial
						while ( have_rows( 'flexible_content', $id ) ) : the_row();

								// Pass section ID to each template part
								$args = array(
									's' => $section_id
								);
								get_template_part( 'template-parts/flexible-content/' . get_row_layout(), null, $args );
								
								// Increase ID by 1
								$section_id++;

						endwhile;

				elseif ( get_the_content() ) :

					// no layouts found

			endif; 
			?>
	</main>
<?php get_footer(); ?>