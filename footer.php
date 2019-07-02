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

$social_media_pre_title = get_field("social_media_pre_title", "option");
$social_media_title = get_field("social_media_title", "option");
$links = array();
$links["facebook"] = get_field("facebook", "option");
$links["twitter"] = get_field("twitter", "option");
$links["instagram"] = get_field("instagram", "option");
$links["youtube"] = get_field("youtube", "option");

$address = get_field("address", "option");
$site_info = get_field("site_info", "option");

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer pure-g" role="contentinfo">
		<div class="fullWidth social-media">
			<div class="social-media-inner">
				<p class="pre-title">
					<?php print($social_media_pre_title) ?>
				</p>
				<h2 class="field-social_media_title">
					<?php print($social_media_title) ?>
				</h2>

				<ul class="social-media-icons pure-g">

					<?php foreach ($links as $name=>$link) : ?>
					<li class="social-media-icon pure-u-1-4">
						<a target="_blank" rel="noopener" class="social-media-icon-link <?php echo $name ?>" href="<?php echo $link ?>">
							<?php echo $name ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<div class="site-identity pure-u-1 pure-u-lg-7-24">
  		<div class="site-branding footer-item-inner">
  				<p class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php print $address ?>
  		</div><!-- .site-branding -->
		</div><!-- .site-info -->
		<div class="site-info pure-u-1 pure-u-lg-9-24">
      <div class="footer-item-inner">
        <?php print $site_info ?>
      </div>
		</div><!-- .site-info -->
		<div class="site-resources pure-u-1 pure-u-lg-8-24">
      <div class="footer-item-inner">
        <h3>Resources</h3>
        <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'utility-menu', 'menu_class' => 'ulreset' ) ); ?>
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
