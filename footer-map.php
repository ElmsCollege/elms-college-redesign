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
        <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'utility-menu', 'menu_class' => 'ulreset' ) ); ?>
      </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); 

if( have_rows('building_info_container') ):
	while ( have_rows('building_info_container') ) : the_row();

$images = get_sub_field('building_gallery');
?>
<div class="modal micromodal-slide" id="<?php print the_sub_field('building_name_short'); ?>" aria-hidden="true">
	<div class="modal_overlay" tabindex="-1" data-custom-close>
		<div class="modal_container" role="dialog" aria-modal="true" aria-labelledby="<?php print the_sub_field('building_name_short'); ?>-title">
			<header class="modal_header">
				<h3 class="modal_title" id="<?php print the_sub_field('building_name_short'); ?>-title">
              		<?php print the_sub_field('building_name_full'); ?>
            	</h3>
			</header>
			<div class="carousel">
				<?php 
				foreach( $images as $image ): ?>
					<div>
						<img class="carouselImage" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
						<figcaption><?php echo $image['caption']; ?></figcaption>
					</div>
				<?php endforeach; ?>
			</div>
			<footer class="modal_footer">
				<button class="<?php print the_sub_field('building_name_short'); ?>-close-trigger" aria-label="Close this dialog window" data-micromodal-close="">Cancel</button>
			</footer>
		</div>
	</div>
</div>
<?php
    endwhile;
endif;
?>

</body>
</html>
