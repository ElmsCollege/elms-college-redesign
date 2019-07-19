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

get_template_part("template-parts/program-page-content");
?>

<?php
get_footer();
