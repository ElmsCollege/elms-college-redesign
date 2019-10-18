<?php
//call via:
//get_template_part("template-parts/header-selector");

$blog_id = get_current_blog_id();
$permalink = get_permalink();
if( 2 == $blog_id){
	get_header("commencement");
} elseif(strpos($permalink,'school-of-nursing')){
	get_header("nursing");
} else{
	get_header();
}
