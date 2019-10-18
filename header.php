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

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="preconnect" href="https://elms.elluciancrmrecruit.com/">

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

	<header id="masthead" class="site-header flexRowNowrapCenter spaceBetween" role="banner">
		<div class="site-branding">
			<a href="https://www.elms.edu/" rel="home" alt="Return to homepage">
				<image src="/wp-content/themes/gs_elms/images/logo-main.svg" />
			</a>
		</div><!-- .site-branding -->

		<?php get_template_part("template-parts/main-nav")?>
	</header><!-- #masthead -->
  
	<div id="content" class="site-content">
    <?php get_template_part("template-parts/alert-bar")?>
