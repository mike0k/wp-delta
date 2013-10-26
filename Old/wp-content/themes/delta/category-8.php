<?php
	//Category: Our Team
	get_header(); 
?>
<div class="flex_100">
	 <?php 
		if(category_description()){
			echo category_description();
		}
	?> 
</div>
<div class="flex_100 staffList">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="box">
				<div class="flex_75"> 
					<div class="staffInfo">
							<h4 class="entry-title">
								<?php if(get_field('name') && get_field('job_title')){ ?>
										<?php echo get_field('name'); ?> 
										<span class="jobTitle">| <?php echo get_field('job_title'); ?></span>
								<?php }elseif( get_field('name')){ ?>
									<?php echo get_field('name'); ?>
								<?php }elseif ( get_the_title() == '' ) { ?>
									Staff Member
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h4>
						<div class="entry">
							<?php the_content(); ?>
							<?php if( get_field('name')){ ?>
								<p><a href="mailto:<?php echo get_field('email'); ?>">email | <span class="clickHere"><?php echo get_field('email'); ?></span></a></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="flex_25 photo"> 
					<?php
						if(get_field('photo')){
							$image = get_field('photo');
							echo '<img src="'.$image['url'].'" />';
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<h1>Nothing found</h1>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
