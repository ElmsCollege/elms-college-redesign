<div id="carouselBlock" class="stories manual" <?php if(isset($attributes['block-background-color'])){echo 'style="background-color:"'.$attributes['block-background-color'].'"';};?>>
    <h2 class="field-student_stories_title trace"><?php echo $attributes['stories-title']; ?></h2>
    <ul class="story-feature ulreset">
      <?php foreach( $attributes['stories'] as $index=>$inner ): ?>
        <li class="story-full">
          <div class="story-image-container">
            <div class="story-image" style="background-image:url(<?php echo $inner['background-image']['url']; ?>)">
              <?php echo wp_get_attachment_image( $inner['background-image']['id'], 'full' ); ?>
            </div>
          </div>
            <div class="text-content" style="padding-top:0;<?php if(isset($inner['text-box-color'])){echo 'background-color:'.$inner['text-box-color'].'';};?>">
              <h3 class="field-title"><?php echo $inner['title']; ?></h3>
              <p class="field-excerpt"><?php echo $inner['body']; ?></p>
              <?php if ( isset( $inner['link-url'] )): ?>
                <a class="field-permalink" href="<?php echo $inner['link-url']; ?>"><?php echo $inner['link-text']; ?></a>
              <?php endif; ?>
            </div>
          <?php if ($index != 0) : ?>
            <div class="story-feature-nav nav-prev pointer" <?php if(isset($inner['text-box-color'])){echo 'style="background-color:"'.$inner['text-box-color'].'"';};?>>Previous</div>
          <?php endif; ?>
          <?php if ($index < sizeof($attributes['stories'])-1) : ?>
            <div class="story-feature-nav nav-next cursor" <?php if(isset($inner['text-box-color'])){echo 'style="background-color:"'.$inner['text-box-color'].'"';};?>>Next</div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php if (sizeof($attributes['stories']) > 1) : ?>
    <ul class="story-carousel pure-g ulreset">
      <?php foreach( $attributes['stories'] as $inner ): ?>
        <li class="story-tab pure-u-1" tabindex="0">
          <div class="story-image-container">
            <div class="story-image" style="background-image:url(<?php echo $inner['background-image']['url']; ?>)">
              <?php echo wp_get_attachment_image( $inner['background-image']['id'], 'medium' ); ?>
            </div>
          </div>
          <div class="text-content" <?php if(isset($inner['text-box-color'])){echo 'style="background-color:"'.$inner['text-box-color'].'"';};?>>
            <div class="field-title"><?php echo $inner['title']; ?></div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>
