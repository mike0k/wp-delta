<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div class="flex_100">
	<?php 
		if (have_posts()) : while (have_posts()) : the_post(); 
		$postId = get_the_ID();
	?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				
				<?php 
					$slides = array();
					for($i=0; $i<=6; $i++){
						if(get_field('slide_'.$i)){
							$image = get_field('slide_'.$i);
							$slides[] = $image['url'];
						}
					}
					if(!empty($slides)){
				?>
					<div class="flex_100">
						<div class="box">
							<div class="slider">
								<div class="slides">
									<?php foreach($slides as $slide){ ?>
										<div class="slide" style="background: url(<?php echo $slide; ?>) center center no-repeat; background-size:cover;"></div>
									<?php } ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<script>
						jQuery(document).ready(function($) { 
							$('.slides').cycle({ 
								fx: 'scrollLeft' 
							}); 
						})
					</script>
				<?php }else{
					print_head_image();
				}?>
				<?php the_content(); 	?>
				
				<div class="cols">
					<div class="flex_50">
						<?php if(get_field('box_1', $postId)){ ?>
							<div class="box homeBox1">
								<?php echo get_field("box_1", $postId); ?>
								<div class="clear"></div>
							</div>
							<?php if(get_field('sub_box_1', $postId)){ ?>
								<div class="subBox">
									<?php echo get_field("sub_box_1", $postId); ?>
									<div class="clear"></div>
								</div>
							<?php 
							}
						} ?>
					</div>
					<div class="flex_50">
						<div class="box">
							<?php 
								$args = array( 'category'=>3, 'posts_per_page' => 1);
								$posts = get_posts($args);  
								if(!empty($posts)){
									foreach($posts as $post){
										if(get_field('video_embed', $post->ID)){
											echo get_field('video_embed', $post->ID);
										}
									}
								}
							?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				
				<?php print_columns('flex_25', 2, 5, $postId); ?>
				
				<div class="cols">
					<div class="flex_75">
						<?php if(get_field('box_6', $postId)){ ?>
							<div class="box homeBox6">
								<?php echo get_field("box_6", $postId); ?>
								<div class="clear"></div>
							</div>
							<?php if(get_field('sub_box_6', $postId)){ ?>
								<div class="subBox">
									<?php echo get_field("sub_box_6", $postId); ?>
									<div class="clear"></div>
								</div>
							<?php 
							}
						} ?>
					</div>
					<div class="flex_25">
						<div class="boxAlign">
							<h4>Weekly Trade Views</h4>
						</div>
						<?php 
							$args = array( 'category'=>4, 'posts_per_page' => 6);
							$posts = get_posts($args);  
							if(!empty($posts)){
								foreach($posts as $post){
									setup_postdata($post);
									?>
									<div class="box">
										<?php the_title(); ?>
										<br />
										<?php the_field('date', $post->ID);	?>
										<br />
										<a href="<?php the_permalink($post->ID); ?>">
											<span class="readMore">Read More | <span class="clickHere">Click here</span></span>
										</a>
									</div>
									<?php
								}
							}
						?>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="cols">
					<div class="flex_75">
						<?php print_box(7,$postId); ?>
					</div>
					<div class="flex_25">
						<?php print_box(8,$postId); ?>
					</div>
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>