<?php
/**
 * Template Name: Current Students
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

global $fake_id;
$fake_id = $post->ID;
$wp_query->set('pagename', $fake_id);
$wp_query->set('post_id', $fake_id);
get_header("current-students");
get_template_part("template-parts/current-students-content");
get_footer("current-students");