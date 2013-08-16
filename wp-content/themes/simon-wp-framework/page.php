<?php 
/**
 * The template for displaying Single Page.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
 get_header(); ?>

<div class="flex_100">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
		<?php
			if(get_field('featured_image')){
				$image = get_field('featured_image');
				echo '
					<div class="flex_100 ">
						<div class="featuredImage" style="background: url('.$image["url"].') center center no-repeat; background-size:cover;"></div>
					</div>
				';
			}
		?>
      <?php the_content(); ?>
	  <?php
		if(get_field('map_coodinates')){
				$coords = get_field('map_coodinates');
		?>
			<script>
				var map;
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
					var marker = new google.maps.Marker({
					position: mapOptions['center'],
					map: map,
					});
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			<div class="flex_100">
				<div class="box">
					<div id='googleMap'></div>
				</div>
				<div class='clear'></div>
			</div>
		<?php	}  ?>
      <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>