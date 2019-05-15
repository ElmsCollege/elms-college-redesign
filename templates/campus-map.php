<?php
/**
 * Template Name: Campus Map
 * This template has been customized to display the master tuition table.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

get_header(); ?>
<style>
.collapseomatic{display:block !important;}
.ui-accordion .ui-accordion-content{padding: .5em !important;}
</style>

<div class="section-heading">
	<h1 class="field-title">
		<?php the_title() ;?>
	</h1>
</div>

<div id="primary" class="content-area pure-g">
	<main id="main" class="site-main pure-u-1 standalone" role="main">

		<div class="field-content">
			<?php the_content() ?>
		</div>


	</main><!-- #main -->    
</div><!-- #primary -->

<script>
jQuery(window).load(function () {

        svgPanZoom('#campusMap', {
          zoomEnabled: true,
          controlIconsEnabled: true
        });

var map = document.getElementById("campusMap");
var svgDoc = map.contentDocument;

var berchmans = svgDoc.getElementById("Berchmans");
berchmans.addEventListener("mousedown", function(){
  jQuery("#accordion").accordion( "option", "active", 0 );
});
var library = svgDoc.getElementById("Library");
library.addEventListener("mousedown", function(){
  jQuery("#accordion").accordion( "option", "active", 1 );
});
var admissions = svgDoc.getElementById("Spaulding");
admissions.addEventListener("mousedown", function(){
  jQuery("#accordion").accordion( "option", "active", 2 );
});
var gaylord = svgDoc.getElementById("Gaylord");
gaylord.addEventListener("mousedown", function(){
  jQuery("#accordion").accordion( "option", "active", 3 );
});
var trees = svgDoc.getElementById("Trees1");
trees.addEventListener("mousedown", function(){
  jQuery(this).css("visibility", "hidden");
});

jQuery( function() {
  jQuery( "#accordion" ).accordion({
    collapsible: true,
    active: false
  });
} );

jQuery("#hideTrees").click(function() {
if (jQuery("#hideTrees").prop("checked")) {
jQuery(svgDoc).find("#Trees1").css("visibility","hidden");
jQuery(svgDoc).find("#trees2").css("visibility","hidden");
jQuery(svgDoc).find("#trees3").css("visibility","hidden");
}else{
jQuery(svgDoc).find("#Trees1").css("visibility","visible");
jQuery(svgDoc).find("#trees2").css("visibility","visible");
jQuery(svgDoc).find("#trees3").css("visibility","visible");
}
});

} );
</script>

<?php
get_footer();