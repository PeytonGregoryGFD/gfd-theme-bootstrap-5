<?php 
extract( $args );
$content = get_sub_field('content');
$background_color = get_sub_field('background_color');
$text_color = get_sub_field('text_color');
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class');
$column_class = get_sub_field('column_class');
$padding = get_sub_field('padding');

$cb = get_sub_field('content_blocks');
if( $cb ): 
$count = count($cb); 
endif;

if( have_rows('slides') ): 
$count = 0;
$counter = 0; ?>
<section id="section<?php echo $s; ?>" class="flexible-content carousel-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class); ?>">
    <div class="container-fluid p-0 <?php echo esc_attr($container_class); ?>">

        <?php if($content) { ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <?php while( have_rows('slides') ): the_row(); ?>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?php echo $counter; ?>" <?php if ($counter < 1) { echo 'class="active" aria-current="true" aria-label="Slide ' . $counter . '"'; } ?>></button>
                    <?php $counter++;?>
                    <?php endwhile; ?>
            </div>

            <div class="carousel-inner">
                <?php while( have_rows('slides') ): the_row(); 
                    $slide_image = get_sub_field('slide_image'); 
                    $slide_text = get_sub_field('slide_text'); ?>
                    <div class="carousel-item  <?php if ($count < 1) { echo 'active'; } ?>">

                        <?php if( $slide_image ):
                            // Image variables.
                            $url = $slide_image['url'];
                            $title = $slide_image['title'];
                            $alt = $slide_image['alt'];
                            $caption = $slide_image['caption'];
                            $size = 'landscape-600';
                            $thumb = $slide_image['sizes'][ $size ];
                            $width = $slide_image['sizes'][ $size . '-width' ];
                            $height = $slide_image['sizes'][ $size . '-height' ];
                            ?>
                                <img class="d-block w-100" src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($alt); ?>" />
                        <?php endif; ?>

                        <?php if(!empty($slide_text)) { ?>

                            <div class="carousel-caption p-0">
                                <div class="container">
                                    <div class="row">
                                        <div class="<?php echo esc_attr($column_class ?: 'col'); ?>">
                                            <div class="section-content">
                                                <?php echo $slide_text; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <?php $count++;?>
                <?php endwhile; ?>
            </div>

            <button class="carousel-control-prev d-none" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next d-none" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
</section>
<?php endif; ?>