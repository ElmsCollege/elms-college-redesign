<div class="linkColumns hover">
	<?php foreach( $attributes['column'] as $inner ): ?>
	<div class="column">
		<div class="column-endcap">
			<a class="permalink" href="<?php echo esc_url( $inner['button-target'] ); ?>"><?php echo $inner['button-text']; ?></a>
		</div>
		<?php if ( isset( $inner[ 'image' ][ 'id' ] ) ) : ?>
		<div style="position: relative">
			<a href="<?php echo esc_url( $inner['button-target'] ); ?>">
				<div class="image-tint">
					<?php if($inner['hover-text']) : ?>
						<p><?php echo $inner['hover-text']; ?></p>
					<?php endif; ?>
				</div>
				<?php echo wp_get_attachment_image( $inner[ 'image' ][ 'id' ], 'large', '', [ 'class' => 'column-image' ] ); ?>
			</a>
		</div>
		<?php endif; ?>
  </div>
  <?php endforeach; ?>
</div>
<script>
  if (window.innerWidth > 480) {
	  window.onload = setHeights;
		window.onresize = setHeights;
		function setHeights() {
		  var items = document.getElementsByClassName("column-endcap")
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
