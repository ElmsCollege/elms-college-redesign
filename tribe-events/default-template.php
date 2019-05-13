<?php
/**
 * Default Events Template edited by Ryan Millner in 2019
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}



get_header(); ?>

<?php if ( is_single() ) : ?>
  <div class="section-heading" style="<?php print_featured_image_style($event_id) ?>">
      <h1 class="field-title no-pre-title">
        <?php the_title(); ?>
      </h1>
  </div> 
<?php endif ; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <div class="content entry-content">
      <article class="article-primary">
        <div class="article-entry">
          <?php tribe_events_before_html(); ?>
        	<?php tribe_get_view(); ?>
        	<?php tribe_events_after_html(); ?>
        </div><!-- /.article-entry -->
      </article><!-- /.article-primary -->
    </div><!-- /.content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
