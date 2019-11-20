<?php
/**
 * The template for displaying advertising landing pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

$bannerImage = get_field("advertising_banner_image");

if(get_field("advertising_right_column_header") ){
	$rightHeader = get_field("advertising_right_column_header");
}
if(get_field("advertising_right_column_text") ){
	$rightText = get_field("advertising_right_column_text");
}

get_header("advertising");
?>

<style>
	.advgb-columns-wrapper{max-width: 1200px;margin: 0 auto;width:70%;padding-top:32px;}
	.advgb-column-inner:last-of-type{background-color:#f1f1f1;}
</style>

<!--
<div id="primary" class="pure-g">
	<main id="main" class="site-main pure-u-1 standalone" role="main">
-->
				<?php the_content(); ?>
	<!-- </main> -->    
<!-- </div> -->
<hr />
<?php
get_footer("advertising");
