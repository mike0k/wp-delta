<?php
/*
Template Name Posts: Quarterly Trade Forecasts
*/
?>
<?php 
	get_header(); 
	$postId =  get_the_ID();
?>
<div class="flex_100">
	<div class="flex_25">
		<ul class="qtfMenu">
		<?php
			$args = array( 'category'=>5, 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
			$posts = get_posts($args); 
			if(!empty($posts)){
				foreach($posts as $post){
					$active = '';
					if($post->ID==$postId){
						$active= ' active ';
					}
					?>
					<li>
						<a class="<?php echo $active; ?>" href="<?php the_permalink($post->ID); ?>">
							<?php the_field('location', $post->ID);	?>
							<br />
							Read More | Click here
						</a>
					</li>
					<?php
				}
			}
		?>
		</ul>	
		<div class="box">
			<h4>Looking for more?</h4>
			<p class="bottomSpacing">For archived content please contact our analytical team.</p>
			<a href="<?php echo get_permalink(14); ?>">Contact us | Click here</a>
		</div>
	</div>
	<div class="flex_75 qtfPosts">
		<?php
			$post = get_post($postId);
			setup_postdata($post);
		?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<div class="box">
					<?php print_head_image();?>
					<h4>
						<?php the_field('location');	?> | <?php the_field('date');	?>
						<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
					</h4>
					<?php 
						the_content(); 
						wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); 
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>