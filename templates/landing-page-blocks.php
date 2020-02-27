<?php
/**
 * Template Name: Simple Interior Landing Page (blocks editor)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */



get_template_part("template-parts/header-selector");

while ( have_posts() ) : the_post();

  $opening_menu = get_field("opening_menu");
  
//	get_template_part("template-parts/page-heading");
?>
<style>
	#imageHeading{background-color:unset;}
	#imageHeading img{position:absolute; top:0; left:0; width:100%; height:100%;}
</style>
<div id="imageHeading" class="section-heading">
	<?php
		$image = get_field('header_background_image');
		$size = 'full';
		if( $image ) {
			echo wp_get_attachment_image( $image, $size );
		}
	?>
	<h1 class="field-title">
		<?php 
			echo esc_html( get_the_title() );
		?>
	</h1>
</div>

<?php if (!empty($opening_menu)) : ?>
        <ul class="opening-menu ulreset spaceBetween">
          <?php
            foreach ($opening_menu as $index=>$menu_item) : 
            if ($menu_item["link_type"] == "internal" && !empty($menu_item["internal_link"])) {
              $link = get_the_permalink($menu_item["internal_link"]);
              $text = $menu_item["link_text"];
              if (!$text || $text == "") {
                $text = $menu_item["internal_link"]->post_title;
              }
            }
            elseif (isset($menu_item["external_link"])) { // external
              $link = $menu_item["external_link"];
              $text = $menu_item["link_text"];
            }
            ?>
            <li class="menu-item"><a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a></li>
          <?php  endforeach; ?>
        </ul>
      <?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part("template-parts/request-info-button"); ?>
			<div class="body-text">
		      		<?php the_content() ?>
			</div>
     
		</main><!-- #main -->
	</div><!-- #primary -->
      <?php
			endwhile; // End of the loop.
			?>
<?php
get_footer();
