<?php 
/*
Template Name: Sitemap
*/
 get_header(); ?>
<!-- SITEMAP CONTENT REPLACE POINT -->
<div class="flex_100">
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
		<div class="box">
		<ul id="sitemap_list" class="sitemap_disp_level_0">
			<li class="home-item"><a href="http://demo.deltaeconomics.com" title="Delta Economics">Delta Economics</a></li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/about/">About</a>
				<ul>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/our-approach/">Our Approach</a></li>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/category/our-team/">Our Team</a>
						<?php
							$args = array( 'category'=>8, 'posts_per_page'=>-1);
							$posts = get_posts($args); 
							if(!empty($posts)){
								echo'<ul>';
								foreach($posts as $post){
									setup_postdata($post);
									
									echo '<li class="page_item"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
								
								}
								echo'</ul>';
							}
						?>
					</li>
				</ul>
			</li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/services/">Services</a>
				<ul>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/data/">Data</a></li>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/consultancy/">Consultancy</a></li>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/forecasting/">Forecasting</a></li>
				</ul>
			</li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/services/">Analysis</a>
				<ul>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/category/analysis/webcasts/">Webcasts</a>
						<?php
							$args = array( 'category'=>3, 'posts_per_page'=>-1);
							$posts = get_posts($args); 
							if(!empty($posts)){
								echo'<ul>';
								foreach($posts as $post){
									setup_postdata($post);
									
									echo '<li class="page_item"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
								
								}
								echo'</ul>';
							}
						?>
					</li>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/category/analysis/weekly-trade-views/">Weekly Trade Views</a>
						<?php
							$args = array( 'category'=>4, 'posts_per_page'=>-1);
							$posts = get_posts($args); 
							if(!empty($posts)){
								echo'<ul>';
								foreach($posts as $post){
									setup_postdata($post);
									
									echo '<li class="page_item"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
								
								}
								echo'</ul>';
							}
						?>
					</li>
					<li class="page_item"><a href="http://demo.deltaeconomics.com/category/analysis/quarterly-trade-forecasts/">Quarterly Trade Forecasts</a>
						<?php
							$args = array( 'category'=>5, 'posts_per_page'=>-1);
							$posts = get_posts($args); 
							if(!empty($posts)){
								echo'<ul>';
								foreach($posts as $post){
									setup_postdata($post);
									
									echo '<li class="page_item"><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
								
								}
								echo'</ul>';
							}
						?>
					</li>
				</ul>
			</li>
			
			<li class="page_item"><a href="http://demo.deltaeconomics.com/deltaapp/">DeltaApp</a></li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/contact/">Contact</a></li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/terms-conditions/">Terms &#038; Conditions</a></li>
			<li class="page_item"><a href="http://demo.deltaeconomics.com/privacy/">Privacy</a></li>
		</ul>
		<div class="strike" style="margin:0;"></div>
	  </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>