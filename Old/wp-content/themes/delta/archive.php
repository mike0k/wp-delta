<?php
/**
 * The template for Archive.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */

get_header(); ?>

<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class=""> 
				<h1 id="post-<?php the_ID(); ?>"  class="entry-title">
					<?php if ( get_the_title() == '' ) { ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link">No Title</a>
					<?php } else { ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<?php } ?>
				</h1>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	<?php endwhile; ?>
	<?php else : ?>
		<h1>Nothing found</h1>
	<?php endif; ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
