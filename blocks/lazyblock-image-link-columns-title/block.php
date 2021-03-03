<div id="imageLinkColumnsHover" class="calls-to-action">
	<?php foreach( $attributes['column'] as $inner ): ?>
	<div class="column">
		<?php if ( isset( $inner[ 'image' ][ 'id' ] ) ) : ?>
			<div class="cta-title-container flexColNowrap justifyCenter">
				<div class="cta-title-inner">
					<h3 class="field-title"><?php echo $inner['title-text'] ?></h3>
				</div>
			</div>
		<?php endif; ?>
		<div class="column-header">
			<a class="permalink" href="<?php echo esc_url( $inner['button-target'] ); ?>"><?php echo $inner['button-text']; ?></a>
		</div>
  </div>
  <?php endforeach; ?>
</div>
<script>
  if (window.innerWidth > 480) {
	  window.onload = setHeights;
		window.onresize = setHeights;
		function setHeights() {
		  var items = document.getElementsByClassName("column-header")
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
