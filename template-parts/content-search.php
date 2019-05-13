<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h3 class="field-title">
		<a href="<?php print get_the_permalink($post->ID)?>"><?php the_title()?></a>
	</h3><!-- .entry-title -->
	<div class="entry-summary">
		<?php print (gs_get_the_excerpt($post->ID)); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
