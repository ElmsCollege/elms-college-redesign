<?php
global $fake_id;
global $post;
if (isset($fake_id)) {
  $post = get_post($fake_id);
  setup_postdata($post);
}

$student_stories_pre_title = get_field("student_stories_pre_title");
$student_stories_title = get_field("student_stories_title");
$student_stories = get_field("student_stories");

if (!empty($student_stories)):
?>

<div class="stories student">
  <div class="stories-inner">
    
    <h2 class="field-student_stories_title">
      <?php print($student_stories_title) ?>
    </h2>
    
    <ul class="story-feature">
      <?php foreach ($student_stories as $index=>$story) : 
          $theme = get_field("theme", $story);
        ?>
        <li class="story-full">
          
          <div class="story-image-container">
            <div class="story-image" style="<?php print_featured_image_style($story->ID) ?>">
              <?php print get_the_post_thumbnail($story->ID) ?>
            </div>
          </div>
          <div class="text-content">
            <div class="year-and-theme"><?php print($theme) ?></div>
            <h3 class="field-title"><?php print($story->post_title) ?></h3>
            <div class="field-excerpt"><?php print gs_get_the_excerpt($story->ID) ?></div>
            <div class="field-permalink"><a href="<?php print get_the_permalink($story) ?>">Learn More</a></div>
          </div>
          
          <?php if ($index != 0) : ?>
            <div class="story-feature-nav nav-prev pointer">Previous</div>
          <?php endif; ?>
          <?php if ($index < sizeof($student_stories)-1) : ?>
            <div class="story-feature-nav nav-next cursor">Next</div>
          <?php endif; ?>
          
        </li>
      <?php endforeach; ?>
    </ul>
    <?php if (sizeof($student_stories) > 1) : ?>
      <ul class="story-carousel">
        <?php foreach ($student_stories as $index=>$story) : 
            $theme = get_field("theme", $story);
          ?>
          <li class="story-tab pure-u-1 pure-u-md-1-4" tabindex="0">
            <div class="story-image" style="<?php print_featured_image_style($story->ID) ?>">
              <?php print get_the_post_thumbnail($story->ID) ?>
            </div>
            <div class="text-content">
              <div class="theme"><?php print($theme) ?></div>
              <div class="field-title"><span><?php print($story->post_title) ?></span></div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>
<?php endif;