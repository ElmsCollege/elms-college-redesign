<?php
/*
Template Name: Search Page
*/

get_template_part("template-parts/header-selector");
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php get_search_form(); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();