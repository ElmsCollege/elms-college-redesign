
<div class="short-content">
  <div class="field-background" style=" <?php print_acf_image_as_background_style($short_content_background) ?>">&nbsp;</div>
  <div class="short-content-inner pure-g">
    <?php foreach ($short_content as $index=>$short) : ?>
    <div class="short pure-u-1 <?php if (sizeof($short_content) != 1) {echo 'pure-u-lg-1-2';}?>">
      <h3><?php print($short["title"]) ?></h3>
      <div class="field-body"><?php print($short["body"]) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
