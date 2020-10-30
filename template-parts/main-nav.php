<div class="nav-trigger" aria-controls="primary-menu" aria-expanded="false">
  <div class="open-label"></div>
  <div class="close-label"><span>Close</span></div>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">

<?php	
/* We are switching to global blog menu for local,
 * it will be easy for admin to add or delete menu which apply across to the site
 */
global $blog_id;
$current_blog_id = $blog_id;
switch_to_blog(1);
    wp_nav_menu( array(
        'theme_location'	=> 'primary',
        'menu_id'			=> 'primary-menu',
		'menu_class'		=> '',
		'item_spacing'		=> 'discard',
    ) );

switch_to_blog($current_blog_id); 
?>
</nav><!-- #site-navigation -->

<div class="menu-special-menu-container">
    <ul id="special-menu" class="menu">
        <li class="menu-item menu-item-type-post_type menu-item-object-page search-item">
            <a href="/search/">
                <span class="search-icon">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </span>
                <span class="search-realtext">Search</span>
            </a>
            <form id="menu-item-search" role="search" method="get" class="search-form" action="/?">
                <label> <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="What are you looking for?" value="" name="s" title="Search for:" />
                    <button type="submit" class="search-submit" value="Search" aria-label="Search form submit button"> <i class="fas fa-search" aria-hidden="true"></i> </button>
                </label>
            </form>
        </li>
        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9764">
            <a id="interested-in-applying" href="https://elms.elluciancrmrecruit.com/Apply/Account/Login">Apply</a>
            <a id="link-give" href="https://www.elms.edu/alumni/support-elms/make-a-gift/">Give</a>
        </li>
    </ul>
</div>
