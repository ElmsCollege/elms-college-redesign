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
	jQuery( document ).ready( function () {
		jQuery( "#departmentFilter" ).change( function () {
			var departmentValue = jQuery( "#departmentFilter" ).val();
			jQuery( "#az-slider li" ).hide();
			if ( departmentValue == "showAllDepartments" ) {
				jQuery( "#resetFilter" ).hide();
				jQuery( "#az-slider li" ).css( "display", "list-item" );
			} else {
				jQuery( "#resetFilter, #az-slider li." + departmentValue ).show();
			}
		} );
		jQuery( "#resetFilter" ).click( function () {
			jQuery( "#az-slider li" ).css( "display", "list-item" );
			jQuery( "#departmentFilter" ).val( "showAllDepartments" );
		} );
	} );
</script>

<?php
global $wp;
$current_slug = add_query_arg( array(), $wp->request );

if ( $current_slug == "directory" ): ?>

<?php

function build_select_list( $taxonomies, $args ) {
	$terms = get_terms( $taxonomies, $args );
	foreach ( $terms as $term ) {
		$output .= '<option value="' . $term->slug . '"> ' . $term->name . '</option>';
	}
	return $output;
}
?>
<div class="filterList smallText">
	<label for="departmentFilter">Filter by Department:</label>
	<select id="departmentFilter">
		<option value="showAllDepartments">Show all departments</option>
		<?php echo build_select_list('department', $args = array('hide_empty'=>true)); ?>
	</select>
	<button type="button" id="resetFilter" class="greenButton" style="display:none;">Reset Filter</button>
</div>
<?php endif ?> <!-- end current_slug==directory -->

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
			while ( $a_z_query->have_letters() ):
				$a_z_query->the_letter();

			?>
			<?php if ( $a_z_query->have_items() ) : ?>
			<div class="letter-section" id="<?php $a_z_query->the_letter_id(); ?>">
				<h2 class="letter-title">
							<span><?php $a_z_query->the_letter_title(); ?></span>
						</h2>

				<ul class="two-column normalText">
					<?php
					while ( $a_z_query->have_items() ):
						$a_z_query->the_item();
					$a_z_query->get_the_item_object( 'I understand the issues!' );
					if ( get_field( "prefix" ) ) {
						$prefix = get_field( "prefix" ) . ' ';
					};
					if ( get_field( "accred" ) ) {
						$accred = ', ' . get_field( "accred" );
					};
					?>

					<?php $terms = get_the_terms( get_the_ID(), 'department' );
								if ( $terms && ! is_wp_error( $terms ) ) : 
 
									$department_links = array();
 									foreach ( $terms as $term ) {
										$department_links[] = $term->slug;
									}
									$in_department = join( " ", $department_links );
								?>

					<li class="<?php printf( esc_html__( '%s','textdomain' ), esc_html( $in_department ) ); ?>">
						<?php else: ?>
						<li>
							<?php endif; ?>
							
						<?php if($current_slug == "directory") : ?>

							<a href="<?php the_permalink(); ?>">
								<h4 class="noMargins">
									<?php echo $prefix .get_field("first_name" ). ' '. get_field("last_name" ) . $accred ; ?>
								</h4>
							</a>
							<?php $prefix = ""; ?>
							<?php $accred = ""; ?>
							<?php the_excerpt(); ?>
							
						<? else: //current slug == directory ?>
							<style>
								#az-slider li img{padding-right:15px;float:left;}
								#az-slider li .contact p,#az-slider li .collapseomatic_content p{padding-left:0px;}
								#az-slider li .contact{float:left;}
							</style>
		<?php if( get_field('directory_image') ): ?>
			<?php echo wp_get_attachment_image( get_field('directory_image'), 'thumbnail' ); ?>
		<?php endif; ?>

							<div class="contact">
							<a href="<?php the_permalink(); ?>">
								<h4 class="noMargins">
									<?php echo $prefix .get_field("first_name" ). ' '. get_field("last_name" ) . $accred ; ?>
								</h4>
							</a>
							<?php $prefix = ""; ?>
							<?php $accred = ""; ?>
							<?php the_excerpt(); ?>
							<?php
//							if( '' !== get_post()->post_content ) {
//								echo do_shortcode("[expand title='Quick Bio' swaptitle=' ']" . //get_first_paragraph() . "[/expand]");
//							}
								echo '<span class="collapseomatic" title="Fast Monkey" id="'.get_field("last_name").'">';
							?>
							</div>
							<div id="target-<?php echo get_field('last_name'); ?>" class="collapseomatic_content">
								<?php get_first_paragraph(); ?>
							</div>
							<a href="<?php the_permalink(); ?>">Learn more about <?php echo $prefix .get_field("first_name" ). ' '. get_field("last_name" ); ?></a>
						<? endif; //current slug == directory?>
						</li>
						<?php endwhile; ?>

				</ul>

				<div class="back-to-top">
					<a href="#letters">
						<?php _e( 'Back to top', 'a-z-listing' ); ?>
					</a>
				</div>
			</div>
			<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php else : ?>
<p>
	<?php esc_html_e( 'Please try a different department', 'a-z-listing' ); ?>
</p>
<?php
endif;