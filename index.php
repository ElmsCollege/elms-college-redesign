<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */


get_header(); ?>

  <div class="section-heading" style=" <?php if (the_post_thumbnail_url()): ?>background-image:url('<?php print the_post_thumbnail_url() ?>');<?php endif;?>">
      <h1 class="field-title no-pre-title">
        News
      </h1>
  </div>
	<div id="primary" class="content-area pure-g">
		<main id="main" class="site-main pure-u-1 standalone" role="main">
  			<?php
  			/* Start the Loop */
  			if ( have_posts() ) : 
          while ( have_posts() ) : 
          the_post();

  				/*
  				 * Include the Post-Format-specific template for the content.
  				 * If you want to override this in a child theme, then include a file
  				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
  				 */
          ?>
          <h2><a href="<?php print get_the_permalink()?>"><?php the_title()?></a></h2>
			<span>Published on: <?php echo get_the_date( 'l, F j, Y' ); ?></span>
          <?php
  				echo '<p>' .gs_get_the_excerpt($post->ID) .'</p>';

  			endwhile;

  			the_posts_navigation();

  		else :

  			get_template_part( 'template-parts/content', 'none' );

  		endif; ?>

		</main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
