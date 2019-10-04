<?php
/**
 * Template Name: No special fields (blocks editor)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 */

get_template_part( "template-parts/header-selector" );
the_post();

get_template_part( "template-parts/page-heading" );
?>
<div id="primary" class="content-area pure-g">
  <main id="main" class="site-main pure-u-1 standalone" role="main">
    <?php the_content() ?>
  </main>
  <!-- #main -->
  
  <?php if($has_sidebar) : ?>
  <?php get_sidebar(); ?>
  <?php endif; ?>
</div>
<!-- #primary -->

<?php
get_footer();
