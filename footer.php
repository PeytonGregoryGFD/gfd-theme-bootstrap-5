
<footer class="w-100 bg-white text-dark pt-5 text-center text-md-start" id="siteFooter">
	<div class="container">
		<div class="row">
			<?php if(is_active_sidebar('footer-1')) {
				echo '<div class="col-12 col-md-auto mb-3">';
					dynamic_sidebar ('footer-1'); 
				echo '</div>';
			} ?>
			<?php if(is_active_sidebar('footer-2')) {
				echo '<div class="col-12 col-md-auto mb-3">';
					dynamic_sidebar ('footer-2'); 
				echo '</div>';
			} ?>
			<?php if(is_active_sidebar('footer-3')) {
				echo '<div class="col-12 col-md-auto mb-3">';
					dynamic_sidebar ('footer-3'); 
				echo '</div>';
			} ?>
			<?php if(is_active_sidebar('footer-4')) {
				echo '<div class="col-12 col-md-auto mb-3">';
					dynamic_sidebar ('footer-4'); 
				echo '</div>';
			} ?>
			<?php if(is_active_sidebar('footer-5')) {
				echo '<div class="col-12 col-md-auto mb-3">';
					dynamic_sidebar ('footer-5'); 
				echo '</div>';
			} ?>
		</div> 
		<div class="row flex-row align-items-center small justify-content-between">
			<div class="col-12 pt-5 pb-3 text-center copyright small">
				<?php echo '©'. do_shortcode('[year]'); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved. <span class="site-credits text-nowrap "> Site by <a style="color:#676767;" href="https://gofishdigital.com/" target="_blank" title="Visit Go Fish Digital's Website">Go Fish</a>.</span>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>