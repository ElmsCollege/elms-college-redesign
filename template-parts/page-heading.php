<?php
//call via:
//get_template_part("template-parts/page-heading");

if( get_field('featured_image_cropped') ){
	echo '<style>#imageHeading.section-heading{';
		print_featured_image_style($post->ID);
	echo '}</style>';
	echo '<div id="imageHeading" class="section-heading">';
}else{
	echo '<div id="textHeading" class="section-heading">';
}
?>
	<h1 class="field-title">
		<?php 
			echo esc_html( get_the_title() );
		?>
	</h1>
	<?php 
	  if( function_exists("pll_the_languages")){
		echo '<ul class="languageSwitcher ulreset" style="align-self:end;margin-bottom:0px;margin-left:5px;text-align:center;color:white;">';
	  	pll_the_languages( array( 'show_flags' => 1,'hide_current' => 1,'hide_if_no_translation' => 1) );
	  	echo '</ul>';
	  }
	?>
</div>