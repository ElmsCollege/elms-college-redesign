<?php
/**
 * Template Name: 2019 Alternating Text and Image template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();

$permalink = get_permalink();
if(strpos($permalink,'nursing')){
	get_header("nursing");
} else{
	get_header();
}
the_post();

get_template_part("template-parts/page-heading");
?>

<div id="primary" class="content-area pure-g">

	<main id="main" class="program-page-main site-main pure-u-1 pure-u-md-7-12 pure-u-lg-2-3" role="main">

		<div class="field-content">
			<?php the_content() ?>
			<ul class="template embedDirectory-image ulreset">
			<?php
				if( have_rows("entry_container") ):
					while ( have_rows("entry_container") ) : the_row();
						$image = get_sub_field("image");
						$size = "medium";

						echo "<li class='flexRowWrapStart spaceBetween'><div class='listText'><strong>";
						the_sub_field("name");
						echo "</strong><br />";
						if( get_sub_field("degree_program") ){
							the_sub_field("degree_program");
							echo "<br />";
						};
						if( get_sub_field("position") ){
							echo "<em>";
							the_sub_field("position");
							echo "</em>";
						};
						the_sub_field("text");
						echo "</div>";
						echo wp_get_attachment_image( $image, $size );
						echo "</li>";

					endwhile;
				endif;
			?>
			</ul>
		</div>

	</main><!-- #main -->

	<?php if ($has_sidebar) : ?>
			<?php get_sidebar(); ?>
	<?php endif; ?>

</div><!-- #primary -->

<?php
get_footer();
