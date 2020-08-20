<?php
/**
 * Template Name: Library Interior Page
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();
if(is_page( array( 5398, 5453, 5480, 5485, 7588) )){
	$has_sidebar=false;
};

get_template_part("template-parts/header-selector");
get_template_part("template-parts/program-page-content");

get_footer("library");
