<?php
/**
 * Quick Info block
 *
 * created by Ryan Millner
**/
?>
<div class="pure-g quick-info-container">
	<p>Quick info block</p>
  <?php if ($quick_info_image) : ?>
    <div class="field-sidebar-image pure-u-1 pure-u-lg-1-2" style="<?php print_acf_image_as_background_style($quick_info_image) ?>">
      <img src="<?php print $quick_info_image["url"] ?>" alt="<?php print $quick_info_image["alt"] ?>">
    </div>
  <?php endif; ?>
  <div id="quickinfo" class="quick-info">
    <h2>Quick Info</h2>
    <div class="quick-info-inner">
      <?php if ($required_credits): ?>
        <div class="field-required-credits">
          <h3 class="noMarginTop">Required Credits</h3>
          <p class="noMargins"><?php print $required_credits ?></p>
        </div>
      <?php endif; ?>
      <?php if ($degree_option): ?>
        <div class="field-degree-option">
          <h3 class="noMarginTop">Degree Option</h3>
          <p class="noMargins"><?php print $degree_option ?></p>
        </div>
      <?php endif; ?>
      <?php if ($program_formats): ?>
        <div class="field-program-formats">
          <h3 class="noMarginTop">Program Formats</h3>
          <p class="noMargins"><?php print $program_formats ?></p>
        </div>
      <?php endif; ?>
      <?php if (!empty($misc_quick_info)): ?>
        <div class="field-misc-quick-info">
          <p class="noMargins"><?php print $misc_quick_info ?></p>
        </div>
      <?php 
          endif;
      ?>
    </div><!-- end quick-info-inner -->
  </div><!-- end quickInfo/quick-info -->
</div><!-- pure-g quick-info-container -->