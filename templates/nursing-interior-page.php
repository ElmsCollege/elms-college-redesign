<?php
/**
 * Template Name: Nursing Default Template
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();
get_header("nursing"); ?>

	<style>
	.section-heading{
		<?php print_featured_image_style($post->ID) ?>
	}
	</style>


  <div class="section-heading">
      <h1 class="field-title <?php if (!$main_pre_title): ?>no-pre-title<?php endif;?>">
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
		<main id="main" class="site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
    <?php if ($has_sidebar) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>
    
	</div><!-- #primary -->

<?php
get_footer("nursing");
