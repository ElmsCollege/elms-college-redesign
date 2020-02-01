<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Elms_College_Redesign
 */

get_header(); ?>

    <div id="textHeading" class="section-heading">
		<h1 class="field-title"><?php the_field('not_found_title', 'option'); ?></h1>
	</div>

 	<div id="primary" class="content-area pure-g">
 		<main id="main" class="site-main pure-u-1 standalone" role="main">

			<section class="error-404 not-found">

				<div class="page-content centerText">
					<?php the_field('not_found_message', 'option'); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
