<?php
/*
Template Name Posts: Weekly Trade View
*/
?>
<?php 
	get_header(); 
	$postId =  get_the_ID();
	$args = array( 'category'=>4, 'posts_per_page' => 6);
	$posts = get_posts($args); 
?>
<div class="flex_100">
	<div class="flex_25">
		<ul class="qtfMenu">
		<?php
				if(!empty($posts)){
					foreach($posts as $i=>$post){
						setup_postdata($post);
						?>
						<li>
							<a class="qtfSlideBtn <?php if($post->ID==$postId){echo ' active';} ?>" data-slide="<?php echo $post->ID; ?>" href="<?php the_permalink($post->ID); ?>">
								<?php the_title(); ?>
								<br />
								<?php the_field('date', $post->ID);	?>
								<br />
								<span class="readMore">Read more | <span class="clickHere">Click here</span></span>
							</a>
						</li>
						<?php
					}
				}
			?>
		</ul>	
		<div class="box">
			<h4>Looking for more?</h4>
			<p class="bottomSpacing">For archived content please contact our analytical team.</p>
			<a href="<?php echo get_permalink(14); ?>">Contact us | <span class="clickHere">Click here</span></a>
		</div>
	</div>
	<div class="flex_75">
		<?php
			$post = get_post($postId);
			setup_postdata($post);
		?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<div class="box">
					<div class="box noSidePadding qtfPost_<?php echo $postId; ?>">
						<?php print_head_image($postId); ?>
						<h4>
							<?php the_title();	?>
							<span style="font-family:'light'; font-weight:normal;">
							<?php 
								if(get_field('sub_header', $post->ID)){
									echo ' | '.get_field('sub_header', $post->ID);
								}
							?>
							<?php 
								if(get_field('date', $post->ID)){
									echo ' | '.get_field('date', $post->ID);
								}
							?>
							</span>
							<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
                           <?php /*?> <div class="printfriendly pf-alignright">
                            <?php
								if(get_field('pdf_file', $post->ID)){
							?>
                            	<a rel="nofollow" target="_blank" href="<?=get_field('pdf_file', $post->ID)?>">
                            		<img alt="Open PDF" src="/wp-content/themes/delta/images/pdfIcon.jpg">
                                </a>
                                <a rel="nofollow" target="_blank" href="mailto:?subject=Delta Economics: <?= the_title(); ?>&body=%0A%0A%0A%0A<?=get_field('pdf_file', $post->ID)?>">
                            		<img alt="Email PDF" src="/wp-content/themes/delta/images/emailIcon.jpg">
                                </a>
                             <?php
								}
							 ?>
                            </div><?php */?>
						</h4>
						 <?php the_content(); ?>
					</div>
					<?php print_columns('flex_100', 1, 1, $post->ID); ?>
					<div class="cols">
						<div class="flex_66">
							<?php print_box(2, $post->ID); ?>
						</div>
						<div class="flex_33">
							<?php print_box(3, $post->ID); ?>
						</div>
						<div class="clear"></div>
					</div>
					<?php print_columns('flex_100', 4, 4, $post->ID); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>