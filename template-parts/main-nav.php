<div class="nav-trigger" aria-controls="primary-menu" aria-expanded="false">
  <span></span>
  <span></span>
  <span></span>
  <div class="open-label">Menu</div>
  <div class="close-label">Close</div>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">

<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  
<div class="menu-special-menu-container">
	<ul id="special-menu" class="menu">
		<li class="menu-item menu-item-type-post_type menu-item-object-page search-item">
			<a href="/search/">
				<span class="search-realtext">Search</span>
				<span class="search-icon">
					<i class="fas fa-search" aria-hidden="true"></i>
				</span>
			</a>
			<ul class="sub-menu for-search">
				<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-search">
					<div id="menu-search-dropdown">
						<form role="search" method="get" class="search-form" action="/?">
							<label>
								<span class="screen-reader-text">Search for:</span>
								<input type="search" class="search-field" placeholder="What are you looking for?" value="" name="s" title="Search for:">
							</label>
							<button type="submit" class="search-submit" value="Search" aria-label="Search form submit button">
								<i class="fas fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</li>
			</ul>
		</li>
		<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9764">
			<a id="interested-in-applying" href="https://www.elms.edu/interested-in-applying/">Apply</a>
			<a id="link-give" href="https://www.elms.edu/alumni/support-elms/make-a-gift/">Give</a>
		</li>
	</ul>
</div>

</nav><!-- #site-navigation -->
<div id="menu-search-dropdown" style="display:none;">
  <?php get_search_form() ?>
</div>