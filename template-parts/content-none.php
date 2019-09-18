<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

?>

<section class="no-results not-found">

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gs_elms' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="centerText"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gs_elms' ); ?></p>
<p>
	<form role="search" method="get" class="search-form" action="/?">
		<label>
			<span class="screen-reader-text">Search for:</span>
			<input type="search" class="search-field centerText" placeholder="What are you trying to find?" value="" name="s" title="Search for:" style="display:block;margin:5px auto;width:95%;font-size:18px;"/>
		</label>
		<input type="submit" class="ninjaSubmit" value="Search Again" />
	</form>
</p>

			<?php

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gs_elms' ); ?></p>
			<?php


		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
