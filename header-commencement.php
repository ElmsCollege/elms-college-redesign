<?php
/**
 * The header for the commencement subdomain.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'mobile-or-library' ) );
});

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php the_field("head_code", "option") ?>
</head>

<body id="commencementPage" <?php body_class(); ?>>
<?php the_field("body_code", "option") ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gs_elms' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="specialLogo">
			<div class="site-branding">
				<a href="https://www.elms.edu/" rel="home" alt="Return to homepage">
					<image id="headerLogo" src="/wp-content/themes/gs_elms/images/logo-main.svg" />
				</a>
			</div><!-- .site-branding -->
			<div class="specialsectionlink"><a href="https://commencement.elms.edu/" title="Return to Commencement Homepage">Commencement</a></div>
		</div>
		<?php get_template_part("template-parts/main-nav")?>
	</header><!-- #masthead -->
  
	<div id="content" class="site-content">
    <?php get_template_part("template-parts/alert-bar")?>
    <div class="special-section-nav">
      <?php wp_nav_menu( array( 'theme_location' => 'special-nav', 'menu_id' => 'special-section-menu', 'menu_class' => 'ulreset flexRowNowrapStart justifyCenter', 'container_class' => 'special-nav-container' ) ); ?>
    </div>