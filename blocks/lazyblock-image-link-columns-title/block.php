<div class="linkColumns title">
	<?php foreach( $attributes['column'] as $inner ): ?>
	<a href="<?php echo esc_url( $inner['button-target'] ); ?>" class="column">
		<?php 
			$bgImage = wp_get_attachment_image( $inner[ 'image' ], 'large');
			print_r($bgImage);
		?>
		
		<div class="bgImage" style="background-image: url('<?php echo $bgImage[0]; ?>')">
			<div class="title-container">
				<h2><?php echo $inner['title-text'] ?></h2>
			</div>
		</div>
		<div class="column-endcap">
			<div class="permalink"><?php echo $inner['button-text']; ?></div>
		</div>
	</a>
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
