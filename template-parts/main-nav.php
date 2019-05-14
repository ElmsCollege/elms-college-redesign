<div class="nav-trigger" aria-controls="primary-menu" aria-expanded="false">
  <span></span>
  <span></span>
  <span></span>
  <div class="open-label">Menu</div>
  <div class="close-label">Close</div>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">
  
  <?php /*<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gs_elms' ); ?></button> */ ?>

<div class="menu-special-menu-container"><ul id="special-menu" class="menu"><li id="menu-item-2462" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2462 search-item"><a href="https://elms-staging.r6a5yukd-liquidwebsites.com/search/"><span class="search-realtext">Search</span><span class="search-icon"></span></a><ul class="sub-menu for-search"><li id="menu-item-search" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-search"><div id="menu-search-dropdown" style="">
  <form role="search" method="get" class="search-form" action="/?">
	<label>
		<span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="What are you looking for?" value="" name="s" title="Search for:">
	</label>
	<input type="submit" class="search-submit" value="Search">
</form></div></li></ul></li>
<li id="menu-item-9764" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9764"><a id="interested-in-applying" href="https://www.elms.edu/interested-in-applying/" style="">Apply</a><a id="link-give" href="https://www.elms.edu/alumni/support-elms/make-a-gift/" style="">Give</a></li>
</ul></div>

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  
</nav><!-- #site-navigation -->
<div id="menu-search-dropdown" style="display:none;">
  <?php get_search_form() ?>
</div>