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
	.wp-block-image img{
		display:table;
		margin:0 auto;
	}
	.advgb-columns-wrapper{
		max-width:1200px !important;
		margin:0 auto;
		width:70% !important;
		padding-top:32px;
	}
	.advgb-column{
		margin:0 20px;
	}
	.advgb-column:last-of-type .advgb-column-inner{
		background-color:#f1f1f1;
		text-align:center;
	}
	#colophon .site-title{
		display:table;
		margin:0 auto;
	}
	#advertising-landing-page .section-heading{
		background-color:unset;
	}
	#advertising-landing-page footer{
		display:table;
		margin:0 auto;
	}
	#advertising-landing-page footer.site-footer .site-branding{
		margin-left:unset;
	}
	#advertising-landing-page footer .footer-item-inner{
		margin-bottom:0;
	}

</style>

	<?php the_content(); ?>

<hr />
<?php
get_footer("advertising");
