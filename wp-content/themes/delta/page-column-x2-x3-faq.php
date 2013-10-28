<?php
/*
Template Name: Columns: x2 – x3 - faq
*/
?>
<?php get_header(); ?>

<style type="text/css">
	.faqMsg{ width: 510px; height: 40px; display: block; margin-top: 10px;}
	.faqSearchContent{ padding-bottom: 0px;}
	.faqSearchHolder{ width: 510px; height: 25px; margin-top: 6px; position: relative; }
	#faqSearchBox{ width: 510px; height: 25px; background: url(/wp-content/themes/delta/images/faqTextbox.jpg) no-repeat top left #fff; border: none; padding: 0 0 0 5px; color: #b7b7b7;}
	.faqSearchSubmit{ width: 36px; height: 25px;  cursor: pointer; overflow: hidden; position: absolute; right: 0; }
	.faqTopicMenu{ width: 240px; padding: 0;}
	.faqTopic{ width: 238px; height: 28px; border: 1px solid #0b1e60; list-style: none; margin-bottom: 30px; padding: 0 !important; line-height: 28px; display: block; cursor: pointer;}
	.faqTopic a{ width: 233px; height: 28px; list-style: none; margin-bottom: 30px; padding: 0 0 0 5px !important; line-height: 28px; display: block; cursor: pointer;}
	.faqTopic a:hover{ width: 233px; background-color: #0b1e60; color: #fff; padding: 0 0 0 5px !important;}
	.faqActive{ background-color: #0b1e60; color: #fff; }
</style>

<script type="text/javascript">
	function searchFAQ(){
		jQuery("#faqMsg").html("No results found. Ensure that all words are spelled correctly or try a different word that mean the same thing.")
	}
	
	function selectTopic(anch){
		jQuery(".faqTopicLink").each(function(){
			jQuery(this).removeClass("faqActive");
		});
		
		jQuery("#"+anch).addClass("faqActive")
	}
</script>

<div class="flex_100">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php 
					print_head_image();
					the_content(); 
				?>
                
                	<div class="colLen2">
                        <div class="cols">
                            <div class="flex_50">
                                <?php if(get_field('box_1')){ ?>
                                    <div class="box">
                                        <?php echo get_field("box_1"); ?>
                                        <div class="clear"></div>
                                    </div>
                                    <?php 
                                } ?>
                            </div>
                            <div class="flex_50">
                                <?php if(get_field('box_2')){ ?>
                                    <div class="box faqSearchContent">
                                        <?php echo get_field("box_2"); ?>
                                        <div class="clear"></div>
                                    </div>
                                    <?php 
                                } 
								
								?>
                                <div class="box">
                                	<div class="faqSearchHolder">
                                    	<img border="0" onclick="javascript: searchFAQ();" alt="Search" src="/wp-content/themes/delta/images/blank.png" class="faqSearchSubmit">
                                		<input type="text" name="faqSearchBox" id="faqSearchBox" value="Enter your query here" onfocus="if(this.value == 'Enter your query here'){ this.value = ''; this.style.color = '#6d7395'; }" onblur="if(this.value == ''){ this.value='Enter your query here'; this.style.color = '#b7b7b7'; }" />
                                    </div>
                                
                                    <div id="faqMsg" class="faqMsg">
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                   	</div>
                	<div class="clear"></div>
                    <div class="colLen3">
                        <div class="cols">
                            <div class="flex_25">
                                <?php if(get_field('box_3')){ ?>
                                    <div class="box minBoxHeight">
                                        <?php echo get_field("box_3"); ?>
                                        <div class="clear"></div>
                                    </div>
                                    <?php 
                                } ?>
                                
                                <div class="box">
                                	<?php
									
									$args = array(	
										'parent' => 25,
										'hide_empty' => 0,
										'orderby' => 'name',
										'order' => 'ASC'
									);
									
									$topics = get_categories( $args );
										
									if(!empty($topics)){
										echo '<ul class="faqTopicMenu">';
										foreach ($topics as $tpc) {
											echo '<li class="faqTopic"><a class="faqTopicLink" id="topic'.$tpc->term_id.'" datax="'.$tpc->term_id.'" href="javascript: selectTopic(\'topic'.$tpc->term_id.'\');">'.$tpc->name.'</a></li>';
										}
										echo '</ul>';
									}
									?>
                                </div>
                            </div>
                            <div class="flex_25">
                                <?php if(get_field('box_4')){ ?>
                                    <div class="box minBoxHeight">
                                        <?php echo get_field("box_4"); ?>
                                        <div class="clear"></div>
                                    </div>
                                    <?php 
                                } ?>
                            </div>
                            <div class="flex_50">
                                <?php if(get_field('box_5')){ ?>
                                    <div class="box minBoxHeight">
                                        <?php echo get_field("box_5"); ?>
                                        <div class="clear"></div>
                                    </div>
                                    <?php 
                                } ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                   	</div>
                <?php	
					
					wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); 
				?>
			</div>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>