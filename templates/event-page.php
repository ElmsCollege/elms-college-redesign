<?php
/**
 * Template Name: Event Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */



get_header();

if (!is_single()) :
 ?>
  <div class="section-heading" style=" <?php if (get_the_post_thumbnail_url()): ?>background-image:url('<?php print get_the_post_thumbnail_url() ?>');<?php endif;?>">
      <h1 class="field-title no-pre-title">
        <?php 
        if (get_the_title()) {
          the_title();
        }
        else {
          tribe_events_title(); 
        } ?>
        <?php if (!is_single() && !is_page()) { print rss_link($GLOBALS['wp_the_query']); } ?>
      </h1>
  </div>
	<div id="primary" class="content-area pure-g">
		<main id="main" class="site-main pure-u-1" role="main">

<article id="post-0" <?php post_class(); ?>>

	<div class="entry-content">

<?php endif; ?>
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'event' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

<?php
if (!is_single()) :
 ?>
 	</div><!-- .entry-content -->
 </article><!-- #post-## -->

 		</main><!-- #main -->
    
 	</div><!-- #primary -->
 
<?php endif;
get_footer();
