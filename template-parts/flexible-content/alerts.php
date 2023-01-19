<?php extract( $args ); 
$bg = get_sub_field('background');
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class');
$section_classes = $padding . ' ' . $bg . ' ' . $section_class;
$container_class = get_sub_field('container_class'); 
?>
<section id="section<?php echo $s; ?>" class="flexible-content alerts-section text-center text-lg-start <?php echo esc_attr($section_classes); ?>">
    <div class="container <?php echo esc_attr($container_class); ?>">
        <div class="row gx-0">
            <div class="col-12">
                <?php if(have_rows('alerts')) : 
                    $i = 0;
                    ?>
                    <div id="carousel<?php echo $s; ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <?php while(have_rows('alerts')) : the_row();
                            $alert_content = get_sub_field('alert_content'); 
                            $i++;?>
                                <div class="carousel-item text-center <?php if($i == 1) { echo 'active';} ?>">
                                    <div class="section-content d-flex align-items-center justify-content-center text-center">
                                        <?php echo $alert_content; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $s; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $s; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div><!-- col-12 --> 
        </div><!-- row -->
    </div> <!-- container -->
</section>