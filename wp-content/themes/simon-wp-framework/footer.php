<?php
/**
 * The template for Footer.
 *
 * @package Simon WP Framework
 * @since Simon WP Framework 1.0
 */
?>
<div style="clear: both"></div>

</div>
<div style="clear: both"></div>
<div id="footer">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer1") ) : ?>
	<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer2") ) : ?>
	<?php endif; ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer3") ) : ?>
	<?php endif; ?>
	<div style="clear: both"></div>
	
	<div class="flex_50">
		<p>Delta Economics is a pre-eminent market intelligence, research-led economics consultancy specialising in long term forecasting of trade, economic growth and trade payments.</p>
	</div>
	<div class="flex_50 footerRight">
		<p>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>. All rights reserved
		<br />
		<a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy</a> | <a href="#">Sitemap</a></p>
	</div>
	<div style="clear: both"></div>
</div>
</div>
<?php wp_footer(); ?>
</body></html>