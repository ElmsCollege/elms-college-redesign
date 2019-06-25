<?php
/**
 * Template Name: Library Interior Page
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();
get_header("library");

get_template_part("template-parts/page-heading");
?>
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
get_footer("library");
