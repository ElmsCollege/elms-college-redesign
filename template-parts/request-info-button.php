<?php
	$permalink = get_permalink();
	if (get_field('control_request_info_button') == 'show'){
		$showRequestInfo = true;		
	} else if (get_field('control_request_info_button') == 'hide'){
		$showRequestInfo = false;
	} else {
		if(strpos($permalink,'/about-elms/')){
			$showRequestInfo = false;
		} else if(strpos($permalink,'/alumni/')){
			$showRequestInfo = false;
		} else if(strpos($permalink,'/student-life/')){
			$showRequestInfo = false;
		} else{
			$showRequestInfo = true;
		}	
	}

	if($showRequestInfo === true){
		echo do_shortcode("[sc name='get-info-popup']");		
	}
?>