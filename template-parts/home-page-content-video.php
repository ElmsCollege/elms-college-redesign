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
        <style>
            .section-homepage_focus{
                width: 100%;
                height: auto;
                position: relative;
                display: block;
                margin: 0 auto;
            }
            #hero-overlay{
                position: absolute;
                bottom: 45%;
                width: 100%;
                text-align: center;
                color: white;
            }
            #hero-overlay h1{
                color: white;
                text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
                line-height: 1em;
                margin: 10px 0px;
            }
            #hero-overlay p{
                margin-bottom: 0px;
            }
            #hero-overlay a{
                font-size: 45px;
            }
            #hero-overlay a:hover{
                font-size: 55px;
            }
            #hero-overlay a, #hero-overlay a:visited{
                color: white;
            }
            #highlight_news{
                text-align: center;
                padding-top: 125px;
                margin-top: -125px;
                font-size: 1.2em;
            }
            #highlight_news label{
                color: #c3a250;
                font-weight: bold;
            }
            #highlight_news_link{
                color: #009bcf;
                font-style: italic;
            }
            #highlight_news_link a:visited{
                color: #009bcf;
            }
            @media only screen and (max-width: 850px){
                #hero-overlay{
                    bottom: 72%;
                }
                #hero-overlay h1{
                    font-size: 1.2em;
                }
                #hero-overlay p{
                    font-size: .8em;
                }
                #hero-overlay a{
                    display: none;
                }
            }
            @media screen and (orientation: landscape) {
                #hero-overlay a{
                    display: block;
                }
            }
        </style>
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
                <a href="#highlight_news"><i class="fa fa-angle-down"></i></a>
            </div>
        <?php endif; ?>
        
        <p id="highlight_news">
            <?php if( get_field("highlight_news_text") ): ?>
                <label>Important News: </label><?php the_field("highlight_news_text"); ?> | <a id="highlight_news_link" href="<?php the_field("highlight_news_link"); ?>">Read More...</a>
            <?php endif; ?>
        </p>
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

