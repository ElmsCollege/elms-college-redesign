<?php
/**
 * This template is used for the "blog" content type. Primarily used for the President's blog.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * Created in March 2019 by Ryan Millner
 */
$has_sidebar = gs_is_active_sidebar();
if ( is_active_sidebar( 'sidebar-1' ) ) {
  $has_sidebar = 1;
}

get_header(); ?>

<div class="section-heading">
      <h1 class="field-title">
	President's Blog
      </h1>
  </div>
	<div id="primary" class="content-area">
		<?php if ($has_sidebar) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

		<main id="main" class="site-main pure-u-1 pure-u-md-7-12 pure-u-lg-2-3" role="main">

			<?php
			while ( have_posts() ) : the_post();
			?>
				<h2 class="noMarginTop"><?php the_title(); ?></h2>
			<?php
				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

<br />
<p>Harry E. Dumay, Ph.D., MBA<br />
President of Elms College<br />
<span class="smallText"><?php $post_date = get_the_date( 'l, F j, Y' ); echo $post_date; ?></span></p>


		</main><!-- #main -->    
	</div><!-- #primary -->

<?php
get_footer();
