<?php
/*
Template Name: Columns: x4 – x1
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
					print_columns('flex_25', 1, 4);
					print_box(5);
					wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); 
				?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>