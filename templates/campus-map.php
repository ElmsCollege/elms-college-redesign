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

wp_enqueue_style ( 'jquery-ui', get_template_directory_uri() . '/jquery-ui.theme.min.css' );
wp_enqueue_script ( 'pan-zoom', get_template_directory_uri() . '/js/pan-zoom.js' );

get_header(); ?>
<style>
.field-content{
	min-height:500px;
}
#campusMap{
	width:100%;
}
.ui-dialog{
	z-index:10;
	width:80% !important;
	border:2px solid #004731;
	border-radius:5px;
}
.ui-dialog-content.ui-widget-content{
	padding:10px;	
}
.ui-widget-overlay{
	position: fixed;
	top: 0;
	width: 100%;
	height: 100%;
}
</style>

<div class="section-heading">
	<h1 class="field-title">
		<?php the_title() ;?>
	</h1>
</div>

<div id="primary" class="content-area pure-g">
	<main id="main" class="site-main pure-u-1" role="main">

		<div class="field-content">
			<?php the_content() ?>
		</div>


	</main><!-- #main -->    
</div><!-- #primary -->

<script>
jQuery(window).load(function () {

        svgPanZoom("#campusMap", {
          zoomEnabled: true,
          controlIconsEnabled: true
        });

	jQuery("#Berchmans, #Library, #Spaulding, #Gaylord").dialog({
		autoOpen: false,
		modal: true,
		minWidth: 275
	});
	jQuery(".ui-widget-overlay").live("click", function() {
		jQuery("#Berchmans, #Library, #Spaulding, #Gaylord").dialog("close");
	});
	//modal has issues in safari

var map = document.getElementById("campusMap");
var svgDoc = map.contentDocument;

var berchmans = svgDoc.getElementById("Berchmans");
berchmans.addEventListener("click", function(){
  jQuery("#Berchmans").dialog("open");
});
var library = svgDoc.getElementById("Library");
library.addEventListener("click", function(){
  jQuery("#Library").dialog("open");
});
var admissions = svgDoc.getElementById("Spaulding");
admissions.addEventListener("click", function(){
  jQuery("#Spaulding").dialog("open");
});
var gaylord = svgDoc.getElementById("Gaylord");
gaylord.addEventListener("click", function(){
  jQuery("#Gaylord").dialog("open");
});


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
