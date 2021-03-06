<?php
/**
 * Template part for displaying page content in XXXX-program-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
$has_sidebar = gs_is_active_sidebar();
if ( is_active_sidebar( 'sidebar-1' ) ) {
  $has_sidebar = 1;
}

the_post();

get_template_part( "template-parts/page-heading" );
?>
<div id="primary" class="content-area">
    <?php if ($has_sidebar) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

    <main id="main" class="program-page-main site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">
        <div class="field-content">
            <?php the_content() ?>
        </div>
  </main>
  <!-- #main --> 
</div>
<!-- #primary --> 
