<?php
/**
 * Template Name: Interior Landing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */



get_header();
while ( have_posts() ) : the_post();

  $opening_menu = get_field("opening_menu");
  
  $quick_facts = get_field("quick_facts");
  
  $stories_title = get_field("stories_title");
  $stories = get_field("stories");
  
  $short_content = get_field("short_content");
  $short_content_background = get_field("short_content_background_new");

  $student_stories = get_field("student_stories");
?>

	<style>
	.section-heading{
		<?php print_featured_image_style($post->ID) ?>
	}
	</style>
	
  <div class="section-heading">
      <h1 class="field-title <?php if (!$main_pre_title): ?>no-pre-title<?php endif;?>">
        <?php the_title() ?>
      </h1>
  </div>

      <?php if (!empty($opening_menu)) : ?>
        <ul class="opening-menu">
          <?php
            foreach ($opening_menu as $index=>$menu_item) : 
            if ($menu_item["link_type"] == "internal" && !empty($menu_item["internal_link"])) {
              $link = get_the_permalink($menu_item["internal_link"]);
              $text = $menu_item["link_text"];
              if (!$text || $text == "") {
                $text = $menu_item["internal_link"]->post_title;
              }
            }
            elseif (isset($menu_item["external_link"])) { // external
              $link = $menu_item["external_link"];
              $text = $menu_item["link_text"];
            }
            ?>
            <li class="menu-item">
              <a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a>
            </li>
          <?php  endforeach; ?>
        </ul>
      <?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      
		<div class="body-text">
	      		<?php the_content() ?>
		</div>

      <div class="section-mission_statement">
        <div class="quick-facts-inner pure-g">
          <?php foreach ($quick_facts as $index=>$fact) : ?>
            <div class="quick-fact pure-u-1 pure-u-md-1-3">
              <h3 class="field-title"><?php print($fact["title"]) ?></h3>
              <div class="field-body"><?php print($fact["body"]) ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      
      <?php 
	if (!empty($student_stories)) {
		get_template_part("template-parts/story-carousel", "student");
	} else {
		get_template_part("template-parts/story-carousel", "manual");
	}
      ?>
      
      <?php if (!empty($short_content)) : ?>
        <div class="short-content">
          <div class="field-background" style=" <?php print_acf_image_as_background_style($short_content_background) ?>">&nbsp;</div>
          <div class="short-content-inner pure-g">
            <?php foreach ($short_content as $index=>$short) : ?>
              <div class="short pure-u-1 <?php if (sizeof($short_content) != 1) {echo 'pure-u-lg-1-2';}?>">
                <h3 class="field-title"><?php print($short["title"]) ?></h3>
                <div class="field-body"><?php print($short["body"]) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        
        </div>
      <?php endif;  ?>
      
      
      
      
      
      

		</main><!-- #main -->
	</div><!-- #primary -->
      <?php
			endwhile; // End of the loop.
			?>
<?php
get_footer();
