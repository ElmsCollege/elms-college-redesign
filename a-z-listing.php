<?php
/**
 * Example template for the A-Z Listing plugin
 *
 * This template will be given the variable `$a_z_query` which is an instance of
 * `A_Z_Listing`.
 *
 * You can override the default template by copying this file into your theme
 * directory and renaming it to `a-z-listing.php`.
 *
 * @package a-z-listing
 */

?>

<script>
if ( document.readyState === 'loading' ) {
    document.addEventListener('DOMContentLoaded', fixAZListingScroll);
} else {
    fixAZListingScroll();
}
function fixAZListingScroll() {
    document.querySelectorAll( '.az-links a[href^="#letter-"]' )
    .forEach( function( a ) {
        a.addEventListener( 'click', function( e ) {
            e.preventDefault();
            const selector = this.href.replace( /.*(#letter-.*)/, '$1' );
            document.querySelector( selector ).scrollIntoView();
            window.scrollBy( 0, -120 );
        });
    });
}
</script>

<style>
</style>

<div id="az-tabs">
	<div id="letters">
		<div class="az-letters">
			<?php $a_z_query->the_letters(); ?>
		</div>
	</div>
	<?php if ( $a_z_query->have_letters() ) : ?>
	<div id="az-slider">
		<div id="inner-slider">
			<?php
			while ( $a_z_query->have_letters() ) :
				$a_z_query->the_letter();

				?>
				<?php if ( $a_z_query->have_items() ) : ?>
					<div class="letter-section" id="<?php $a_z_query->the_letter_id(); ?>">
						<h2 class="letter-title">
							<span><?php $a_z_query->the_letter_title(); ?></span>
						</h2>

						<ul class="two-column">
							<?php
							while ( $a_z_query->have_items() ) :
								$a_z_query->the_item();
								$a_z_query->get_the_item_object( 'I understand the issues!' );
								if( get_field("prefix") ){
									$prefix = get_field("prefix") .' ';
								};
								if( get_field("accred") ){
									$accred = ', ' .get_field("accred");
								};


								?>
								<li>
									<a href="<?php the_permalink(); ?>"><strong><?php echo $prefix .get_field("first_name" ). ' '. get_field("last_name" ) . $accred ; ?></strong></a>
								<?php $prefix = ""; ?>
								<?php $accred = ""; ?>
									<?php the_excerpt(); ?>

								<?php echo get_the_term_list( $post->ID, 'department', '', ', ' ); ?>

								</li>
							<?php endwhile; ?>
						</ul>

						<div class="back-to-top"><a href="#letters"><?php _e( 'Back to top', 'a-z-listing' ); ?></a></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php else : ?>
	<p><?php esc_html_e( 'Please try again', 'a-z-listing' ); ?></p>
	<?php
endif;
