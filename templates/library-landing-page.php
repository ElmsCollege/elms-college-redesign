<?php
/**
 * Template Name: Library Landing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */

wp_enqueue_script( 'libcal', 'https://api3.libcal.com/api_hours_today.php?iid=1042&lid=0&format=js&systemTime=0&context=object', array(), '20190602', true );


add_filter( 'body_class', function( $classes ) {
  return array_merge( $classes, array( 'mobile-or-library' ) );
});
get_header("library"); ?>

      
			<?php
			while ( have_posts() ) : the_post();
        
        $calls_to_action = get_field("calls_to_action");
        $hours_link = get_field("hours_link");
        
      ?>
      
      
      <div class="section-heading-as-content" style=" <?php print_featured_image_style(get_the_ID()) ?>">
        <?php if (get_the_post_thumbnail_url()): ?>
          <?php the_post_thumbnail() ?>
        <?php endif;?>
        <div class="text-content">
          <h1 class="field-title">
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer("library");
