<?php
/**
 * Template Name: Campus Map - Embed
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

<?php get_template_part("template-parts/page-heading"); ?>

	<main id="main" class="site-main pure-u-1" role="main">

		<div class="field-content">
			<embed id="campus-map" type="image/svg+xml" style="width:1000px; height:500px; border:1px solid black;" src="/images/campus3d.svg" />
		</div>


	</main><!-- #main -->

<script>
      // Don't use window.onLoad like this in production, because it can only listen to one function.
      window.onload = function() {
        svgPanZoom('#campusMap', {
          zoomEnabled: true,
        });</script>

<?php
get_footer();
