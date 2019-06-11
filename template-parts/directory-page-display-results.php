<?php
/**
controls the directory results on /directory
**/
?>
<ul class="two-column">
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
			<a href="<?php the_permalink(); ?>">
				<h4 class="noMargins">
					<?php echo $prefix .get_field("first_name" ). ' '. get_field("last_name" ) . $accred ; ?>
				</h4>
			</a>
			<?php $prefix = ""; ?>
			<?php $accred = ""; ?>
			<?php the_excerpt(); ?>
		</li>
		<?php endwhile; ?>
</ul>