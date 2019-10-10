<?php
/**
 * Template Name: Full Width (blocks editor)
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
    	<main id="main" class="program-page-main site-main pure-u-1 standalone" role="main">
			<div class="field-content">
    <?php the_content() ?>
				</div>
  </main>
  <!-- #main -->
  
</div>
<!-- #primary -->

<?php
get_footer();
