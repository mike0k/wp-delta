<?php
/**
 * The template for Header.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php } ?>
	<title>
		<?php bloginfo('name'); ?>
		<?php wp_title('|'); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/boilerplate.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/grid.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/typography.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/core.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/sitemap.css" />
	<!--<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/devices.css" />-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

	<script type="text/javascript">var templateDir = "<?php bloginfo('template_directory') ?>";</script>
	<script src="<?php bloginfo('template_url'); ?>/js/cycle.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/ie.css" />
	<![endif]-->
	 <!--[if !IE]><!--><script>  
    if (/*@cc_on!@*/false) {  
        document.documentElement.className+=' ie10';  
    }  
    </script><!--<![endif]-->  

</head>
<body <?php body_class(); ?>>
<div class="outer_wrap">
	<div class="inner_wrap">
		<div id="header" class="">
			<h1>
				<a href="<?php echo home_url(); ?>/">
					<img src="<?php bloginfo('template_directory'); ?>/images/delta_logo_small.jpg" />
				</a>
			</h1>
		</div>
		<nav>
			<div id="navigation" class="">
				<?php wp_nav_menu(); ?>
				<div class="clear"></div>
				<a href="#" id="pull"><img src="<?php bloginfo('template_directory') ?>/images/nav-icon.png"></a>
			</div>
		</nav>
		<div class="clear"></div>
		<div class="content">
