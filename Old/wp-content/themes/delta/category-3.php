<?php
	//Category: Webcasts
	get_header(); 
	$postCount = 0;
?>
<div class="flex_100">
	 <?php 
		if(category_description()){
			echo category_description();
		}
	?> 
</div>
<div class="flex_100 webcastList">
	<?php if (have_posts()) : while (have_posts() && $postcount<=6) : the_post();?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="webcast">
				<div class="flex_50 description"> 
					<div class="box">
						<h4 class="entry-title">
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
							<?php echo $title; ?>
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
				<div class="flex_50 description"> 
					<div class="box">
						<h4 i class="entry-title"> Delta Economics<span style="font-weight:normal;"> | Webcast | Coming Soon</span></h4>
						<div class="entry">
							<p>New bi-weekly Webcasts uploading soon.</p>
						</div>
					</div>
				</div>
				<div class="flex_50 video"> 
					<div class="videoBox"> 
						<div class="empty">
							<img src="<?php bloginfo('template_directory'); ?>/images/delta_logo.jpg" style="display:block; height:50px;" />
							<h4 i class="entry-title borderTop" style="display:inline-block;"> Delta Economics<span style="font-weight:normal;"> | Webcast | Coming Soon</span></h4>
						</div>
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
	
	<?php else : ?>
		<p>No webcasts currently available.</p>
<?php endif; ?>
	
	<div>
		<div class="flex_50"> 
			<div class="box">
				<h4>Looking for more?</h4>
				<p>For archived content please contact our analytical team.</p>
			</div>
			<div class="subBox">
				<a href="<?php echo get_permalink(14); ?>">Contact us | <span class="clickHere">Click here</span></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
