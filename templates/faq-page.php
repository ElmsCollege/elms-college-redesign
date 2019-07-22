<?php
/**
 * Template Name: FAQ Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 *
 * This is identical to the program page except that the site is setup to allow the Gutenberg/Blocks editor on this page. 
 */

get_header();the_post(); 
?>

<script>
jQuery(document).ready(function() {
	//JS for the Gutenberg FAQ blocks
	jQuery(".schema-faq-section").each(function() {
		jQuery(".schema-faq-question img").each(function () {
			var src = jQuery(this).attr("data-src");
			var split = src.split("/");
			var file = split[split.length-1];
			var name = file.split(".")[0];
			jQuery(this).attr({
				id: name
			});
		});
		jQuery(".schema-faq-question").each(function (index) {
			jQuery(this).attr({
				class: "schema-faq-question collapseomatic noarrow",
				id: index
			});
		});
		jQuery(".schema-faq-answer").each(function (index) {
			jQuery(this).css("display","none").attr({
				class: "schema-faq-answer collapseomatic_content",
				id: "target-" + index
			});
		});
	  });
});
</script>
<?php
get_template_part("template-parts/program-page-content");
?>

<?php
get_footer();
