<?php
/**
 * The template for displaying advertising landing pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

wp_enqueue_style( 'landing-page', get_template_directory_uri() . '/css/advertising-landing-page.css', array(), filemtime(get_template_directory() . '/css/advertising-landing-page.css') );

get_header("advertising");
?>

	<?php the_content(); ?>

<hr />
<?php
get_footer("advertising");
