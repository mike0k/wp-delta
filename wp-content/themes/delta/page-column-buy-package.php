<?php
/*
Template Name: Columns: Buy Package
*/
?>
<?php get_header(); ?>

<script>
jQuery(function(){
	jQuery('.buyTag').click(function(){
		//set vars
		var newCat, allCats, catArr, remove, filtered, compiled;
		newCat = jQuery(this).data('cat');
		allCats = jQuery('#activePost').data('cat');
		catArr = allCats.split('-');
		catArr.push(newCat);
		catArr.sort();
		
		//is option being activated or deactivated
		if(jQuery(this).hasClass('optionSelected')){
			remove = newCat;
		}else{
			jQuery(this).addClass('optionSelected');
		}
		
		//remove unwanted data and clean final array
		filtered = new Array();
		for(var i = 0; i < catArr.length; i++) {
			var valid = true;
			if(typeof(filtered) !=='undefined'){
				for(var j = 0; j < filtered.length; j++) {
					if(filtered[j] == catArr[i]){
						valid = false;
					}
				}
			}
			if(valid && remove != catArr[i]){
				filtered.push(catArr[i]);
			}
		}
		
		//compile string of cat id's for re-use
		compiled = '';
		for(var i = 0; i < filtered.length; i++) {
			if (typeof(filtered[i]) !=='undefined' && catArr[i]!='') {
				compiled = compiled+'-'+filtered[i];
			}
		}
		
		//run any required conditioning
		compiled = buyPackageRules(compiled, newCat, remove);
		if (typeof(remove) !=='undefined' && remove!='') {
			jQuery(this).removeClass('optionSelected');
		}
		
		//spit out the data
		//console.log('final: '+compiled);
		displayBuyPackage(compiled);
		jQuery('#activePost').data('cat', compiled);
	});
	
	function buyPackageRules(compiled, newCat, remove){
		var fixed = compiled;
		//console.log('newCat: '+newCat);
		//console.log('remove: '+remove);
		//console.log('pre-rule: '+fixed);
		switch(compiled){
			
			case '-19':
				if(remove == 20 || remove == 21 || remove == 22){
					fixed = '';
					jQuery('.buyTag').removeClass('optionSelected');
					jQuery('.buyTag').removeClass('optionIncluded');
				}else{
					fixed = '-19-21';
					jQuery('#cat-21').addClass('optionSelected');
				}
				break;
			
			case '-20':
				jQuery('#cat-19').addClass('optionSelected');
				fixed = '-19-20';
				break;
			
			case '-21':
				fixed = '-19-21';
				jQuery('#cat-19').addClass('optionSelected');
			break;
			
			case '-22':
				fixed = '-19-22';
				jQuery('#cat-19').addClass('optionSelected');
				jQuery('#cat-21').addClass('optionIncluded');
			break;
			
			case '-19-21-22':
				fixed = '-19-22';
				jQuery('#cat-21').removeClass('optionSelected');
				break;
			
			case '-19-20-21-22':
				if(typeof(remove) !=='undefined' && newCat == 21){
					fixed = '-19-20-21';
					jQuery('#cat-22').removeClass('optionSelected');
				}else{
					fixed = '-19-20-22';
					jQuery('#cat-21').removeClass('optionSelected');
				}
				break;
				
		}
		
		if(remove == 22){
			jQuery('#cat-21').removeClass('optionIncluded');
		}else if(jQuery('#cat-22').hasClass('optionSelected')){
			jQuery('#cat-21').addClass('optionIncluded');
		}
		
		if(remove == 19){
			fixed = '';
			jQuery('.buyTag').removeClass('optionSelected');
			jQuery('.buyTag').removeClass('optionIncluded');
		}
		
		if(jQuery('#cat-19').hasClass('optionSelected')){
			jQuery('#cat-19').addClass('optionIncluded');
		}else{
			jQuery('#cat-19').removeClass('optionIncluded');
		}
		
		//console.log('post-rule: '+fixed);
		return fixed;
	}
	
	function displayBuyPackage(cats){
		jQuery('.buyContent').hide();
		jQuery('#cats'+cats).show();
	}
});
</script>
<div id="activePost" data-cat=""></div>
<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); $postId = get_the_ID(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php 
					print_head_image();
					the_content(); 
				?>
				<div class="clear"></div>
				<div class="colLen3">
					<div class="cols">
						<div class="flex_33">
							<?php if(get_field('box_1')){ ?>
								<div class="box minBoxHeight">
									<?php echo get_field("box_1"); ?>
									<div class="buyAnalysis">
										<?php
											
											$snalysis = get_terms( 'category', array(
												'orderby' => 'term_id',
												'order' => 'DESC',
												'parent' => 23,
											 ) );
											 
											if(!empty($snalysis)){
												foreach($snalysis as $category){
													?>
													<div class="buyTag" id="cat-<?php echo $category->term_id; ?>"  data-cat="<?php echo $category->term_id; ?>">
														<div class="flex_20">
															<div class="optionBox"></div>
														</div>
														<div class="flex_80">
															<span class="optionName"><?php echo $category->name; ?></span>
														</div>
														<div class="clear"></div>
													</div>
													<?php
												}
											}
										?>
										
									</div>
									<div class="clear"></div>
								</div>
								<?php 
							} ?>
						</div>
						<div class="flex_33">
							<?php if(get_field('box_2')){ ?>
								<div class="box minBoxHeight">
									<?php echo get_field("box_2"); ?>
									<div class="buyAnalysis">
										<?php
											
											$sectors = get_terms( 'category', array(
												'orderby' => 'term_id',
												'order' => 'DESC',
												'parent' => 24,
											 ) );
											 
											if(!empty($sectors)){
												foreach($sectors as $category){
													?>
													<div class="buyTag" id="cat-<?php echo $category->term_id; ?>" data-cat="<?php echo $category->term_id; ?>">
														<div class="flex_20">
															<div class="optionBox"></div>
														</div>
														<div class="flex_80">
															<span class="optionName"><?php echo $category->name; ?></span>
														</div>
														<div class="clear"></div>
													</div>
													<?php
												}
											}
										?>
										
									</div>
									<div class="clear"></div>
								</div>
								<?php 
							} ?>
						</div>
						<div class="flex_33">
							<?php if(get_field('box_3')){ ?>
								<div class="box minBoxHeight">
									<?php echo get_field("box_3"); ?>
									<div class="buyAnalysis">
										<?php
											
											$posts = get_posts('cat=10'); 
											if(!empty($posts)){
												$allCats = array_merge($snalysis,$sectors);
												foreach($posts as $post){
													$catData = array();
													$cats = wp_get_post_categories($post->ID);
													if(!empty($allCats)){
														foreach($allCats as $cat){
															if(in_array($cat->term_id, $cats)){
																$catData[] = $cat->term_id;
															}
														}
													}
													?>
													<div class="buyContent" id="cats-<?php echo implode('-',$catData); ?>">
														<div class="flex_100">
															<span><?php echo $post->post_content; ?></span>
															<span class="price"><?php echo get_field('price', $post->ID);	?>+<span class="vat">VAT</span></span>
														</div>
														<div class="clear"></div>
													</div>
													<?php
												}
											}
										?>
										
									</div>
									<div class="clear"></div>
								</div>
								<?php 
							} ?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="cols">
						<div class="flex_33">
							<?php if(get_field('box_1', $postId)){ ?>
								<?php if(get_field('sub_box_1', $postId)){ ?>
									<div class="subBox">
										<?php echo get_field("sub_box_1", $postId); ?>
										<div class="clear"></div>
									</div>
								<?php 
								}
							} ?>
						</div>
						<div class="flex_33">
							<?php if(get_field('box_2', $postId)){ ?>
								<?php if(get_field('sub_box_2', $postId)){ ?>
									<div class="subBox">
										<?php echo get_field("sub_box_2", $postId); ?>
										<div class="clear"></div>
									</div>
								<?php 
								}
							} ?>
						</div>
						<div class="flex_33">
							<?php if(get_field('box_3', $postId)){ ?>
								<?php if(get_field('sub_box_3', $postId)){ ?>
									<div class="subBox">
										<?php echo get_field("sub_box_3", $postId); ?>
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
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>