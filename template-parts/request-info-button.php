<?php 
	$showRequestInfo = 1;
	$showRequestInfo = get_field('control_request_info_button');			
	if( $showRequestInfo == 1 ): 
		echo do_shortcode("[sc name='get-info-popup']");
	endif;
?>