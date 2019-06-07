<?php
/**
 * Template Name: Campus Map
 * This template has been customized to display the SVG-based campus map.
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
wp_enqueue_script ( 'pan-zoom', get_template_directory_uri() . '/js/svg-pan-zoom.min.js' );

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
	opacity:.7;
}
.slick-slide {
	margin: 0 10px;
	display: inline-block !important;
	float: none;
	vertical-align: middle;
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

<div id="Berchmans">
<?php
// WP_Query arguments
$args = array(
	'page_id'                => '36525',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		the_excerpt();
		echo do_shortcode("[slideshow_gallery_modal]");
	}
}
// Restore original Post Data
wp_reset_postdata();
?>
</div>

		</div>


	</main><!-- #main -->    
</div><!-- #primary -->

<script>
jQuery(window).load(function () {

	jQuery(".slider-modal").slick({
		slidesToShow: 3,
		lazyLoad: 'ondemand',
	});

	var modalDivs = jQuery("#Berchmans, #Library, #Spaulding, #Gaylord");

        svgPanZoom("#campusMap", {
          zoomEnabled: true,
          controlIconsEnabled: true
        });

	modalDivs.dialog({
		autoOpen: false,
		modal: true,
		minWidth: 275,
		resizable: false,
		
	});
	jQuery(".ui-widget-overlay").live("click", function() {
		modalDivs.dialog("close");
	});
	//modal has issues in safari

var map = document.getElementById("campusMap");
var svgDoc = map.contentDocument;

var openPopup = function (event) {
    jQuery("#Berchmans").dialog("open");
};

var berchmans = svgDoc.getElementById("Berchmans");
berchmans.addEventListener("click", openPopup,false);
berchmans.addEventListener("touchstart", openPopup,false);

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

modalDivs.dialog({
  open: function( event, ui ) {
	jQuery(".slider-modal").slick('setPosition');
  }
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

jQuery("#showBluePhones").click(function() {
if (jQuery("#showBluePhones").prop("checked")) {
	jQuery(svgDoc).find(".st105 .st182").css("visibility","visible");
	jQuery(svgDoc).find(".st105 .st46").css("visibility","visible");
	jQuery(svgDoc).find(".st105 .st46.st185.st186").css("visibility","hidden");
}else{
	jQuery(svgDoc).find(".st105 .st182").css("visibility","hidden");
	jQuery(svgDoc).find(".st105 .st46").css("visibility","hidden");
}
});

jQuery("#showStreets").click(function() {
if (jQuery("#showStreets").prop("checked")) {
	jQuery(svgDoc).find(".st179.st180.st181").css("visibility","visible");
}else{
	jQuery(svgDoc).find(".st179.st180.st181").css("visibility","hidden");
}
});

} );
</script>

<?php
get_footer();
