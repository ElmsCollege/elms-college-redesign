<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */


get_header(); ?>

  <div class="section-heading" style="<?php print_featured_image_style(get_the_ID()) ?>">
      <h1 class="field-title no-pre-title">
        <?php the_archive_title( ); ?>
        <?php if (!is_single()) { print rss_link($GLOBALS['wp_the_query']); } ?>
      </h1>
  </div>
	<div id="primary" class="content-area pure-g">
		<main id="main" class="site-main pure-u-1 standalone" role="main">

  			<?php
  			/* Start the Loop */
  			if ( have_posts() ) : 
          while ( have_posts() ) : the_post();

  				/*
  				 * Include the Post-Format-specific template for the content.
  				 * If you want to override this in a child theme, then include a file
  				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  				 */
          ?>
          <h2><a href="<?php print get_the_permalink()?>"><?php the_title()?></a></h2>
          <?php
  				echo gs_get_the_excerpt($post->ID);

  			endwhile;

  			the_posts_navigation();

  		else :

  			get_template_part( 'template-parts/content', 'none' );

  		endif; ?>

		</main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
