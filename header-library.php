<?php
/**
 * The header for our library pages.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */
wp_enqueue_style( 'library-stylesheet', get_stylesheet_directory_uri() . '/css/library.css', '1.0.0', 'all' );

add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'mobile-or-library' ) );
});

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="preconnect" href="https://elms.elluciancrmrecruit.com/">

<?php wp_head(); ?>
<?php the_field("head_code", "option") ?>
</head>

<body id="libraryPage" <?php body_class(); ?>>
<?php the_field("body_code", "option") ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elms-college-redesign' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="homepagelinks">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( real_homepage_link() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="/" rel="home" alt="Return to homepage">Elms College</a></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
			<div class="specialsectionlink"><a href="/library/" title="Return to library homepage">Alumnae Library</a></div>
		</div>
		<?php get_template_part("template-parts/main-nav")?>
	</header><!-- #masthead -->
  
	<div id="content" class="site-content">
    <?php get_template_part("template-parts/alert-bar")?>
    <div class="special-section-nav">
      <?php wp_nav_menu( array( 'theme_location' => 'library', 'menu_id' => 'special-section-menu', 'menu_class' => 'flexRowNowrapStart justifyCenter', 'container_class' => 'special-nav-container' ) ); ?>
    </div>