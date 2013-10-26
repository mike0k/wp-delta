<?php
/*
Template Name Posts: Staff Member
*/
$postId =  get_the_ID();
header('Location: http://demo.deltaeconomics.com/category/our-team/#post-'.$postId);
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="flex_100">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="flex_75"> 
				<div class="box">
						<h4 id="post-<?php the_ID(); ?>"  class="entry-title">
							<?php if(get_field('name') && get_field('job_title')){ ?>
									<?php echo get_field('name'); ?> 
									<span style="font-weight:normal;">| <?php echo get_field('job_title'); ?></span>
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
							<p>email | <span style="color:#c3c3c3;"><?php echo get_field('email'); ?></span></p>
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

<?php endwhile; endif; ?>
<?php get_footer(); ?>
