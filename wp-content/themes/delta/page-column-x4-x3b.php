<?php
/*
Template Name: Columns: x4 – x3b
*/
?>
<?php get_header(); ?>
<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php 
					print_head_image();
					the_content(); 
					print_columns('flex_100', 1, 4);
				?>
				<div class="clear"></div>
				<div class="cols">
					<div class="flex_25">
						<?php if(get_field('box_5')){ ?>
							<div class="box">
								<?php echo get_field("box_5"); ?>
								<div class="clear"></div>
							</div>
							<?php if(get_field('sub_box_5')){ ?>
								<div class="subBox">
									<?php echo get_field("sub_box_5"); ?>
									<div class="clear"></div>
								</div>
							<?php 
							}
						} ?>
					</div>
					<div class="flex_25">
						<?php if(get_field('box_6')){ ?>
							<div class="box">
								<?php echo get_field("box_6"); ?>
								<div class="clear"></div>
							</div>
							<?php if(get_field('sub_box_6')){ ?>
								<div class="subBox">
									<?php echo get_field("sub_box_6"); ?>
									<div class="clear"></div>
								</div>
							<?php 
							}
						} ?>
					</div>
					<div class="flex_50">
						<?php if(get_field('box_7')){ ?>
							<div class="box">
								<?php echo get_field("box_7"); ?>
								<div class="clear"></div>
							</div>
							<?php if(get_field('sub_box_7')){ ?>
								<div class="subBox">
									<?php echo get_field("sub_box_7"); ?>
									<div class="clear"></div>
								</div>
							<?php 
							}
						} ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>