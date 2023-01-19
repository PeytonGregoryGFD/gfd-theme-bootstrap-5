<div class="social-block btn-group">
    <?php if( get_field('facebook', 'option') ): ?>
    <a class="btn" href="<?php echo the_field('facebook', 'option'); ?>" target="_blank" rel="nofollow" title="Facebook"><i class="fab fa-facebook-f"></i></a>
    <?php endif; ?>
    <?php if( get_field('twitter', 'option') ): ?>
    <a class="btn" href="<?php echo the_field('twitter', 'option'); ?>" target="_blank" rel="nofollow" title="Twitter"><i class="fab fa-twitter"></i></a>
    <?php endif; ?>
    <?php if( get_field('linkedin', 'option') ): ?>
    <a class="btn" href="<?php echo the_field('linkedin', 'option'); ?>" target="_blank" rel="nofollow" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
    <?php endif; ?>
    <?php if( get_field('youtube', 'option') ): ?>
    <a class="btn" href="<?php echo the_field('youtube', 'option'); ?>" target="_blank" rel="nofollow" title="YouTUbe"><i class="fab fa-youtube"></i></a>
    <?php endif; ?>
    <?php if( get_field('instagram', 'option') ): ?>
    <a class="btn" href="<?php echo the_field('instagram', 'option'); ?>" target="_blank" rel="nofollow" title="Instagram"><i class="fab fa-instagram"></i></a>
    <?php endif; ?>
</div>
