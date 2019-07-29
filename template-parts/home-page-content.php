<?php
global $fake_id;
global $post;
if (isset($fake_id)) {
  $post = get_post($fake_id);
}
else {
  $fake_id = $post->ID;
}

setup_postdata($post);
 ?>

		    <?php
			while ( have_posts() ) : the_post();
			$hero_video_desktop     = get_field("hero_video_desktop", $fake_id);
			$hero_video_mobile      = get_field("hero_video_mobile", $fake_id);
			$hero_poster            = get_field("hero_poster");

        $hero_columns = get_field("hero_columns", $fake_id);
        
        $mission_statement = get_field("mission_statement", $fake_id);
        $mission_statement_pre_title = get_field("mission_statement_pre_title", $fake_id);
        $mission_statement_body = get_field("mission_statement_body", $fake_id);
        
        $statistics = get_field("statistics", $fake_id);
        $statistics_background = get_field("statistics_background_new", $fake_id);
        
        $news_events_pre_title = get_field("news_events_pre_title", $fake_id);
        $news_events_title = get_field("news_events_title", $fake_id);
        $event_sources = get_field("event_sources", $fake_id);
        $events = get_upcoming_events(4, $event_sources);
        
        $calls_to_action_pre_title = get_field("calls_to_action_pre_title", $fake_id);
        $calls_to_action_title = get_field("calls_to_action_title", $fake_id);
        $calls_to_action = get_field("calls_to_action", $fake_id);
        ?>

        <!-- <?php print($hero_video_desktop); ?> -->
        <!-- <?php print($hero_video_mobile); ?> -->
      <div class="section-homepage_focus">
        <div id="homepage-focus">
            <?php if ( wp_is_mobile() ) {
                Echo "<video loop muted autoplay controls preload='true' width='100%' height='auto' poster='$hero_poster'>";
            } else {
                Echo "<video loop muted autoplay preload='true' width='100%' height='auto' poster='$hero_poster'>";
            }
            ?>
            <?php if (  wp_is_mobile() && get_field("hero_video_mobile") ) {
                Echo "<source src='$hero_video_mobile' type='video/mp4'>";
            } else {
                Echo "<source src='$hero_video_desktop' type='video/mp4'>";
            }
            ?>
            </video>
        </div>
        <?php if( get_field("hero_overlay") ): ?>
            <div id="hero-overlay"><?php the_field("hero_overlay"); ?>
                <a href="#homepage_content">&#8964;</a>
            </div>
        <?php endif; ?>
        <?php if( get_field("highlight_news_link") ): ?>
		<div id="highlight_news">
                	<?php the_field("highlight_news_text"); ?> <a id="highlight_news_link" href="<?php the_field("highlight_news_link"); ?>"><?php the_field("highlight_news_link_text"); ?></a>
		</div>
        <?php endif; ?>        
      </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <div id="homepage_content" class="section-mission_statement">
        <p class="pre-title">
          <?php print($mission_statement_pre_title) ?>
        </p>
        <h2 class="field-mission_statement">
          <?php print($mission_statement) ?>
        </h2>
        <div class="field-mission_statement_body">
          <?php print($mission_statement_body) ?>
        </div>
      </div>

      <div class="section-statistics-container" style="<?php print_acf_image_as_background_style($statistics_background)?>">

            <ul class="section-statistics pure-g">
          <?php foreach ($statistics as $index=>$statistic) : ?>
            <li class="statistic pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
              <div class="statistic-inner">
                <div class="field-statistic_figure"><?php print($statistic["figure"]) ?></div>
                <div class="field-statistic_explanation"><?php print($statistic["explanation"]) ?></div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      
		<div id="news" class="flexRowWrapStart spaceBetween news-events-feature">
			<div class="events flexHalf">
				<h2 class="centerText">Events</h2>
				<?php if( isset($events[0])) : ?>
               		<?php display_homepage_event($events[0])?>
           		<?php endif; ?>
				<?php if( isset($events[1])) : ?>
               		<?php display_homepage_event($events[1])?>
           		<?php endif; ?>
				<?php if( isset($events[2])) : ?>
               		<?php display_homepage_event($events[2])?>
           		<?php endif; ?>
				<?php if( isset($events[3])) : ?>
               		<?php display_homepage_event($events[3])?>
           		<?php endif; ?>
				<div class="more-button-container">
					<a class="more-button" href="/events/">
						More Events
					</a>
				</div>
			</div>
			<div class="news flexHalf listText">
				<h2 class="centerText">News</h2>
				<?php 
					$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
					if (strpos($url,'staging') !== false) {
						echo do_shortcode("[wbcr_snippet id='37228']");
					} else {
    					echo do_shortcode("[wbcr_snippet id='37429']");
					}
				?>
				<div class="more-button-container">
					<a class="more-button" href="/news/">
						More News
					</a>
				</div>
			</div>
		</div>
      	
      <?php get_template_part("template-parts/story-carousel", "student") ?>
      
      <div class="calls-to-action">
        <div class="calls-to-action-title">
          <h2 class="field-calls_to_action_title">
            <?php print($calls_to_action_title) ?>
          </h2>
        </div>

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
              <li class="cta pure-u-1 pure-u-md-1-3">
                <div class="cta-image" style="<?php print_acf_image_as_background_style($cta["background_new"], "large")?>">
                  <img src="<?php print $cta["background_new"]["sizes"]["large"] ?>" alt="<?php print $cta["background_new"]["alt"] ?>">
                </div>
                <a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
      </div>
      
      
      
      
      <?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

