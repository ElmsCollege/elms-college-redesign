<?php
/**
 * The template for displaying all pages.
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

$blog_id = get_current_blog_id();
$permalink = get_permalink();
if( 2 == $blog_id){
	get_header("commencement");
} elseif(strpos($permalink,'nursing')){
	get_header("nursing");
} else{
	get_header();
}
get_template_part("template-parts/program-page-content");
 ?>

<?php
get_footer();
