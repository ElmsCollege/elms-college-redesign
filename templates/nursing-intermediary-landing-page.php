<?php
/**
 * Template Name: Nursing Intermediary Landing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
$mission_statement = get_field("mission_statement");
$mission_statement_pre_title = get_field("mission_statement_pre_title");
$mission_statement_body = get_field("mission_statement_body");
$calls_to_action = get_field("calls_to_action");
$short_content = get_field("short_content");
$short_content_background = get_field("short_content_background");
$action_columns = get_field("action_columns");

get_header("nursing");

	get_template_part("template-parts/page-heading");
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      
			<?php
			while ( have_posts() ) : the_post(); 
        $calls_to_action = get_field("calls_to_action");
        $hours_link = get_field("hours_link");
      ?>

      <div class="section-mission_statement">
	    <?php if ($mission_statement_pre_title) : ?>
		    <p class="pre-title">
		      <?php print($mission_statement_pre_title) ?>
		    </p>
        <?php endif; ?>
        <h2 class="field-mission_statement">
          <?php print($mission_statement) ?>
        </h2>
        <div class="field-mission_statement_body">
          <?php print($mission_statement_body) ?>
        </div>
      </div>
      
      <?php if (!empty($calls_to_action)) : ?>
        <div class="calls-to-action">
            <ul class="calls-to-action-feature pure-g">
              <?php foreach ($calls_to_action as $index=>$cta) : 
                $title = $cta["title"];
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
                  <div class="cta-top-div">
                  	<a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a>
                  </div>
                  <div style="position: relative">
					  <a href="<?php echo $link ?>">
						  <div class="image-tint">
							  <p><?php print $title ?></p>
						  </div>
						  <div class="cta-image" style="<?php print_acf_image_as_background_style($cta["background_new"], "large")?>">
							<img src="<?php print $cta["background_new"]["sizes"]["large"] ?>" alt="<?php print $cta["background_new"]["alt"] ?>">
						  </div>
					  </a>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
        </div>
      <?php endif; ?>
      
      <script>
	    if (window.innerWidth > 480) {
		    window.onload = setHeights;
		    window.onresize = setHeights;
		    function setHeights() {
				var items = document.getElementsByClassName("cta-top-div")
				var max = 0;
				var marginTop;
				
				for (var i = 0; i < items.length; i++) {
					if (items[i].offsetHeight > max)
				    	max = items[i].offsetHeight;
				}
				for (var i = 0; i < items.length; i++) {
					items[i].style.height = "" + max + "px"
					marginTop = (items[i].offsetHeight - items[i].firstElementChild.offsetHeight)/2 + "px";
					items[i].firstElementChild.style.marginTop = marginTop;
				}
			}
		}
	  </script>
      
      <?php get_template_part("template-parts/story-carousel", "manual") ?>
      
      <?php if (!empty($short_content)) : ?>
        <div class="short-content">
          <div class="field-background" style=" <?php print_acf_image_as_background_style($short_content_background) ?>">&nbsp;</div>
          <div class="short-content-inner pure-g">
            <?php foreach ($short_content as $index=>$short) : ?>
              <div class="short pure-u-1 <?php if (sizeof($short_content) != 1) {echo 'pure-u-lg-1-2';}?>">
                <h3><?php print($short["title"]) ?></h3>
                <div class="field-body"><?php print($short["body"]) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        
        </div>
      <?php endif;  ?>
      
      <?php if (!empty($action_columns)) : ?>
        <section class="action-columns">
          <div class="shell">
            <ul class="widgets pure-g">
              <?php foreach ($action_columns as $column) : ?>
                <li class="widget-features pure-u-1 pure-u-md-1-3">
                  <div class="widget-image">
                    <i class="ico-<?php echo $column["icon"] ?>"></i>
                  </div><!-- /.widget-image -->
                  <div class="widget-head">
                    <h3 class="widget-title"><?php echo $column["title"] ?></h3><!-- /.widget-title -->
                  </div><!-- /.widget-head -->
                  <div class="widget-body">
                    <?php echo $column["body"] ?>
                  </div><!-- /.widget-body -->
                  <div class="widget-actions">
                    <a href="<?php echo $column["action_link"] ?>" class="btn btn-red"><?php echo $column["action_text"] ?></a>
                  </div><!-- /.widget-actions -->
                </li><!-- /.widget -->
              <?php endforeach; ?>
            </ul><!-- /.widgets -->
          </div><!-- /.shell -->
        </section><!-- /.section section-features -->
      <?php endif;  ?>
      
      
      
      <?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
