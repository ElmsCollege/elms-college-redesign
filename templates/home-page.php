<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
global $fake_id;
$fake_id = get_field("current_students_page");
if (isset($_COOKIE["homepage"]) && $fake_id) {
  
  $wp_query->set('pagename', $fake_id);
  $wp_query->set('post_id', $fake_id);
  get_header("current-students");
  get_template_part("template-parts/current-students-content");
  get_footer("current-students");
}
else {
  $fake_id = $post->ID;
  get_header();
  get_template_part("template-parts/home-page-content");
  get_footer();
}
