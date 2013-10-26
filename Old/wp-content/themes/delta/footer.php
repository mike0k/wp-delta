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
	<div class="flex_50">
		<p>Delta Economics is a pre-eminent market intelligence, research-led economics consultancy specialising in long term forecasting of trade, economic growth and trade payments.</p>
	</div>
	<div class="flex_50 footerRight">
		<p>
			&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?>. All rights reserved.
			<span class="footerLinks">
				<a href="<?php echo get_permalink(10); ?>">Terms &amp; Conditions</a> | 
				<a href="<?php echo get_permalink(12); ?>">Privacy</a> | 
				<a href="<?php echo get_permalink(93); ?>">Sitemap</a>
			</sapn>
		</p>
	</div>
	<div style="clear: both"></div>
</div>
</div>
<?php wp_footer(); ?>
</body></html>