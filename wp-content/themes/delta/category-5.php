<?php
	//Category: Quarterly Trade Forecasts
	get_header(); 
	
	$args = array( 'category'=>5, 'posts_per_page' => 7, 'orderby'=> 'title', 'order' => 'ASC' );
	$posts = get_posts($args); 
?>
<div class="flex_100">
	<div class="box">
		 <?php 
			if(category_description()){
				echo category_description();
			}
		?> 
	</div>
</div>
<div class="flex_100">
	<div class="flex_25">
		<ul class="qtfMenu">
			<?php
				if(!empty($posts)){
					foreach($posts as $i=>$post){
						?>
						<li>
							<a class="qtfSlideBtn <?php if($i==0){echo ' active';} ?>" data-slide="<?php echo $post->ID; ?>" href="<?php the_permalink($post->ID); ?>">
								<?php the_field('location', $post->ID);	?>
								<br />
								<span class="readMore">Read More | <span class="clickHere">Click here</span></span>
							</a>
						</li>
						<?php
					}
				}
			?>
		</ul>	
		<div class="box">
			<h4>Looking for more?</h4>
			<p>For archived content please contact our analytical team.</p>
			<a href="<?php echo get_permalink(14); ?>">Contact us | <span class="clickHere">Click here</span></a>
		</div>
	</div>
	<div class="flex_75 qtfPosts">	
		<?php
				if(!empty($posts)){
					foreach($posts as $i=>$post){
						setup_postdata($post);
						?>
						<div class="box qtfPost_<?php echo $post->ID; ?>" <?php if($i!=0){echo ' style="display:none;" ';} ?>>
							<?php print_head_image($post->ID); ?>
							<h4><?php the_field('location', $post->ID);	?> | <?php the_field('date', $post->ID);	?></h4>
							<?php the_content(); ?>
						</div>
						<?php
					}
				}
			?>
			<script>
				jQuery(function(){
					jQuery('.qtfSlideBtn').click(function(e){
						e.preventDefault();
						var id = jQuery(this).data('slide');
						jQuery('.qtfPosts .box').hide();
						jQuery('.qtfPost_'+id).fadeIn('slow');
						jQuery('.qtfSlideBtn').removeClass('active');
						jQuery(this).addClass('active');
					});
				});
			</script>
	</div>
</div>
<?php get_footer(); ?>