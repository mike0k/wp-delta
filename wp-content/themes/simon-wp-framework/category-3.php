<?php
	get_header(); 
	$postCount = 0;
?>

<div class="flex_100 webcastList">
	<?php if (have_posts()) : while (have_posts() && $postcount<=6) : the_post();?>
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
	<?php 
		$postCount = $postCount+1;
		endwhile;
	?>
	
	<?php 
		if($postCount<6){  
			while($postCount<=6){
	?>
		<div <?php post_class() ?>>
			<div class="webcast">
				<div class="flex_50"> 
					<h4 i class="entry-title"> Delta Economics<span style="font-weight:normal;"> | Webcast | Coming Soon</span></h4>
					<div class="entry">
						<p>New bi-weekly webcats uploading soon.</p>
					</div>
				</div>
				<div class="flex_50 video"> 
					<div class="videoBox"> 
						<img src="<?php bloginfo('template_directory'); ?>/images/delta_logo.jpg" style="display:block; height:72px;" />
						<h4 i class="entry-title borderTop" style="display:inline-block;"> Delta Economics<span style="font-weight:normal;"> | Webcast | Coming Soon</span></h4>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<?php 
				$postCount = $postCount+1;
			}
		} 
	?>
	
	<?php get_template_part( '/inc/nav' );?>
	<?php else : ?>
		<h1>Nothing found</h1>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
