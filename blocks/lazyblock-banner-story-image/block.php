  <?php
    if ( isset( $attributes['story-image']['id'] ) ) {
      echo wp_get_attachment_image($attributes['story-image']['id'], 'full', '', array( 'class' => 'banner-story-image') );
    }
  ?>
  <?php if ($attributes['story-body']) : ?>
    <div class="inner-padding greenBGwhiteText green-arrow-border-top">
      <h2 class="noMarginTop">
        <?php echo($attributes['story-title']); ?>
      </h2>
      <?php echo ($attributes['story-body']); ?>
    </div>
  <?php endif; ?> 
  <?php if ($attributes['link']) : ?>
    <div class="goldBGwhiteText has-text-align-center">
      <a class="permalink" href="<?php echo($attributes['link']) ?>"><?php echo($attributes['link-text']) ?> <i class="fas fa-arrow-circle-right" aria-hidden="true"></i></a>
    </div>
  <?php endif; ?> 