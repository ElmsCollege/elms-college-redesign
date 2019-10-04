<?php
/**
 * Template Name: No special fields (blocks editor)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();
if ( is_active_sidebar( 'sidebar-1' )){
	$has_sidebar = 1;
}

get_template_part( "template-parts/header-selector" );
the_post();

get_template_part( "template-parts/page-heading" );
?>
	<div id="primary" class="content-area pure-g"> 
    	<main id="main" class="program-page-main site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">

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
