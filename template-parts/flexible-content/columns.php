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
$section_class = get_sub_field('section_class');
$container_class = get_sub_field('container_class'); 
$content_class = get_sub_field('content_class'); 
$column_class = get_sub_field('column_class'); 
$columns_class = get_sub_field('columns_class'); 
?>
<section id="section<?php echo $s; ?>" class="flexible-content columns-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class ); ?>" <?php echo $bg_image; ?>>
    <div class="container <?php if($container_class) { echo esc_attr($container_class);} ?>">
        <div class="row">
            <div class="<?php echo esc_attr($column_class); ?>">
                <?php if(!empty($content)) { ?>
                    <div class="section-content">
                        <?php echo $content; ?>
                    </div>       
                 <?php } ?>
            </div>
        </div>
        <?php if( have_rows('columns') ): ?>
            <div class="row <?php echo esc_attr($alignment); ?>">
                <?php while( have_rows('columns') ) : the_row(); 
                    $column = get_sub_field('column'); ?>
                    <div class="<?php echo esc_attr( $columns_class ); ?>">
                        <div class="column-content">
                            <?php echo $column; ?>
                        </div>       
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div> 
</section>