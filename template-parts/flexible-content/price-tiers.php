<?php extract( $args ); 
$content = get_sub_field('content'); 
$background_image = get_sub_field('background_image'); 
$bg_image = '';
if($background_image) { 
    $bg_image = 'style="background-image:url(' . esc_url($background_image['url']) . '); background-size:cover;"';
}
$background_color = get_sub_field('background_color'); 
$text_color = get_sub_field('text_color'); 
$vertical_alignment = get_sub_field('vertical_alignment'); 
$padding = get_sub_field('padding');
$section_class = get_sub_field('section_class') . ' ' . $bg . ' ' . $padding;
$container_class = get_sub_field('container_class'); 
$column_class = get_sub_field('column_class'); 

// Pricing Only Fields
$sub_content = get_sub_field('sub_content'); 
?>
<section id="section<?php echo $s; ?>" class="flexible-content price-tiers-section <?php echo esc_attr($section_class); ?>" <?php echo $bg_image; ?>>
    <div class="container <?php echo esc_attr($container_class); ?>">
        <div class="row <?php echo esc_attr($vertical_alignment); ?>">
            
            <div class="<?php echo esc_attr($column_class ?: 'col'); ?>">
                <div class="section-content pre-section-content">
                    <?php echo $content; ?>
                </div>       
            </div>

            <!-- payment toggle switch -->
            <div class="col-12">
                <div class="select-price d-flex justify-content-center mb-5">
                    <div class="h3 text-info mb-md-0">Pay Annually</div>
                    <label class="switch mx-5">
                        <input type="checkbox" id="priceToggle">
                        <span class="slider round"></span>
                    </label>
                    <div class="h3 text-info mb-md-0">Pay Monthly</div>
                </div>
                <?php // jQuery for toggle switch ~/assets/js/custom-scripts.js ?>
            </div>

            <div class="<?php echo esc_attr($column_class ?: 'col'); ?>">
                <div class="section-content sub-section-content text-gray-600">
                    <?php echo $sub_content; ?>
                </div>       
            </div>

            <?php
            // Check for price tiers
            if( have_rows('price_tiers') ): ?>
                <div class="row gx-5">
                    <?php while( have_rows('price_tiers') ) : the_row();
                        // Price Tier Column Vars
                        $heading = get_sub_field('heading');
                        $annual_price = get_sub_field('annual_price');
                        $monthly_price = get_sub_field('monthly_price');
                        $features = get_sub_field('features');
                        $column_class = get_sub_field('column_class');
                        ?>
                        <div class="<?php echo esc_attr($column_class ?: 'col'); ?>">
                            <div class="card bg-light border-radius-4 border-0 headings-match-paragraphs text-white">
                                <div class="card-body">
                                    <div class="card-heading section-content mb-0 ">
                                        <?php echo $heading; ?>
                                    </div>
                                    <div class="card-price mb-5">
                                        <div class="card-price-annual text-secondary h4 mb-md-0"><?php echo $annual_price; ?></div>
                                        <div class="card-price-monthly text-secondary h4 mb-md-0 d-none"><?php echo $monthly_price; ?></div>
                                        <?php // jQuery for toggle switch ~/assets/js/custom-scripts.js ?>
                                    </div>
                                    <div class="card-features mt-5 text-dark">
                                    <?php echo $features; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div> 
</section>
<script defer src="<?php echo get_stylesheet_directory_uri() . '/assets/js/flexible-content-price-tiers.js'; ?>"></script>