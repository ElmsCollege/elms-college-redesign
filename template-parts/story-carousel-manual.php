<?php

$title = get_field("stories_title");
$stories = get_field("stories");

if (!empty($stories)):
?>

<div class="stories manual">
  <div class="stories-inner">
    <h2 class="field-student_stories_title">
      <?php print($title) ?>
    </h2>
    
    <ul class="story-feature">
      <?php foreach ($stories as $index=>$story) : 
        if ($story["link_type"] == "internal") {
          $story_link = get_the_permalink($story["internal_link"]);
        }
        else {
          $story_link = $story["external_link"];
        }
        ?>
        <li class="story-full">
          
          <div class="story-image-container">
            <div class="story-image" style=" <?php print_acf_image_as_background_style($story["background_new"]) ?>">
              <img src="<?php print $story["background_new"]["url"] ?>" alt="<?php print $story["background_new"]["alt"] ?>" />
            </div>
          </div>
          <div class="text-content">
            <h3 class="field-title"><?php print($story["title"]) ?></h3>
            <div class="field-excerpt"><?php print($story["body"]) ?></div>
            <?php if (!empty($story["link_text"])) : ?>
              <div class="field-permalink"><a href="<?php print $story_link ?>"><?php print($story["link_text"]) ?></a></div>
            <?php endif; ?>
            <!--<div class="show-more"><a href="#" >Show More</a></div>-->
          </div>

          <?php if ($index != 0) : ?>
            <div class="story-feature-nav nav-prev pointer">Previous</div>
          <?php endif; ?>
          <?php if ($index < sizeof($stories)-1) : ?>
            <div class="story-feature-nav nav-next cursor">Next</div>
          <?php endif; ?>

        </li>
      <?php endforeach; ?>
    </ul>
    
    <?php if (sizeof($stories) > 1) : ?>
    <ul class="story-carousel pure-g">
      <?php foreach ($stories as $index=>$story) : 
        ?>
        <li class="story-tab pure-u-1 pure-u-md-1-4" tabindex="0">
          <div class="story-image" style="<?php print_acf_image_as_background_style($story["background_new"]) ?>">
            <img src="<?php print $story["background_new"]["url"] ?>" alt="<?php print $story["background_new"]["alt"] ?>" />
          </div>
          <div class="text-content">
            <div class="field-title"><?php print($story["title"]) ?></div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  </div>
</div>
<?php endif;