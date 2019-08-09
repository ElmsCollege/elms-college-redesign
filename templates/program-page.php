<?php
/**
 * Template Name: Program Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
the_post(); 

get_template_part("template-parts/program-page-content");
?>

<?php
get_footer();
