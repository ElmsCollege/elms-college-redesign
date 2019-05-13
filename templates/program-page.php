<?php
/**
 * Template Name: Program Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 */

get_header();the_post(); 

get_template_part("template-parts/program-page-content");
?>

<?php
get_footer();
