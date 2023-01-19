<?php 
global $post;
$id = get_the_ID();
$location_type = get_the_terms( $post->ID, 'location-type');
$map_address = get_field('map_address');
$hours_description = get_field('hours_description');
$type_of_hours = get_field('type_of_hours');
$alteration_hours_description = get_field('alteration_hours_description');
$delivery_url = get_field('delivery_url');
// Social
$location_facebook = get_field('facebook');
$location_twitter = get_field('twitter');
$location_instagram = get_field('instagram');
$location_linkedin = get_field('linkedin');
$location_google = get_field('google');
$location_email = get_field('store_email');
// Alerts
$enable_alert = get_field('enable_location_alert');
$alert_description = get_field('location_alert_description');
$alert_link = get_field('location_alert_link');
// Announcements
$enable_announcement = get_field('enable_announcement');
$announcement_title = get_field('announcement_title');
$announcement_description = get_field('announcement_description');
$announcement_link = get_field('announcement_link');
// Price Table
$pt_title = get_field('pt_title');
$pt_price_call_out = get_field('pt_price_call_out');
$pt_description= get_field('pt_description');
// Hours
$status = get_field('status'); 
$timezone = get_field('timezone'); 
if(!empty($timezone)) {
	$dt = new DateTime("now", new DateTimeZone($timezone));
} else {
	$dt = new DateTime("now", new DateTimeZone('America/New_York'));
}
$alerts = get_field('alerts'); 
if($enable_alert == 'yes') {
if(have_rows('alerts')) : ?>
		<section class="location-alert bg-black text-white py-3 text-center">
			<div class="container">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<div id="carouselAlerts" class="carousel w-100 d-block slide alerts-carousel" data-bs-ride="carousel">
							<div class="carousel-inner">
								<?php $i = 0;
								while (have_rows('alerts')) : the_row();
								    $today = current_time('YmdHi', 'option');
									$start_time = get_sub_field('start_time'); 
									$end_time = get_sub_field('end_time'); 
									$alert_description = get_sub_field('location_alert_description');
									$alert_link = get_sub_field('location_alert_link'); 
									 if(($alert_description) && ($today >= $start_time) && ($today < $end_time)) { ?>
										<div class="carousel-item <?php if($i < 1) { echo 'active';} ?>">
											<div class="alert-description d-block">
												<?php echo $alert_description; ?>
												<?php if(!empty($alert_link)) { ?>
													<a href="<?php echo esc_url($alert_link['url']); ?>" class="text-white location-alert-link text-nowrap"><?php echo esc_html($alert_link['title']); ?></a>
												<?php } ?>
											</div>
										</div>
									<?php } ?>
								<?php $i++;  endwhile; ?>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselAlerts" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselAlerts" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
					</div>
				</div>
			</div>
		</section>
<?php endif;
}
?>
<section class="heading-location-section py-4 bg-light" id="heading">
	<div class="container">
		<div class="row gx-0 align-items-center" >
			<div class="col-12 text-center col-xl-6 offset-xl-3">
				<div class="site-title"><?php echo esc_html(get_bloginfo( 'title')); ?></div>
				<h1 class="post-title"><?php the_title(); ?></h1>
			</div>
			<div class="col-12 col-xl-3 text-center">
				<a href="#" class="btn btn-gray rounded-pill ps-3 btn-create-account text-nowrap mb-3"><img src="<?php echo get_stylesheet_directory_uri( ); ?>/images/icon-account.png" alt="" class="img-fluid icon-account me-2" width="36" height="36">Create an Account</a>
			</div>
		</div>
		<div class="row gx-3">
			<div class="col-12 col-lg-6 order-2">
				<div class="bg-white p-3 border-radius-1 h-100">
					<div class="section-address row gx-3 mb-3">
						<div class="col-auto">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-address.png" width="50" height="50" alt="Logo" class="theme-border no-lazy img-fluid" />
						</div>
						<div class="col">
							<h3 class="mb-3 mb-md-0 mt-2">Address</h3>
							<address class="location-address font-normal mb-0">
							<?php 
										// Get the Address String
										$location = $map_address['address'];
										// Find the first comma and replace it with a break
										$string = strpos($location,',');
										if ($post !== false) {
											$newstring = substr_replace($location,'<br>',$string,strlen(','));
										}
										// Find the "US" at the end of the string
										$us = ', United States';
										// And drop if from the Address
										$trimmedAdd = str_replace($us, '', $newstring);
										// spit it out
										echo $trimmedAdd;
									?>
							</address>
							<?php
							if ( !empty( $map_address ) ) :
								$map_url = 'https://www.google.com/maps/dir/?api=1&destination=' . $map_address['lat'] . ',' . $map_address['lng'];
								echo '<a href="'. esc_url( $map_url ) . '" rel="nooopener" class="link-directions" title="Get Directions with Google Maps" target="_blank">Get directions</a>';
							endif;
							?>
						</div>
					</div><!-- end section -->
					<?php if (!has_term('coming-soon', 'location-type')) { ?>
					<div class="section-hours row gx-3 mb-3">
						<div class="col-auto">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-hours.png" width="50" height="50" alt="Logo" class="theme-border no-lazy img-fluid" />
						</div>
						<div class="col">
							<?php //print_r($location_type);
							 if(($type_of_hours == 'hours')){ ?>			
							<h3 class="mb-3 mb-md-0 mt-2">Hours</h3>
							<div class="location-hours">
									<table class="table table-borderless table-sm">
										<tbody>
		
												<tr>
												<input type="hidden" id="MondayStatus" value="<?php echo get_field('monday_status'); ?>" >
													<td scope="row">Monday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeMonday">
																	<?php echo get_field('monday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeMonday">
																<?php echo get_field('monday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="TuesdayStatus" value="<?php echo get_field('tuesday_status'); ?>" >
													<td scope="row">Tuesday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeTuesday">
																	<?php echo get_field('tuesday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeTuesday">
																<?php echo get_field('tuesday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="WednesdayStatus" value="<?php echo get_field('wednesday_status'); ?>" >
													<td scope="row">Wednesday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeWednesday">
																	<?php echo get_field('wednesday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeWednesday">
																<?php echo get_field('wednesday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="ThursdayStatus" value="<?php echo get_field('thursday_status'); ?>" >
													<td scope="row">Thursday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeThursday">
																	<?php echo get_field('thursday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeThursday">
																<?php echo get_field('thursday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="FridayStatus" value="<?php echo get_field('friday_status'); ?>" >
													<td scope="row">Friday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeFriday">
																	<?php echo get_field('friday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeFriday">
																<?php echo get_field('friday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="SaturdayStatus" value="<?php echo get_field('saturday_status'); ?>" >
													<td scope="row">Saturday</td>
													<td>
														
															<div class="d-flex">
																<div id="openTimeSaturday">
																	<?php echo get_field('saturday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeSaturday">
																<?php echo get_field('saturday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														
													</td>
												</tr>
												<tr>
												<input type="hidden" id="SundayStatus" value="<?php echo get_field('sunday_status'); ?>" >
													<td scope="row">Sunday</td>
													<td>
														<?php if( get_field('sunday_status') == 'open' ){ ?>
															<div class="d-flex">
																<div id="openTimeSunday">
																	<?php echo get_field('sunday_open'); ?>
																</div>
																<span class="me-1">am -</span> 
																<div id="closeTimeSunday">
																<?php echo get_field('sunday_close'); ?>
																</div>
																<span>pm</span>
															</div>
														<?php } else { ?>
															<div class="d-flex">Closed</div>
														<?php } ?>
													</td>
												</tr>

										</tbody>
									</table>
								<?php if(!empty($hours_description)) { ?>
									<div class="hours-description fw-bold">
										<?php echo $hours_description; ?>
									</div>
								<?php } ?>
							</div>
							<?php } else { // if business-hours?>
								<h3 class="mb-3 mb-md-0 mt-2">Open 24/7</h3>
							<?php } ?>
						</div>
					</div><!-- end hours section -->
					<?php } ?>
					<?php
							// Check rows exists.
							if( have_rows('phone_numbers') ): ?>
					<div class="section-phones row gx-3 mb-3">
						<div class="col-auto">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-call.png" width="50" height="50" alt="Logo" class="theme-border no-lazy img-fluid" />
						</div>
						<div class="col">
							<h3 class="mb-3 mb-md-0 mt-2">Call</h3>
							<div class="location-phone">
								<div class="row gx-1 d-flex justify-content-between">
									<?php while( have_rows('phone_numbers') ) : the_row();
										// Load sub field value.
										$label = get_sub_field('label');
										$phone = get_sub_field('phone'); ?>
										<div class="col-12 col-md-auto mb-3 mb-md-0">
											<div class="phone-label d-block text-uppercase fw-light small"><?php echo $label; ?></div>
											<div class="phone-numer d-block text-uppercase fw-bolder"><a class="no-underline text-black fw-bold phone-number-link" href="tel:<?php echo esc_html($phone); ?>"><?php echo $phone; ?></a></div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
							<?php
							// Check rows exists.
							if( have_rows('buttons') ): ?>
							<div class="row">
								<?php while( have_rows('buttons') ) : the_row();
									// Load sub field value.
									$button = get_sub_field('button'); ?>
									<div class="col-auto">
										<a href="<?php echo esc_url($button['url']); ?>" class="btn btn-primary text-nowrap" target="<?php echo esc_attr($button['target']); ?>"><?php echo esc_html($button['title']); ?></a>
									</div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div><!-- end phones section -->
					<?php endif; ?>
					<div class="section-social-media d-flex justify-content-center mt-3">
						<?php if(!empty($location_facebook)) { ?>
							<a target="_blank" href="<?php echo esc_url($location_facebook); ?>" class="social-icon text-black p-1" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
						<?php } ?>
						<?php if(!empty($location_twitter)) { ?>
							<a target="_blank" href="<?php echo esc_url($location_twitter); ?>" class="social-icon text-black p-1" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
						<?php } ?>
						<?php if(!empty($location_instagram)) { ?>
							<a target="_blank" href="<?php echo esc_url($location_instagram); ?>" class="social-icon text-black p-1" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
						<?php } ?>
						<?php if(!empty($location_linkedin)) { ?>
							<a target="_blank" href="<?php echo esc_url($location_linkedin); ?>" class="social-icon text-black p-1" title="Linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
						<?php } ?>
						<?php if(!empty($location_google)) { ?>
							<a target="_blank" href="<?php echo esc_url($location_google); ?>" class="social-icon text-black p-1" title="Google"><i class="fa-brands fa-google"></i></a>
						<?php } ?>
						<?php if(!empty($location_email)) { ?>
							<a target="_blank" href="mailto:<?php echo $location_email; ?>" class="social-icon text-black p-1" title="Email"><i class="fa fa-envelope"></i></a>
						<?php } ?>
					</div><!-- end social section -->
				</div>
			</div>
			<div class="col-12 col-lg-6 order-1 order-lg-3">
				<div class="featured-image position-relative mb-3 mb-lg-0 overflow-hidden border-radius-1">
				<?php// gfd_featured_image('square-600', 'custom-class'); ?>
				<?php if( $map_address ): ?>
					<div class="ratio ratio-1x1">
						<div class="acf-map" data-zoom="16">
							<div class="marker" data-lat="<?php echo esc_attr($map_address['lat']); ?>" data-lng="<?php echo esc_attr($map_address['lng']); ?>"></div>
						</div>
					</div>
				<?php endif; ?>
					<div class="featured-image-overlay d-flex p-3 justify-content-between position-absolute w-100" style="bottom:0;">
					<div class="container-fluid p-0 ">
						<div class="row gx-0 justify-content-between">
							<?php if(!empty($delivery_url)) { ?>
								<div class="col-12 col-sm-auto mb-3 mb-md-0 text-center text-md-start">
									<a href="<?php echo esc_url($delivery_url); ?>" target="_blank" class="btn btn-black p-3" id="btnStartDelivery">Start Delivery</a>
								</div>
							<?php } ?>
							<?php if (!has_term('coming-soon', 'location-type')) { ?>
							<div class="col-12 col-sm-auto text-center mb-3 mb-md-0">
								<div class="location-status bg-white rounded-pill p-3 d-inline-flex align-items-center me-5" id="locationStatus">
									<span class="dot me-2" id="statusDot"></span> 
									<span class="fw-bold" id="status">Open</span>
									<span class="mx-1">•</span>
									<span id="closingTime">
										<?php if($type_of_hours != 'business-hours') { 
											echo '24/7';
										} else {
											echo 'Closes at 5:00pm';
										}?>
									</span>
								</div>
							</div>
							<?php } ?>
						</div>
						</div>	
					</div>
				</div>
			</div>
		</div><!-- row -->
	</div>
</section>
<?php if($enable_announcement == 'yes') { ?>
	<section class="bg-light pt-3 pb-5 announcement" id="locationAnnouncement">
		<div class="container bg-dark text-white position-relative py-3 triangle-bottom-left triangle-bottom-right">
			<div class="row location-announcement  justify-content-center gx-2 align-items-center">
				<div class="col-auto">
					<div class="h4 m-0 text-white"><?php echo $announcement_title; ?></div>
				</div>
				<div class="col-auto">
					<?php echo $announcement_description; ?>
				</div>
				<div class="col-auto">
					<?php if(!empty($announcement_link)) { ?>
						<div class="px-3">
							<a href="<?php echo esc_url($announcement_link['url']); ?>" class="text-white announcement-link"><?php echo esc_html($announcement_link['title']); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<section id="priceTable" class="bg-white text-dark py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-5">
				<div class="section-content">
						<h2 class="price-table-title">
							<?php echo $pt_title; ?> 
							<?php if(!empty($pt_price_call_out)) { ?>
								<span class="price-callout highlight-primary"><?php echo $pt_price_call_out; ?></span>
							<?php } ?>
						</h2>
						<?php if(!empty($pt_description)) { ?>
							<div class="price-table-description mb-4">
								<?php echo $pt_description; ?>
							</div>
						<?php } ?>
				</div>
			</div>
			<div class="col-12 col-lg-7">
				<div class="section-content">
					<div class="row align-content-center d-flex align-items-center">
						<?php
						// Check rows exists.
						if( have_rows('services') ): 
							while( have_rows('services') ) : the_row();
								// Load sub field value.
								$label = get_sub_field('label');
								$price = get_sub_field('price');
								?>
								<div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-6 d-flex justify-content-between text-black mb-3">
									<div class="service-label fw-bold m-0 align-items-center d-flex"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-check-circle.png" alt="" class="img-fluid icon-checkbox me-2"> <?php echo esc_html($label); ?></div>
									<div class="price-number bg-primary p-1 text-black rounded ms-3 mb-0 fw-bold h5"><span class="small dollar-sign">$</span><?php echo esc_html($price); ?></div>
								</div>
							<?php endwhile; 
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if( have_rows('alteration_hours') ): ?>
<section id="alterationHours" class="alteration-hours-section mb-5">
	<div class="container bg-light border-radius-1 square-rotate-light position-relative p-5">
		<div class="row d-flex align-items-center">
			<div class="col-12 col-md-6">
			<?php if(!empty($alteration_hours_description)) { ?>
						<div class="alteration-hours-description px-5 ms-5 ">
							<?php echo $alteration_hours_description; ?>
						</div>
					<?php } ?>
			</div>
			<div class="col-12 col-md-6">
				<div class="alteration-hours border-start ps-5">
					<table class="table table-borderless table-sm mb-0">
						<tbody> 
							<?php	// Loop through rows.
							while( have_rows('alteration_hours') ) : the_row();
								// Load sub field value.
								$day = get_sub_field('day');
								$open_time = get_sub_field('open_time');
								$close_time = get_sub_field('close_time');
								$status = get_sub_field('status');  ?>
								<tr>
								<input type="hidden" id="<?php echo esc_html($day['label']); ?>Status" value="<?php echo $status['label']; ?>" >
									<td scope="row"><div class="fw-bold"><?php echo $day['label']; ?></div></td>
									<td>
										<?php if($status['value'] == 'o') { ?>
											<div class="d-flex">
												<div id="openTime<?php echo esc_html($day['label']); ?>">
													<?php echo $open_time; ?>
												</div>
												<span class="mx-1">-</span> 
												<div id="closeTime<?php echo esc_html($day['label']); ?>">
													<?php echo ' ' . $close_time; ?>
												</div>
											</div>
										<?php } else {
											echo 'Closed';
										} ?>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div><!-- location-hours -->
			</div><!-- col-12 -->
		</div>
	</div>
</section>
<?php endif; ?>
	<?php if($type_of_hours == 'hours') { ?>
	<input type="hidden" id="today" value="<?php echo date('w'); ?>" >
	<input type="hidden" id="time" value="<?php echo $dt->format('H:i'); ?>" >
	<script>
		(function($) {
			$(document).ready(function(){
				var today = $('#today').val();
				var currentTime = $('#time').val();

				var MondayOpen = $('#openTimeMonday').html();
				var TuesdayOpen = $('#openTimeTuesday').html();
				var WednesdayOpen = $('#openTimeWednesday').html();
				var ThursdayOpen = $('#openTimeThursday').html();
				var FridayOpen = $('#openTimeFriday').html();
				var SaturdayOpen = $('#openTimeSaturday').html();
				var SundayOpen = $('#openTimeSunday').html();

				var MondayClose = parseFloat($('#closeTimeMonday').html());
				var TuesdayClose = parseFloat($('#closeTimeTuesday').html());
				var WednesdayClose = parseFloat($('#closeTimeWednesday').html());
				var ThursdayClose = parseFloat($('#closeTimeThursday').html());
				var FridayClose = parseFloat($('#closeTimeFriday').html());
				var SaturdayClose = parseFloat($('#closeTimeSaturday').html());
				var SundayClose = parseFloat($('#closeTimeSunday').html());

				var closePrefix = 'Closes at ';
				var closeSuffix = 'pm';

				var openPrefix = 'Opens at ';
				var openSuffix = 'am';

				var Monday = closePrefix + MondayClose + closeSuffix;
				var Tuesday = closePrefix + TuesdayClose + closeSuffix;
				var Wednesday = closePrefix + WednesdayClose + closeSuffix;
				var Thursday = closePrefix + ThursdayClose + closeSuffix;
				var Friday = closePrefix + FridayClose + closeSuffix;
				var Saturday = closePrefix + SaturdayClose + closeSuffix;
				var Sunday = closePrefix + SundayClose + closeSuffix;

				var oMonday = openPrefix + MondayOpen + openSuffix;
				var oTuesday = openPrefix + TuesdayOpen + openSuffix;
				var oWednesday = openPrefix + WednesdayOpen + openSuffix;
				var oThursday = openPrefix + ThursdayOpen + openSuffix;
				var oFriday = openPrefix + FridayOpen + openSuffix;
				var oSaturday = openPrefix + SaturdayOpen + openSuffix;
				var oSunday = openPrefix + SundayOpen + openSuffix;

					if(today == 1) { // Monday
						var close = MondayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#MondayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oTuesday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Monday);
						}
					}
					if(today == 2) { // Tuesday
						var close = TuesdayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#TuesdayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oWednesday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Tuesday);
						}
					}
					if(today == 3) { // Wednesday
						var close = WednesdayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#WednesdayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oThursday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Wednesday);
						}
					}
					if(today == 4) { // Thursday
						var close = ThursdayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#ThursdayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oFriday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Thursday);
						}
					}
					if(today == 5) { // Friday
						var close = FridayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#FridaydayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oSaturday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Friday);
						}
					}
					if(today == 6) { // Saturday
						var close = SaturdayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#SaturdayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
							$('#status').html('Closed');
							$('#statusDot').css("background-color","red");
							$('#closingTime').html(oSunday);
						} else {
							$('#status').html('Open');
							$('#closingTime').html(Saturday);
						}
					}
					if(today == 7) { // Sunday
						var close = SundayClose + 12;
						var time = parseFloat(currentTime);
						var currentStatus = $('#SundayStatus').val();
						if((currentStatus == 'c') || (time > close)) {
								$('#status').html('Closed');
								$('#statusDot').css("background-color","red");
								$('#closingTime').html(oMonday);
							} else {
								$('#status').html('Open');
								$('#closingTime').html(Sunday);
						}
					}
			});
		})(jQuery);
	</script>
<?php } ?>