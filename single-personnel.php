<?php
/**
 * The template for displaying personnel pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

$has_sidebar = gs_is_active_sidebar();

$firstName = get_field("first_name");
$lastName = get_field("last_name");
if( get_field("accred") ){
	$accred = ', ' .get_field("accred");
};
if( get_field("job_title") ){
	$jobTitle = '<div><label>Title: </label> ' .get_field("job_title") .'</div>';
}
if( get_field("office") ){
	$office = '<div><label>Office: </label> ' .get_field("office") .'</div>';
};
if( get_field("phone_number") ){
	$phoneNum = get_field("phone_number");
	$phone = ' | '.do_shortcode('[encode link="tel:'.get_field("phone_number").'"]'.get_field("phone_number").'[/encode]');
};
$email = get_field("email_address");
$emailSuffix = get_field("email_suffix");

$image = get_field("directory_image");
$size = 'thumbnail';

$divisionLink = "Meet " .$firstName ."'s coworkers in the ";

get_header(); ?>

<style>
#photoInfo{
	display:flex;
	align-items:flex-start;
}
@media only screen and (max-width: 525px) {
	#photoInfo{
		flex-flow: wrap;
	}
}
</style>

	<?php
		get_template_part("template-parts/page-heading");
	?>

	<div id="primary" class="content-area">
    <?php if ($has_sidebar) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

        <main id="main" class="site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">

	<div id="photoInfo">
		<?php if( get_field('directory_image') ): ?>
			<?php echo wp_get_attachment_image( $image, $size ); ?>
		<?php endif; ?>
		<div>
			<?php 
				the_title();
				echo $jobTitle;
				echo $office;
			?>
			<div>
				<label>Contact Info:</label>
				<?php
                if( get_field('email_suffix') ){
                    echo do_shortcode('[encode link="mailto:'.$email.$emailSuffix .'"]'.$email.$emailSuffix .'[/encode]').$phone;
                } else {
                    echo do_shortcode('[encode link="mailto:'.$email.'@elms.edu"]'.$email.'@elms.edu[/encode]').$phone;
                }
                ?>
			</div>
			<div>
				<?php echo get_the_term_list( $post->ID, 'department', '<label>Department(s):</label> ', ', ' ); ?>
			</div>
			<div><?php echo get_the_term_list( $post->ID, 'division', $divisionLink, ', ' ); ?></div>
		</div>
	</div>


<?php if( have_rows('education') ): ?>
	<h3>Education</h3> 
	<table style="text-align:left;">
	<thead>
		<tr>
			<th>Degree</th>
			<th>University</th>
		</tr>
	</thead>
	<tbody>

    <?php while( have_rows('education') ): the_row(); ?>
	<tr>
		<td><?php the_sub_field('degree'); ?></td>
		<td><?php the_sub_field('university'); ?></td>
	</tr>        
    <?php endwhile; ?>
	</tbody>
	</table>

<?php endif; ?>

<?php if( '' !== get_post()->post_content ) { ?>
	<h3>Biography</h1>
	<?php
		while ( have_posts() ) : the_post();
	
			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
	?>
<?php } ?>

		</main><!-- #main -->    
	</div><!-- #primary -->

<?php
get_footer();
