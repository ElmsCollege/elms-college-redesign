<?php
/**
 * Template Name: Nursing Program Landing Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
$top_pre_title = get_field("top_pre_title");
$top_menu = get_field("top_menu");
$first_field_title = get_field("first_field_title");
$first_field_sub_title = get_field("first_field_sub_title");
$mission_statement = get_field("mission_statement");
$mission_statement_pre_title = get_field("mission_statement_pre_title");
$mission_statement_body = get_field("mission_statement_body");
$calls_to_action = get_field("calls_to_action");
$short_content = get_field("short_content");
$short_content_background = get_field("short_content_background");
$action_columns = get_field("action_columns");
$program_track_title = get_field("program_track_title");
$program_track_description = get_field("program_track_description");
$program_repeater = get_field("program_repeater");

get_header("nursing");
?>

	<style>
	.section-heading{
		<?php print_featured_image_style($post->ID) ?>
	}
	</style>

	<?php
		get_template_part("template-parts/page-heading");
	?>
	<?php if (!empty($top_menu)) : ?>
		        <ul class="opening-menu">
	            <?php foreach ($top_menu as $index=>$program) : 
	                $title = $program["title"];
	                $link = $program["link"]?>
	                <li class="menu-item">
			          	<a class="permalink" href="<?php print $link ?>"><?php print $title ?></a>
	                </li>
	                <?php endforeach; ?>
		        </ul>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                  
      <div class="section-mission_statement">
        <p class="pre-title">
          <?php print($mission_statement_pre_title) ?>
        </p>
        <h2 class="field-mission_statement">
          <?php print($mission_statement) ?>
        </h2>
        <div class="mission-statement-container">
			<div class="mission-statement-body" id="mission-statement-pt-1">
		          <?php echo $mission_statement_body?>
		    </div>
        </div>
      </div>

			<div class="section-heading" id="program-track-anchor">
          <h2 class="field-title no-pre-title">
            <?php print($first_field_title) ?>
          </h2>
          <p class="field-sub-title"><?php print($first_field_sub_title) ?></p>
      </div>
      
      <div class="section-mission_statement">
        <h2 class="program-track-title">
          <?php print($program_track_title) ?>
        </h2>
        <div class="field-mission_statement_body">
          <?php print($program_track_description) ?>
        </div>
      </div>
      
      <?php if (!empty($calls_to_action)) : ?>
        <div class="calls-to-action">
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
                <li class="cta pure-u-1 pure-u-md-1-3 cta<?php print count($calls_to_action) ?>">
                  <div class="cta-top-div">
                  	<a class="permalink" href="<?php echo $link ?>"><?php echo $text ?></a>
                  </div>
                  <div style="position: relative">
					  <a href="<?php echo $link ?>">
						  <div class="cta-image" style="<?php print_acf_image_as_background_style($cta["background_new"], "large")?>" role="img" aria-label="<?php echo $text ?>">
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
      <?php for ($x = 0; $x < count($program_repeater); $x++) { ?>
		<div class="section-mission_statement">
			<h2 class="program-track-title">
			  <?php print($program_repeater[$x]["title"]) ?>
			</h2>
			<div class="field-mission_statement_body">
			  <?php print($program_repeater[$x]["content"])?>
			</div>
		</div>
        <div>
            <ul class="program-list noMargins ulreset">
              <?php foreach ($program_repeater[$x]["programs"] as $index=>$program) : 
                $title = $program["program_title"];
                $content = $program["program_content"];
                if ($program["link_type"] == "internal" && isset($program["internal_link"]->ID)) {
                  $link = get_the_permalink($program["internal_link"]->ID);
                  $text = $program["link_text"];
                  if (!$text || $text == "") {
                    $text = $program["internal_link"]->post_title;
                  }
                }
                elseif (isset($program["external_link"])) { // external
                  $link = $program["external_link"];
                  $text = $program["link_text"];
                }
                ?>
                <li class="rn-item">
		                  <p class="program-title noMarginBottom"><?php print $title ?></p>
		                  <?php print $content ?>
		                  <a href="<?php echo $link ?>">Learn More</a>
                </li>
              <?php endforeach; ?>
            </ul>
        </div>
      <?php } ?>
      
      
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
