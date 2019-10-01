<?php
/**
 * Template Name: Campus Map template
 * This template has been customized to display the SVG-based campus map.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
wp_enqueue_style( 'campus-map', get_stylesheet_directory_uri() . '/css/campus-map.css', '1.0.0', 'all' );

wp_enqueue_script( 'SVGPanZoom', get_template_directory_uri() . '/js/SVGPanZoom.js', array(), '1', 'all' );

get_header();
?>
<main id="main" class="pure-u-1" role="main"> 
  <script>
	jQuery(document).ready(function(){
		jQuery("#svg-container").load("/wp-content/themes/gs_elms/images/Elms-campus3d.svg", function(){
			var instance = new SVGPanZoom(document.getElementById('campusMap'),{
				eventMagnet: document.getElementById('svg-container')
			});
		
			function hideSlideshow(){
				jQuery('.slideshow').removeClass('visible');
				jQuery('#svg-container').removeClass('slideshowOpen');
			}
//			jQuery('svg polygon,svg path').on('click touch',function(){
			jQuery('svg').on('click touch',function(){
				var buildingId = this.id;
				hideSlideshow();
				if(buildingId){
					jQuery('#svg-container').addClass('slideshowOpen');
					var slideshowBlock = jQuery('.' +buildingId + '.slideshow');
					jQuery(slideshowBlock).toggleClass('visible');
					jQuery('.close').on('click touch',function(){
						hideSlideshow();
					});
				}else{
					hideSlideshow();
				}
				console.log('testing a theory');
			});
document.getElementById("campusMap").addEventListener("click", (e) => {
	console.log("clicked");
});
			jQuery('svg.slideshowOpen').on('click touch',function(){
				hideSlideshow();
			});
			jQuery('#reset').on('click touch',function(){
				instance.reset();
				hideSlideshow();
			});
			jQuery('#zoomIn').on('click touch',function(){
				instance.zoomIn(null,0.4);
				hideSlideshow();
			});
			jQuery('#zoomOut').on('click touch',function(){
				instance.zoomOut(null,0.4);
				hideSlideshow();
			});
			jQuery('#panLeft').on('click touch',function(){
				instance.panLeft(200);
				hideSlideshow();
			});
			jQuery('#panRight').on('click touch',function(){
				instance.panRight(200);
				hideSlideshow();
			});
			jQuery('#panUp').on('click touch',function(){
				instance.panUp(200);
				hideSlideshow();
			});
			jQuery('#panDown').on('click touch',function(){
				instance.panDown(200);
				hideSlideshow();
			});
		});
	});
</script>
  <div id="svg-container" class="flexRowWrapStart spaceBetween"> </div>
  <!-- end #svg-container -->
  <div class="flexRowWrapStart justifyCenter">
    <button id="reset">Reset Map</button>
    <button id="zoomIn">Zoom In</button>
    <button id="zoomOut">Zoom Out</button>
    <button id="panLeft">Left</button>
    <button id="panRight">Right</button>
    <button id="panUp">Up</button>
    <button id="panDown">Down</button>
  </div>
  <?php
  $slideshows = array(
    //"generic name" => array("div" => "<name of layer from svg>","title" => "<title for slideshow window>","metaslidershortcode" => '<metaslider shortcode from admin>'),
    "berchmans" => array( "div" => "berchmanshall", "title" => "Berchmans Hall", "metaslidershortcode" => '[metaslider id="38345"]' ),
    "library" => array( "div" => "alumnaelibrary", "title" => "Alumnae Library", "metaslidershortcode" => '[metaslider id="38346"]' ),
    "dooley" => array( "div" => "marydooleycollegecenter", "title" => "Mary Dooley College Center", "metaslidershortcode" => '[metaslider id="38347"]' ),
    "rosewilliam" => array( "div" => "rosewilliamhall", "title" => "Rose William Hall", "metaslidershortcode" => '[metaslider id="38348"]' ),
    "oleary" => array( "div" => "olearyhall", "title" => "O'Leary Hall", "metaslidershortcode" => '[metaslider id="38349"]' ),
    "devine" => array( "div" => "devinehall", "title" => "Devine Hall", "metaslidershortcode" => '[metaslider id="38350"]' ),
    "spaulding" => array( "div" => "spauldinghouse", "title" => "Spaulding House", "metaslidershortcode" => '[metaslider id="38351"]' ),
    "lyons" => array( "div" => "lyonscenter", "title" => "Lyons Center for Natural and Health Sciences", "metaslidershortcode" => '[metaslider id="38352"]' ),
    "bluehouse" => array( "div" => "bluehouse", "title" => "Blue House (147 Grape Street)", "metaslidershortcode" => '[metaslider id="38353"]' ),
    "brickhouse" => array( "div" => "brickhouse", "title" => "Brick House (15 Gaylord Street)", "metaslidershortcode" => '[metaslider id="38354"]' ),
    "marian" => array( "div" => "marianhall", "title" => "Marian Hall", "metaslidershortcode" => '[metaslider id="38356"]' ),
    "maguire" => array( "div" => "maguirecenter", "title" => "Maguire Center", "metaslidershortcode" => '[metaslider id="38357"]' ),
    "gaylord" => array( "div" => "gaylordmansion", "title" => "Gaylord Mansion", "metaslidershortcode" => '[metaslider id="38510"]' ),
    "quad" => array( "div" => "keatingquad", "title" => "Keating Quadrangle", "metaslidershortcode" => '[metaslider id="38634"]' )
  );
  foreach ( $slideshows as $slide ) {
    echo '<div class="transition ' . $slide[ 'div' ] . ' slideshow">';
    echo '<h3 class="slideshow_header">' . $slide[ 'title' ] . '</h3>';
    echo do_shortcode( $slide[ 'metaslidershortcode' ] );
    echo '<button class="close">Close</button></div>';
  }
  ?>
</main>
<!-- #main -->

</div>
<!-- #content -->
<footer id="colophon" class="site-footer pure-g" role="contentinfo">
  <div class="site-identity pure-u-1 pure-u-lg-7-24">
    <div class="site-branding footer-item-inner">
      <p class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        </a></p>
      291 Springfield Street<br>
      Chicopee, MA 01013-2839<br>
      <a href="tel:4135942761">413-594-2761</a> </div>
    <!-- .site-branding --> 
  </div>
  <!-- .site-info -->
  <div class="site-info pure-u-1 pure-u-lg-9-24">
    <div class="footer-item-inner">
      <h3>College of Our Lady of the Elms</h3>
      <p>We are a private Catholic coeducational liberal arts college founded in 1928 by the Sisters of St. Joseph of Springfield, Massachusetts. Elms College is located in Chicopee, Massachusetts, and grants associate’s, bachelor’s, master’s, and doctoral degrees.</p>
    </div>
  </div>
  <!-- .site-info -->
  <div class="site-resources pure-u-1 pure-u-lg-8-24">
    <div class="footer-item-inner">
      <h3>Resources</h3>
      <?php wp_nav_menu( array( 'theme_location' => 'utility', 'menu_id' => 'utility-menu', 'menu_class' => 'ulreset' ) ); ?>
    </div>
  </div>
  <!-- .site-info --> 
  
</footer>
<!-- #colophon -->
</div>
<!-- #page -->

<?php
wp_footer();
?>
</body></html>