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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      
			<?php
			while ( have_posts() ) : the_post();
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
      
      <div class="section-hero_columns">
        <div class="field-hero_columns" style=" background:url(<?php print($hero_columns[0]["background_new"]["sizes"]["hero-story"]) ?>), rgba(0,0,0,.5);">
          <?php foreach ($hero_columns as $index=>$column) : 
              if ($hero_columns["link_type"] = "internal") {
                $hero_link = $column["internal_link"];
              }
              else {
                $hero_link = $column["external_link"];
              }
              
              $video_webm = $column["video_webm"];
              $video_ogv = $column["video_ogv"];
              $video_mp4 = $column["video_mp4"];
            ?>
            <div href="<?php print($hero_link) ?>" class="hero-column js-hover tang" style=" <?php print_acf_image_as_background_style($column["background_new"], "hero-story") ?>">
              
              <?php if (!empty($video_webm) || !empty($video_ogv) || !empty($video_mp4)) : ?>
                <div class="bg-wrapper">
                  <div class="video-bg">
                    <video loop="true" muted="true" preload="true">
                      <source src="<?php print $video_mp4 ?>" type="video/mp4">
                      <source src="<?php print $video_webm ?>" type="video/webm">
                      <source src="<?php print $video_ogv ?>" type="video/ogg">
                    </video>
                  </div>
                </div>
              <?php endif; ?>
              
              <div class="hero--home__panel-content">
                <div class="hero--home__panel-content-inner">
                  <h3 class="field-title"><?php print($column["title"]) ?></h3>
                </div>
                <div class="hero-button">
                  <div class="hero-button-inner">
                    <div class="hero-button-inner-inner">
                      <?php //print($column["link_text"]) ?>
                      <?php print($column["text_content"]) ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      
      <div class="section-mission_statement">
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

        <ul class="section-statistics pure-g" >
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
      
      <?php get_template_part("template-parts/story-carousel", "student") ?>
      
      <div class="news-events">
        <div class="news-events-inner">
          <p class="pre-title">
            <?php print($news_events_pre_title) ?>
          </p>
          <h2 class="field-news_events_title">
            <?php print($news_events_title) ?>
          </h2>
          <div class="news-events-feature pure-g">
            <div class="news-events-column pure-u-1 pure-u-lg-1-2">
              
              <?php if( isset($events[0])) : ?>
                <div class="news-item news-item-long">
                  <?php render_homepage_event($events[0])?>
                </div>
              <?php endif; ?>
              <?php if( isset($events[1])) : ?>
                <div class="news-item news-item-short">
                  <?php render_homepage_event($events[1])?>
                </div>
              <?php endif; ?>
            </div>
            
            <div class="news-events-column pure-u-1 pure-u-lg-1-2">
              <?php if( isset($events[2])) : ?>
                <div class="news-item news-item-short">
                  <?php render_homepage_event($events[2])?>
                </div>
              <?php endif; ?>
              <?php if( isset($events[3])) : ?>
                <div class="news-item news-item-long">
                  <?php render_homepage_event($events[3])?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <div class="more-button-container">
          <a class="more-button" href="/events">
            More Events
          </a>
        </div>
      </div>
      
      <div class="calls-to-action">
        <div class="calls-to-action-title">
          
          <p class="pre-title">
            <?php print($calls_to_action_pre_title) ?>
          </p>
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

