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
	.wp-block-image image{
		display:table;
		margin:0 auto;
	}
	.advgb-columns-wrapper{
		max-width:1200px !important;
		margin:0 auto;
		width:70% !important;
		padding-top:32px;
	}
	.advgb-columns:last-of-type .advgb-column-inner{
		background-color:#f1f1f1;
		text-align:center;
	}
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
