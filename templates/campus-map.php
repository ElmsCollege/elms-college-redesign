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
		jQuery("#svg-container").load("/wp-content/themes/gs_elms/images/Elms-campus3d-final.svg", function(){
			var instance = new SVGPanZoom(document.getElementById('campusMap'),{
				eventMagnet: document.getElementById('svg-container')
			});

			function hideSlideshow(){
				jQuery('.slideshow').removeClass('visible');
				jQuery('#svg-overlay').remove();
			}

			jQuery("#svg-container").on('mousedown touchstart',function(event){
				hideSlideshow();
				var buildingId = event.target.id;
				if(buildingId){
					var slideshowBlock = jQuery('.' +buildingId + '.slideshow');
					jQuery(slideshowBlock).toggleClass('visible');
					jQuery('.close').on('click touch',function(){
						hideSlideshow();
					});
				}
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
  <div id="pageContainer">
    <div class="flexRowWrapStart justifyCenter">
      <button id="reset">Reset Map</button>
      <button id="zoomIn">Zoom In</button>
      <button id="zoomOut">Zoom Out</button>
      <button id="panLeft">Left</button>
      <button id="panRight">Right</button>
      <button id="panUp">Up</button>
      <button id="panDown">Down</button>
    </div>
    <div id="svg-container" class="flexRowWrapStart spaceBetween">
      <noscript>
      <div>
        <p>The campus map requires JavaScript to be enabled.</p>
        <p><a href="https://elms-staging.r6a5yukd-liquidwebsites.com/wp-content/uploads/2018/10/campus-map-print-2018-1.pdf" target="_blank" rel="noopener">Click here to download the map as a PDF file.</a></p>
      </div>
      </noscript>
    </div>
    <!-- end #svg-container -->
    <?php
    $slideshows = array(
      //"generic name" => array("div" => "<name of layer from svg>","title" => "<title for slideshow window>","metaslidershortcode" => '<metaslider shortcode from admin>'),
      "berchmans" => array( "div" => "berchmanshall", "title" => "Berchmans Hall", "metaslidershortcode" => '[metaslider id="38345"]', "descriptionField" => "berchmans_hall_description" ),
      "library" => array( "div" => "alumnaelibrary", "title" => "Alumnae Library", "metaslidershortcode" => '[metaslider id="38346"]', "descriptionField" => "alumnae_library_description" ),
      "dooley" => array( "div" => "marydooleycollegecenter", "title" => "Mary Dooley College Center", "metaslidershortcode" => '[metaslider id="38347"]', "descriptionField" => "dooley_center_description" ),
      "rosewilliam" => array( "div" => "rosewilliamhall", "title" => "Rose William Hall", "metaslidershortcode" => '[metaslider id="38348"]', "descriptionField" => "rose_william_hall_description" ),
      "oleary" => array( "div" => "olearyhall", "title" => "O'Leary Hall", "metaslidershortcode" => '[metaslider id="38349"]', "descriptionField" => "oleary_hall_description" ),
      "devine" => array( "div" => "devinehall", "title" => "Devine Hall", "metaslidershortcode" => '[metaslider id="38350"]', "descriptionField" => "devine_hall_description" ),
      "spaulding" => array( "div" => "spauldinghouse", "title" => "Spaulding House", "metaslidershortcode" => '[metaslider id="38351"]', "descriptionField" => "spaulding_house_description" ),
      "lyons" => array( "div" => "lyonscenter", "title" => "Lyons Center for Natural and Health Sciences", "metaslidershortcode" => '[metaslider id="38352"]', "descriptionField" => "lyons_center_description" ),
      "bluehouse" => array( "div" => "bluehouse", "title" => "Blue House (147 Grape Street)", "metaslidershortcode" => '[metaslider id="38353"]', "descriptionField" => "blue_house_description" ),
      "brickhouse" => array( "div" => "brickhouse", "title" => "Brick House (15 Gaylord Street)", "metaslidershortcode" => '[metaslider id="38354"]', "descriptionField" => "brick_house_description" ),
      "marian" => array( "div" => "marianhall", "title" => "Marian Hall", "metaslidershortcode" => '[metaslider id="38356"]', "descriptionField" => "marian_hall_description" ),
      "maguire" => array( "div" => "maguirecenter", "title" => "Maguire Center", "metaslidershortcode" => '[metaslider id="38357"]', "descriptionField" => "maguire_center_description" ),
      "gaylord" => array( "div" => "gaylordmansion", "title" => "Gaylord Mansion", "metaslidershortcode" => '[metaslider id="38510"]', "descriptionField" => "gaylord_mansion_description" ),
      "quad" => array( "div" => "keatingquad", "title" => "Keating Quadrangle", "metaslidershortcode" => '[metaslider id="38634"]', "descriptionField" => "keating_quadrangle_description" ),
      "condonField" => array( "div" => "cherylcondonsoftballfield", "title" => "Condon Field", "metaslidershortcode" => '[metaslider id="38950"]', "descriptionField" => "cheryl_condon_field_description" ),
      "learyField" => array( "div" => "learyfield", "title" => "Timothy J. Leary Field", "metaslidershortcode" => '[metaslider id="38958"]', "descriptionField" => "leary_field_description" )
    );
    foreach ( $slideshows as $slide ) {
      echo '<div class="transition ' . $slide[ 'div' ] . ' slideshow">';
      echo '<h3 class="slideshow_header">' . $slide[ 'title' ] . '</h3>';
      echo '<p class="small">'. get_field($slide['descriptionField']) .'</p>';
      echo do_shortcode( $slide[ 'metaslidershortcode' ] );
      echo '<button class="close">Close</button></div>';
    }
    ?>
  </div>
  <!-- end pageContainer--> 
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