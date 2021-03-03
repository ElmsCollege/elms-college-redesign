<div id="imageLinkColumns" class="calls-to-action">
  <?php foreach( $attributes['column'] as $inner ): ?>
  <div class="column">
    <div class="cta-top-div"> <a class="permalink" href="<?php echo esc_url( $inner['button-target'] ); ?>"><?php echo $inner['button-text']; ?></a> </div>
    <div style="position: relative"> <a href="<?php echo esc_url( $inner['button-target'] ); ?>">
      <div class="image-tint">
        <p><?php echo $inner['hover-text']; ?></p>
      </div>
      <?php
      if ( isset( $inner[ 'image' ][ 'id' ] ) ) {
        echo wp_get_attachment_image( $inner[ 'image' ][ 'id' ], 'large', '', [ 'class' => 'cta-image' ] );
      }
      ?>
      </a> </div>
  </div>
  <?php endforeach; ?>
</div>
<script>
  if (window.innerWidth > 480) {
	  window.onload = setHeights;
		window.onresize = setHeights;
		function setHeights() {
		  var items = document.getElementsByClassName("cta-top-div")
			var max = 0;
			var marginTop;
				
			for (var i = 0; i < items.length; i++) {
				if (items[i].offsetHeight > max)
			    max = items[i].offsetHeight;
			}
			for (var i = 0; i < items.length; i++) {
				items[i].style.height = "" + max + "px"
				marginTop = (items[i].offsetHeight - items[i].firstElementChild.offsetHeight)/2 + "px";
				items[i].firstElementChild.style.marginTop = marginTop;
			}
		}
	}
</script> 
