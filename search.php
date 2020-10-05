<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Elms_College_Redesign
 */

get_header();
?>
    <div id="textHeading" class="section-heading">
		<h1 class="field-title">
			Search Results:
		</h1>
	</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main pure-u-1 standalone" role="main">
      
      
		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			switch_to_blog($post->blog_id);

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
			restore_current_blog();
			endwhile;

			the_posts_navigation(array("prev_text" => "Show More", "next_text" => "Show Less"));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
