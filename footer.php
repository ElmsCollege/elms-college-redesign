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

<?php wp_footer(); ?>


  <div class="modal micromodal-slide" id="modal-2" aria-hidden="true" style="position:relative;z-index: 10; height:600px;">
    <div class="modal__overlay" tabindex="-1" data-custom-close>
      <div class="modal__container w-90 w-40-ns" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">
          <header class="modal__header">
            <h3 class="modal__title" id="modal-2-title">
              Request Info
            </h3>
            <button class="modal__close" aria-label="Close modal" data-custom-close></button>
          </header>
            <div class="modal__content" id="modal-2-content">
        				<iframe src="https://elmstest.elluciancrmrecruit.com/Apply/Account/ProspectInquiryWidget?f=5dc21e7b-aa4f-4979-a72b-47f4a48c9901&o=9c932f40-f7a6-43da-b650-9b4ffcfa4d65&s=24525250-9880-e811-80db-0a4fbe36cd62" height="400" style="border:unset;"></iframe>
            </div>
            <footer class="modal__footer">
              <a class="f6 ml2 dark-blue no-underline underline-hover js-modal-close-trigger" href="#" aria-label="Close this dialog window">Cancel</a>
            </footer>
      </div>
    </div>
  </div>

</body>
</html>
