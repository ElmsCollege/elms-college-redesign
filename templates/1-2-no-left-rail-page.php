<?php
/**
 * Template Name: 1-2, no left rail
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elms_College_Redesign
 */

$permalink = get_permalink();
if(strpos($permalink,'nursing')){
	get_header("nursing");
} else{
	get_header();
}
the_post();
?>

<div id="pageHeading" class="section-heading">
	<h1 class="field-title">
		<?php 
			if (get_the_title()) { the_title(); }
		?>
	</h1>
</div>
<div id="primary" class="content-area pure-g">

	<main id="main" class="site-main pure-u-1 standalone" role="main">

		<div class="field-content flexRowWrapStart spaceBetween">
			<div class="fullWidth">
				<?php if( get_field('commencement_youtube_link') ){
					the_field('commencement_youtube_link');
				} else {
					the_field('commencement_week_schedule');
				}?>
			</div>
			<div class="flexHalf">
				<?php if( get_field('commencement_speaker_bio') ){
					the_field('commencement_speaker_bio');
				}?>
			</div>
			<div class="flexHalf">
				<?php if( get_field('class_demographics') ){
					the_field('class_demographics');
				}?>
			</div>
		</div>

	</main><!-- #main -->

</div><!-- #primary -->

<?php
get_footer();
