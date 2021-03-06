<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>
<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php 
					print_head_image();
					the_content(); 
					print_columns('flex_25', 1, 4);
					?>
					<div class="box">
						<div class="strike"></div>
					</div>
					<?
					if(get_field('map_coodinates')){
						$coords = get_field('map_coodinates');
						$mapInfo = get_field('map_marker_info');
						?>
							<script>
								var map;
								var mapInfo = '<?php echo str_replace("#", "<br>", $mapInfo); ?>';
								function initialize() {
									var mapOptions = {
										zoom: 16,
										center: new google.maps.LatLng(<?php echo $coords; ?>),
										disableDefaultUI: true,
										panControl: false,
										zoomControl: true,
										scaleControl: false,
										mapTypeId: google.maps.MapTypeId.ROADMAP
									};
									map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
									
									
									var contentString = "<div class='gMapContent' style='overflow: hidden;'>"+mapInfo+"</div>";

 
									var infowindow = new google.maps.InfoWindow({
										content: contentString
									});

									console.log(contentString);
									
									var infowindow = new google.maps.InfoWindow({
										content: contentString
									});

									
									var marker = new google.maps.Marker({
										position: mapOptions['center'],
										title: 'Delta Economics',
										map: map,
									});
									
									google.maps.event.addListener(marker, 'click', function() {
									  infowindow.open(map,marker);
									});
								}
								google.maps.event.addDomListener(window, 'load', initialize);
							</script>
							<div class="flex_100">
								<div class="box googleMap">
									<div id='googleMap' style="height:480px;"></div>
								</div>
								<div class='clear'></div>
							</div>
						<?php	
					}
					
					wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); 
				?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>