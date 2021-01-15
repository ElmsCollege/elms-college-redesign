<?php
/**
 * The template for displaying the footer on the advertising landing pages.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */

$address = get_field("address", "option");

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
<?php the_field("advertising_tracking_pixel"); ?>
	<div class="site-identity pure-u-lg-7-24 centerText">
  		<div class="site-branding footer-item-inner noMarginLeft">
  				<p class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<p class="contact">291 Springfield Street<br />Chicopee, MA 01013-2839<br />
						<?php 
							if(get_field('footer_phone_number')) {
								echo do_shortcode('[encode link="tel:'.get_field("footer_phone_number").'"]'.get_field("footer_phone_number").'[/encode]');
							}
						?>
					</p>
  		</div><!-- .site-branding -->
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
