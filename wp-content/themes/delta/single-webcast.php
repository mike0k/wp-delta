<?php
/*
Template Name Posts: Webcast
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="flex_100">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="webcast">
				<div class="flex_50 description"> 
					<div class="box">
						<h4 id="post-<?php the_ID(); ?>"  class="entry-title">
							<?php
								$title = '';
								for($i=1; $i<=3; $i++){
									if(get_field('title_part_'.$i)){
										if(empty($title)){
											$title = get_field('title_part_'.$i);
										}else{
											$title .= '<span style="font-weight:normal;"> | '.get_field('title_part_'.$i).'</span>';
										}
									}
								}
							?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php echo $title; ?>
							</a>
						</h4>
						<div class="entry">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="flex_50 video">
					<div class="videoBox"> 
						<?php
							if(get_field('video_embed')){
								echo get_field('video_embed');
							}
						?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
