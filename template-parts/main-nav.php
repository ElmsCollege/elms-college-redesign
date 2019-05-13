<div class="nav-trigger" aria-controls="primary-menu" aria-expanded="false">
  <span></span>
  <span></span>
  <span></span>
  <div class="open-label">Menu</div>
  <div class="close-label">Close</div>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">
  
  <?php /*<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gs_elms' ); ?></button> */ ?>
  <?php wp_nav_menu( array( 'theme_location' => 'special', 'menu_id' => 'special-menu' ) ); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  
</nav><!-- #site-navigation -->
<div id="menu-search-dropdown" style="display:none;">
  <?php get_search_form() ?>
</div>