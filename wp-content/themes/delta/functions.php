<?php
/**
 * The template for Function. Make changes at your own risk.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
 
  function print_head_image($id=null){
	if(get_field('header_image', $id)){
		$image = get_field('header_image', $id);
		?>
			<div class="flex_100 ">
				<div class="featuredImage" style="background: url(<?php echo $image["url"]; ?>) center center no-repeat; background-size:cover;"></div>
			</div>
		<?php
	}
 }
 
 function print_columns($gridClass, $start, $end, $id=null){
	?>
		<div class="cols">
			<?php
				for($i=$start; $i<=$end; $i++){
					if(get_field('box_'.$i, $id)){
					?>
						<div class="<?php echo $gridClass; ?> ">
							<div>
								<div class="box minBoxHeight">
									<?php echo get_field("box_".$i, $id); ?>
									<div class="clear"></div>
								</div>
								<?php if(get_field('sub_box_'.$i, $id)){ ?>
									<div class="box">
										<?php echo get_field("sub_box_".$i, $id); ?>
										<div class="clear"></div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php
					}
				}
			?>
			<div class="clear"></div>
		</div>
	<?php
 }
 
  function print_box($i, $id=null){
		if(get_field('box_'.$i, $id)){
		?>
			<div class="box">
				<?php echo get_field("box_".$i, $id); ?>
				<div class="clear"></div>
			</div>
			<?php if(get_field('sub_box_'.$i, $id)){ ?>
				<div class="box">
					<?php echo get_field("sub_box_".$i, $id); ?>
					<div class="clear"></div>
				</div>
			<?php 
			}
		}
 }


/** 
 * Apply styles to the visual editor 
 */    
add_filter('mce_css', 'tuts_mcekit_editor_style');  
function tuts_mcekit_editor_style($url) {  
    $url = get_bloginfo('template_url').'/css/typography.css';
  
    return $url;  
}  
  
/** 
 * Add "Styles" drop-down 
 */   
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );  
  
function tuts_mce_editor_buttons( $buttons ) {  
    array_unshift( $buttons, 'styleselect' );  
    return $buttons;  
}  
  
/** 
 * Add styles/classes to the "Styles" drop-down 
 */   
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );  
function tuts_mce_before_init( $settings ) {  
	$style_formats = array(  
		array(  
			'title' => 'Large Statistic',
			'inline' => 'span',
			'classes' => 'bigStat', 
		),
		array(  
			'title' => 'Small Statistic',
			'inline' => 'span',
			'classes' => 'smallStat', 
		),
		array(  
			'title' => 'Click Here Link',
			'inline' => 'span',
			'classes' => 'clickHere', 
		),
		array(  
			'title' => 'Standard Header',
			'block ' => 'h4',
		),
	);  

	$settings['style_formats'] = json_encode( $style_formats );  
	
	$colors = array(
		'0b1e60',
		'ffffff',
		'000000',
		
		'063576',
		'004b8c',
		'0074d9',
		'4192d9',
		'7abaf2',
		
		'ebebeb',
		'c3c3c3',
		'9b9b9b',
		'737373',
		'4b4b4b',
		
		
	);
	$settings['theme_advanced_text_colors'] = implode( ',', $colors );  
	return $settings;  
}  
  
/* Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats */  
  
/* 
 * Add custom stylesheet to the website front-end with hook 'wp_enqueue_scripts' 
 */  
add_action('wp_enqueue_scripts', 'tuts_mcekit_editor_enqueue');  
  
/* 
 * Enqueue stylesheet, if it exists. 
 */  
function tuts_mcekit_editor_enqueue() {  
  $StyleUrl = get_bloginfo('template_url').'/css/typography.css';
  wp_enqueue_style( 'myCustomStyles', $StyleUrl );  
}  

function simonwpframework_widgets_init() {
	register_sidebar(array(
		'id' => 'main-sidebar',
		'name' => 'Main Sidebar',
		'before_widget' => '<div class="flex_100">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
add_action ( 'widgets_init', 'simonwpframework_widgets_init' );

?>