<?php 
/**
 * The template for displaying Single Page.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
 get_header(); ?>

<div class="flex_100">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
		<?php
			if(get_field('featured_image')){
				$image = get_field('featured_image');
				echo '
					<div class="flex_100 ">
						<div class="featuredImage" style="background: url('.$image["url"].') center center no-repeat; background-size:cover;"></div>
					</div>
				';
			}
		?>
      <?php the_content(); ?>
      <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
    </div>
  </div>
</div>
<?php endwhile; endif; ?>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
