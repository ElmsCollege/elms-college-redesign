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
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer pure-g" role="contentinfo">
		<div class="fullWidth social-media">
			<div class="social-media-inner">
				<p class="pre-title">
					Stay Connected
				</p>
				<h2 class="field-social_media_title">
					Connect With Us
				</h2>

				<ul class="social-media-icons pure-g flexRowWrapStart ulreset">

					<li class="social-media-icon">
						<a rel="noopener" class="social-media-icon-link" href="https://www.facebook.com/ElmsCollege/">
							<img src="/wp-content/themes/gs_elms/images/icon-facebook.png" alt="Facebook logo"/>
						</a>
					</li>
					<li class="social-media-icon">
						<a rel="noopener" class="social-media-icon-link" href="https://twitter.com/elmscollege">
							<img src="/wp-content/themes/gs_elms/images/icon-twitter.png" alt="Twitter logo"/>
						</a>
					</li>
					<li class="social-media-icon">
						<a rel="noopener" class="social-media-icon-link" href="https://www.instagram.com/elmscollege/">
							<img src="/wp-content/themes/gs_elms/images/icon-instagram.png" alt="Instagram logo"/>
						</a>
					</li>
					<li class="social-media-icon">
						<a rel="noopener" class="social-media-icon-link" href="https://www.youtube.com/user/ElmsCollegeVideo">
							<img src="/wp-content/themes/gs_elms/images/icon-youtube.png" alt="YouTube logo"/>
						</a>
					</li>

				</ul>
			</div>
		</div>

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
      <div class="footer-item-inner">
        <h3>Resources</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'utility-menu', 'menu_class' => 'ulreset two-column' ) ); ?>
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
