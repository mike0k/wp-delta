<?php
/*
Single Post Template: Staff
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="flex_100">
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
