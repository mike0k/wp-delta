<?php
/*
Template Name Posts: Weekly Trade View
*/
?>
<?php 
	get_header(); 
	$postId =  get_the_ID();
	$args = array( 'category'=>4, 'posts_per_page' => 6);
	$posts = get_posts($args); 
?>
<div class="flex_100">
	<div class="flex_25">
		<ul class="qtfMenu">
		<?php
				if(!empty($posts)){
					foreach($posts as $i=>$post){
						setup_postdata($post);
						?>
						<li>
							<a class="qtfSlideBtn <?php if($post->ID==$postId){echo ' active';} ?>" data-slide="<?php echo $post->ID; ?>" href="<?php the_permalink($post->ID); ?>">
								<?php the_title(); ?>
								<br />
								<?php the_field('date', $post->ID);	?>
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
	<div class="flex_75">
		<?php
			$post = get_post($postId);
			setup_postdata($post);
		?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<div class="box">
					<div class="box qtfPost_<?php echo $postId; ?>">
						<?php print_head_image($postId); ?>
						<h4>
							<?php the_title();	?>
							<span style="font-family:'light'; font-weight:normal;">
							<?php 
								if(get_field('sub_header', $post->ID)){
									echo ' | '.get_field('sub_header', $post->ID);
								}
							?>
							<?php 
								if(get_field('date', $post->ID)){
									echo ' | '.get_field('date', $post->ID);
								}
							?>
							</span>
						</h4>
						 <?php the_content(); ?>
					</div>
					<?php 
						print_columns('flex_100', 1, 1, $postId);
						print_columns('flex_50', 2, 3, $postId);
						print_columns('flex_100', 4, 4, $postId);
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>