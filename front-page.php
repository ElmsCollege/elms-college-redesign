<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
global $fake_id;

  $fake_id = $post->ID;
  get_header();
  get_template_part("template-parts/home-page-content");
  get_footer();
