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

	<main id="main" class="site-main pure-u-1" role="main">

		<div id="svg-container" class="flexRowWrapStart spaceBetween">
		</div><!-- end #svg-container -->
		<div class="transition berchmanshall slideshow">
   				<h3 class="slideshow_header">Berchmans Hall</h3>
  				<?php echo do_shortcode('[metaslider id="37870"]'); ?>
				<button class="close">Close</button>
		</div>
		<div class="transition alumnaelibrary slideshow">
   				<h3 class="slideshow_header">Alumnae Library</h3>
  				<?php echo do_shortcode('[metaslider id="37876"]'); ?>
				<button class="close">Close</button>
		</div>
	</main><!-- #main -->

<script>
	jQuery(document).ready(function(){
		var instance = new SVGPanZoom(document.getElementById('campusMap'), {
			eventMagnet: document.getElementById('svg-container')
        });
		
		function hideSlideshow(){
			jQuery('svg g').removeClass('hilite');
			jQuery('.slideshow').removeClass('visible');
			//instance.panRight(600);
		}

		jQuery('svg g').on('click touch',function(){
			console.log(this);
			hideSlideshow();
			var buildingId = this.id;
			console.log(buildingId);
			var slideshowBlock = jQuery('.' +buildingId + '.slideshow');
			jQuery(slideshowBlock).toggleClass('visible');
			jQuery(this).addClass('hilite');
			jQuery('.close').click(function(){
				hideSlideshow();
			});
		});
	});
</script>

<?php
get_footer();
