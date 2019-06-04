<?php
/**
 * Template part for displaying page content in XXXX-program-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */
$has_sidebar = gs_is_active_sidebar();
if( get_field("hide_sidebar") == "hidden" ){
	unset($has_sidebar);
};

$story_title = get_field("story_title");
$story_body = get_field("story_body");

$related_majors = get_field("related_majors");

$degree_option = get_field("degree_option");
$required_credits = get_field("required_credits");
$quick_info_image = get_field("quick_info_image_new");
$program_formats = get_field("program_formats");
$misc_quick_info = get_field("misc_quick_info");

$story_background = get_field("story_background_new");
$programImage	= get_field("program_image");
$programPageStoryImage	= get_field("story_background-gutenberg");

$lower_story_title = get_field("lower_story_title");
$lower_story_content = get_field("lower_story_content");

?>

  <div id="pageHeading" class="section-heading">
      <h1 class="field-title">
        <?php 
        if (get_the_title()) {
          the_title();
        }
        ?>
      </h1>
  </div>
	<div id="primary" class="content-area pure-g"> 
    
		<main id="main" class="program-page-main site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">

<?php if ($story_background || $programImage): ?>

  <div class="section-heading-as-content <?php if ($mp4 || $m4v || $ogv || $webm ) { echo "with-video"; }?>" >
    <?php if ($programPageStoryImage): ?>
	<?php echo wp_get_attachment_image( $programPageStoryImage, "large" ); ?>
    <?php elseif ($programImage): ?>
	<img src="<?php print $programImage["url"] ?>" alt="<?php print($programImage["alt"]) ?>" />  
    <?php else: ?>
	<img src="<?php print $story_background["url"] ?>" alt="<?php print($story_background["alt"]) ?>" />              
    <?php endif;?>
    <?php if ($mp4 || $m4v || $ogv || $webm ) : ?>
      <div class="video-bg">
        <video loop muted preload="false" poster="<?php print $story_background["url"] ?>">
          <source src="<?php print $mp4["url"]?>" type="video/mp4">
          <source src="<?php print $m4v["url"]?>" type="video/mp4">
          <source src="<?php print $webm["url"]?>" type="video/webm">
          <source src="<?php print $ogv["url"]?>" type="video/ogg">
        </video>  
      </div>
    <?php endif; ?>
    <?php if ($story_body || $story_title) : ?>
      <div class="text-content">
          <h2 class="field-title noMarginTop">
            <?php print($story_title) ?>
          </h2>
        <div class="field-body">
          <?php print $story_body ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if (!empty($related_majors)) : ?>
    <div class="field-related-majors">
      <ul>
      
        <?php 
        foreach ($related_majors as $index=>$major) : 
          $link = get_the_permalink($major->ID);
          $text = get_the_title($major->ID);
        ?>
          <li>
            <a class="permalink" href="<?php print $link ?>"><?php print $text ?></a>
          </li>
        <?php  endforeach; ?>
      </ul>
    </div>
    <?php endif; ?><!-- end if(story_background || programImage) -->
    
  </div>
<?php endif; ?>

        <div class="field-content">
          <?php the_content() ?>
        </div>
        
        
      <?php if ($required_credits || $degree_option || $program_formats || $misc_quick_info) : ?>
      <div class="pure-g quick-info-container">
        
        <?php if ($quick_info_image) : ?>
          <div class="field-sidebar-image pure-u-1 pure-u-lg-1-2" style="<?php print_acf_image_as_background_style($quick_info_image) ?>">
            <img src="<?php print $quick_info_image["url"] ?>" alt="<?php print $quick_info_image["alt"] ?>">
          </div>
        <?php endif; ?>
        <div class="quick-info">
          <h2>Quick Info</h2>
          <div class="quick-info-inner">
            <?php if ($required_credits): ?>
              <div class="field-required-credits">
                <h3>Required Credits</h3>
                <?php print $required_credits ?>
              </div>
            <?php endif; ?>
            <?php if ($degree_option): ?>
              <div class="field-degree-option">
                <h3>Degree Option</h3>
                <p><?php print $degree_option ?></p>
              </div>
            <?php endif; ?>
            <?php if ($program_formats): ?>
              <div class="field-program-formats">
                <h3>Program Formats</h3>
                <p><?php print $program_formats ?></p>
              </div>
            <?php endif; ?>
            <?php if (!empty($misc_quick_info)): ?>
              <div class="field-misc-quick-info">
                <p><?php print $misc_quick_info ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
        
        
      </div>
      <?php endif; ?>
      
      <?php if ($lower_story_content ) : ?>
        <div class="lower-story">
          <h3 class="field-lower-story-title">
            <?php print $lower_story_title ?>
          </h3>
          <div class="field-lower-story-content">
            <?php print $lower_story_content ?>
          </div>
        </div>
      <?php endif; ?>      
      

		</main><!-- #main -->
    <?php if(($has_sidebar) || (is_active_sidebar('sidebar-1'))): ?>
      <div class="page-sidebar pure-u-1 pure-u-md-5-12 pure-u-lg-1-3">
        <?php get_sidebar(); ?>
      </div>
    <?php endif; ?>
    
	</div><!-- #primary -->
