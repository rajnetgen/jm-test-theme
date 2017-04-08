<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jm-theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<h4 style="text-align: center;"><?php echo get_option( 'jm_footer_text' );?></h4>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
