<?php
global $fake_id;
global $post;
if (isset($fake_id)) {
  $post = get_post($fake_id);
}
else {
  $fake_id = $post->ID;
}

setup_postdata($post);
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elms_College_Redesign
 */
$sidebar_menu_items = get_field("sidebar_menu_items", $fake_id);

/*
$event_sources = get_field("event_sources", $fake_id);
$events = false;
if ($event_sources) {
  $events = get_upcoming_events(3, $event_sources);
}
*/

$generated_menu_items = array();
if ($post->post_parent == 0) {
  $generated_menu_items[]= $post->ID;
}
else {
  $generated_menu_items[]= $post->post_parent;
  $generated_menu_items[]= $post->ID;
  $kids = new WP_Query(
    array(
      "post_parent" => $post->ID,
      'post_type' => "page",
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    )
  );
  //var_dump($siblings);
  foreach ($kids->posts as $sibling) {
    $generated_menu_items[]= $sibling->ID;
  }
}

//the_widget( "advanced_sidebar_menu_page", $sidebar_args, array("before_widget" =>"", "after_widget" => "", "before_title" =>"", "after_title" => ""));
?>
<aside class="page-sidebar pure-u-1 pure-u-md-5-12 pure-u-lg-1-3" role="complementary">

<div id="debugger" style="display: none;">
  event sources
  <?php var_dump($event_sources)?>
  events
  <?php var_dump($events)?>
</div>

<?php if(!is_tax()) :?>

<?php if ( !empty($generated_menu_items) ) : ?>
<ul id="mainLeftMenu" class="parent-sidebar-menu">
  <?php foreach ($generated_menu_items as $item) :

    $text = get_the_title($item);
    if (!empty($sidebar_menu_items)) {
      foreach ($sidebar_menu_items as $sideitem) {
        if ($sideitem["link_type"] == "internal" && isset($sideitem["internal_link"]->ID) && $item == $sideitem["internal_link"]->ID && !empty($sideitem["link_text"])) {
          $text = $sideitem["link_text"];
        }
      }
    }
    ?>
    <li class="page_item <?php if ($item == get_the_ID()) { print "current_page_item"; } ?>">
      <a href="<?php print get_the_permalink($item)?>"><?php print $text ?></a>
    </li>
  <?php  endforeach; ?>
</ul>
<?php  endif; ?>
	
<ul class="field-sidebar-menu-items">
  <?php if (!empty($sidebar_menu_items)) :
    foreach ($sidebar_menu_items as $index=>$item) :
    if ($item["link_type"] == "internal" && isset($item["internal_link"]->ID)) {
      $link = get_the_permalink($item["internal_link"]->ID);
      $text = $item["link_text"];
      if (!$text || $text == "") {
        $text = $item["internal_link"]->post_title;
      }
    }
    elseif (isset($item["external_link"])) { // external
      $link = $item["external_link"];
      $text = $item["link_text"];
    }
    ?>
    <li class="page_item">
      <a class="permalink" href="<?php print $link ?>"><?php print $text ?></a>
    </li>
  <?php  endforeach; endif; ?>
</ul>

<?php if ($events) : ?>
<div class="field-related-events">
  <h3>Events</h3>
  <ul class="ulreset">
    <?php foreach ($events as $index=>$event) : ?>
      <li>
        <div class="times">
          <span class="start-time"><?php print str_ireplace(":00", "", tribe_get_start_date($event, false, "M d, g:i A"))?></span> -
          <span class="end-time"><?php print str_ireplace(tribe_get_start_date($event, false, "M d,"), "", str_ireplace(":00", "", tribe_get_end_date($event, false, "M d, g:i A"))) ?></span>
        </div>
        <h4 class="field-title"><?php print mb_strimwidth($event->post_title, 0, 50, '...') ?></h4>
        <a class="permalink" href="<?php print get_the_permalink($event) ?>">Read More</a>
      </li>

    <?php endforeach; ?>
  </ul>
  <?php if (sizeof($events) > 1) : ?>
    <a href="#" class="show-more">See More Events</a>
    <a href="#" class="show-less">See Fewer Events</a>
  <?php endif; ?>
</div>
<?php endif; ?>
<?php

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>
<?php //ends is_tax()
endif; ?>
<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
