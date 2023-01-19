<?php extract( $args ); 
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
    }?>
<section id="section<?php echo $s; ?>"  class="flexible-content stats-section <?php echo esc_attr($bg . ' ' . $padding . ' ' . $section_class . ' ' . $bg_image); ?>">
   <div class="container card bg-white border-0 shadow  <?php if($container_class) { echo esc_attr($container_class);}  ?>">
		<?php if( have_rows('stats') ): ?> 
        <div id="stats" class="p-3">
            <div id="counter" class="row phone-wrap">
				<?php while ( have_rows( 'stats' ) ): the_row();
					$number = preg_replace( '/[^0-9.]+/', '', get_sub_field( 'number' ) );
					$suffix = get_sub_field( 'suffix' );
					$text = get_sub_field( 'text' ); 
					$not_number = get_sub_field( 'not_number' );
					$size = 'thumbnail'; 
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ]; ?>
                    <div class="col mb-5 py-3 mb-lg-0 <?php if( $image ){ ?> flex-row flex-center<?php } ?>">
						<div class="stat center">
							<div class="large-number flex-row-center text-black header-font fw-bold d-flex justify-content-center mb-3">
								<div <?php if(!$not_number) { echo 'class="number fw-bold"'; } ?> data-final="<?php echo get_sub_field( 'number' ); ?>"
									 data-count="<?php echo $number; ?>"><?php if($not_number) { the_sub_field( 'number' ); } else { echo '1'; } ?>
								</div>
                                <?php if(!empty($suffix)) { ?>
								    <div class="ms-2 suffix"> <?php echo $suffix; ?></div>
                                <?php } ?>
							</div>
							<div class="stat-text px-5"><?php echo $text; ?></div>
						</div>
                    </div>
				<?php endwhile; ?>
            </div>
        </div>

        <script>
            //Counter
            var a = 0;
            jQuery(function ($) {
                $(window).bind('scroll load', function () {

                    var oTop = $('#counter').offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() >= oTop) {
                        $('.number').each(function () {
                            var $this = $(this),
                                countTo = $this.attr('data-count'),
                                finalCount = $this.attr('data-final');
                            $({
                                countNum: $this.text()
                            }).animate({
                                    countNum: countTo
                                },

                                {

                                    duration: 400,
                                    easing: 'swing',
                                    step: function () {
                                        $this.text(Math.floor(this.countNum));
                                    },
                                    complete: function () {
                                        $this.text(finalCount);
                                        //alert('finished');
                                    }

                                });
                        });
                        a = 1;
                    }

                });
            });</script>
	<?php endif; ?>
	</div>
</section>