<?php
get_header(); ?>

<div class="flex_100 staffList">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="flex_75"> 
				<div class="box">
						<h4 id="post-<?php the_ID(); ?>"  class="entry-title">
							<?php if(get_field('name') && get_field('job_title')){ ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php echo get_field('name'); ?> 
									<span style="font-weight:normal;">| <?php echo get_field('job_title'); ?></span>
								</a>
							<?php }elseif( get_field('name')){ ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_field('name'); ?></a>
							<?php }elseif ( get_the_title() == '' ) { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link">Staff Member</a>
							<?php } else { ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
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
	<?php endwhile; ?>
		<?php get_template_part( '/inc/nav' );?>
	<?php else : ?>
		<h1>Nothing found</h1>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
