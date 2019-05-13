<?php
/**
 * Template Name: Home Page Copy (for students)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

//var_dump($post->ID);
global $fake_id;
$fake_id = get_field("real_homepage");
$wp_query->set('pagename', $fake_id);
$wp_query->set('post_id', $fake_id);


get_header();
get_template_part("template-parts/home-page-content");
get_footer();