<?php
/*
Template Name: Columns: x1 – x4 - x1
*/
?>
<?php get_header(); ?>

<style type="text/css">
	.goCompare table { border-top: 1px solid #0B1E60; }
	.goCompare table thead tr td { color: #0B1E60; font-family: 'bold',Helvetica,sans-serif; font-weight: normal; font-size: 14px; line-height: 14px;}
	.goCompare table tbody tr { border-top: 1px solid #BBBBBB; }
</style>


<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry goCompare">
				<?php 
					print_head_image();
					the_content(); 
					print_box(1);
					print_columns('flex_25', 2, 5);
					print_box(6);
					wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); 
				?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>