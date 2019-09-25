<?php
/**
 * Template Name: Campus Map template
 * This template has been customized to display the SVG-based campus map.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
wp_enqueue_style( 'campus-map', get_stylesheet_directory_uri(). '/css/campus-map.css', '1.0.0', 'all');

wp_enqueue_script( 'SVGPanZoom', get_template_directory_uri() . '/js/SVGPanZoom.js', array(), '1', 'all');

get_header(); ?>

	<main id="main" class="pure-u-1" role="main">

		<div id="svg-container" class="flexRowWrapStart spaceBetween">
			<object type="image/svg+xml" data="/wp-content/themes/gs_elms/images/Elms-campus3d.svg" id="svg-object"></object>
		</div><!-- end #svg-container -->
		
		<?php
			$slideshows = array(
				//"generic name" => array("div" => "<name of layer from svg>","title" => "<title for slideshow window>","metaslidershortcode" => '<metaslider shortcode from admin>'),
				"berchmans" => array("div" => "berchmanshall","title" => "Berchmans Hall","metaslidershortcode" => '[metaslider id="38345"]'),
				"library" => array("div" => "alumnaelibrary","title" => "Alumnae Library","metaslidershortcode" => '[metaslider id="38346"]'),
				"dooley" => array("div" => "marydooleycollegecenter","title" => "Mary Dooley College Center","metaslidershortcode" => '[metaslider id="38347"]'),
				"devine" => array("div" => "devinehall","title" => "Devine Hall","metaslidershortcode" => '[metaslider id="38350"]'),
				"spaulding" => array("div" => "spauldinghouse","title" => "Spaulding House","metaslidershortcode" => '[metaslider id="38351"]')
			);
			foreach($slideshows as $slide) {
				echo '<div class="transition ' . $slide['div'] . ' slideshow">';
				echo '<h3 class="slideshow_header">' . $slide['title'] . '</h3>';
				echo do_shortcode($slide['metaslidershortcode']);
				echo '<button class="close">Close</button></div>';
			}
		?>
	</main><!-- #main -->

<script>
	var SVGobject = document.getElementById("svg-object");
//	var mapSVG;
 	mapSVG.addEventListener("load",function() {
    	mapSVG = SVGobject.contentDocument;
 	
		var instance = new SVGPanZoom(object.contentDocument.getElementById('campusMap'), {
		eventMagnet: document.getElementById('svg-object')
        });

		function hideSlideshow(){
			jQuery('svg g').removeClass('hilite');
			jQuery('.slideshow').removeClass('visible');
		}

		jQuery('svg polygon,svg path').on('click touch',function(){
			var buildingId = this.id;
			hideSlideshow();
			if(buildingId){
				var slideshowBlock = jQuery('.' +buildingId + '.slideshow');
				jQuery(slideshowBlock).toggleClass('visible');
				jQuery(this).addClass('hilite');
				jQuery('.close').on('click touch',function(){
					hideSlideshow();
				});
			}		
		});

	}, false);

</script>

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

				<ul class="social-media-icons pure-g flexRowWrapStart">

					<li class="social-media-icon pure-u-1-4">
						<a target="_blank" rel="noopener" class="social-media-icon-link" href="https://www.facebook.com/ElmsCollege/">
							<img src="/wp-content/themes/gs_elms/images/icon-facebook.png" alt="Facebook logo"/>
						</a>
					</li>
					<li class="social-media-icon pure-u-1-4">
						<a target="_blank" rel="noopener" class="social-media-icon-link" href="https://twitter.com/elmscollege">
							<img src="/wp-content/themes/gs_elms/images/icon-twitter.png" alt="Twitter logo"/>
						</a>
					</li>
					<li class="social-media-icon pure-u-1-4">
						<a target="_blank" rel="noopener" class="social-media-icon-link" href="https://www.instagram.com/elmscollege/">
							<img src="/wp-content/themes/gs_elms/images/icon-instagram.png" alt="Instagram logo"/>
						</a>
					</li>
					<li class="social-media-icon pure-u-1-4">
						<a target="_blank" rel="noopener" class="social-media-icon-link" href="https://www.youtube.com/user/ElmsCollegeVideo">
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
        <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'utility-menu', 'menu_class' => 'ulreset' ) ); ?>
      </div>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
	wp_footer();
?>

</body>
</html>