<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */

//redirect_if_homepage_cookie();
$blog_id = get_current_blog_id();
if( 2 == $blog_id){//commencement subsite
	wp_dequeue_style('gs_elms-style');
	wp_enqueue_style( 'gs_elms-style', get_stylesheet_uri(), array(), '40' );
	wp_enqueue_style( 'commencement', get_template_directory_uri() . '/css/commencement.css', array(), '1' );
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
if ((tribe_is_event() || tribe_is_event_category() || tribe_is_in_main_loop() || tribe_is_view() || 'tribe_events' == get_post_type()) && !is_singular( )) :
?>
<meta name="description" content="<?php the_field("event_description", "option")?>">
<?php endif; ?>

<?php wp_head(); ?>
<?php the_field("head_code", "option") ?>
</head>

<body <?php body_class(); ?>>
<?php the_field("body_code", "option") ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gs_elms' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<?php get_template_part("template-parts/main-nav")?>
	</header><!-- #masthead -->
  
	<div id="content" class="site-content">
    <?php get_template_part("template-parts/alert-bar")?>
