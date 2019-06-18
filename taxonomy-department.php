<?php
/**
 * This template controls the department taxonomy pages (/department/XXXX/) used in the directory pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
$taxonomyTerm = 'department';

function custom_tag_title( $title ) {
	$title = single_tag_title( '', false );
	return $title . ' Department';
}
add_filter( 'get_the_archive_title', 'custom_tag_title' );

get_template_part("template-parts/division-department-page");