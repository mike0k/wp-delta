<?php
/**
 * The template for displaying Index.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */

get_header(); ?>

<div class="flex_100">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<div class="box">
    <?php
/*
 * Pull in a different sub-template, depending on the Post Format.
 * 
 * Make sure that there is a default '<tt>format.php</tt>' file to fall back to
 * as a default. Name templates '<tt>format-link.php</tt>', '<tt>format-aside.php</tt>', etc.
 *
 * You should use this in the loop.
 */

		$format = get_post_format();
		get_template_part( 'format', $format );
	?>

		<div class="clear"></div>
	</div>
  </div>
  <?php endwhile; ?>
  <?php get_template_part( '/inc/nav' );?>
  <?php else : ?>
  <h2>Not Found</h2>
  <?php endif; ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>





<div class="cols">
	[insert_php]
		for($i=1; $i<=2; $i++){
		if(get_field('box_'.$i)){
			echo '
				<div class="flex_25 ">
					<div class="box">
						'.get_field("top_box_".$i).'
					</div>
				</div>
				';
			}
		}
	[/insert_php]
	<div class="clear"></div>
</div>
<div>
	[insert_php]
		for($i=3; $i<=6; $i++){
			if(get_field('bottom_box_'.$i)){
				$style = '';
				if($i==2){
					$style=' style="text-align:right;" ';
				}
				echo '
					<div class="flex_50">
						<div class="box" '.$style.'>
							'.get_field("bottom_box_".$i).'
						</div>
					</div>
				';
			}
		}
	[/insert_php]
</div>