<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */

$library_footer_info = get_field("library_footer_info", "option");
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer pure-g" role="contentinfo">
		<div class="site-identity pure-u-1 pure-u-lg-7-24">
  			<div class="site-branding footer-item-inner">
  				<p class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					291 Springfield Street<br>
					Chicopee, MA 01013-2839<br>
					<a href="tel:4135942761">413-594-2761</a>
			</div><!-- .site-branding -->
		</div><!-- .site-info -->
		<div class="site-info pure-u-1 pure-u-lg-9-24">
			<div class="footer-item-inner">
				<h3>College of Our Lady of the Elms</h3>
				<p>We are a private Catholic coeducational liberal arts college founded in 1928 by the Sisters of St. Joseph of Springfield, Massachusetts. Elms College is located in Chicopee, Massachusetts, and grants associate’s, bachelor’s, master’s, and doctoral degrees.</p>
			</div>
		</div> <!-- .site-info -->
		<div class="site-resources pure-u-1 pure-u-lg-8-24">
      <div class="footer-item-inner library-footer-info">
        <?php echo $library_footer_info ?>
      </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
	wp_footer();
	get_template_part("template-parts/ellucian-modal");
?>

</body>
</html>
