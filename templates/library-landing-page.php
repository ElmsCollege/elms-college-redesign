<?php
/**
 * Template Name: Library Landing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

wp_enqueue_script( 'libcal', 'https://api3.libcal.com/api_hours_today.php?iid=1042&lid=0&format=js&systemTime=0&context=object', array(), '20190602', true );

get_template_part("template-parts/header-selector");
?>
      
			<?php
			while ( have_posts() ) : the_post();
        
        $calls_to_action = get_field("calls_to_action");
        $hours_link = get_field("hours_link");
        
      ?>
	<?php $bgImage = wp_get_attachment_image_src( get_field('header_background_image'), "full"); ?>
	<div class="section-heading-as-content noMarginBottom" style="background-image: url('<?php echo $bgImage[0] ?>')">
        <?php if (get_the_post_thumbnail_url()): ?>
          <?php the_post_thumbnail() ?>
        <?php endif;?>
        <div class="text-content greenBGwhiteText">
          <h1 class="noMargins">
            <?php the_title() ?>
          </h1>
          <div class="field-body">
            <?php the_content() ?>
          </div>
        </div>
        <div class="todays-hours">
          <div class="the-hours">
		<i class="fas fa-clock" aria-hidden="true"></i>
            <div class="hours-inner">
              <h3>Today's Hours</h3>
              <div id="api_hours_today_iid1042_lid0"></div>
            </div>
          </div>
          <a class="hours-link" href="<?php echo $hours_link ?>">More</a>
        </div>
      </div>
      
      <?php if (!empty($calls_to_action)) : ?>
        <ul class="calls-to-action-feature pure-g">
          <?php foreach ($calls_to_action as $index=>$cta) : 
            if ($cta["link_type"] == "internal" && isset($cta["internal_link"]->ID)) {
              $link = get_the_permalink($cta["internal_link"]->ID);
              $text = $cta["link_text"];
              if (!$text || $text == "") {
                $text = $cta["internal_link"]->post_title;
              }
            }
            elseif (isset($cta["external_link"])) { // external
              $link = $cta["external_link"];
              $text = $cta["link_text"];
            }
            ?>
            <li class="cta pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
      <?php
			endwhile; // End of the loop.
			?>

<?php
get_footer("library");
