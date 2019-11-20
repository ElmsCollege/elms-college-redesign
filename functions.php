<?php
/**
 * Elms College Redesign functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elms_College_Redesign
 */


if ( ! function_exists( 'gs_elms_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gs_elms_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Elms College Redesign, use a find and replace
	 * to change 'gs_elms' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gs_elms', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary (Main)', 'gs_elms' ),
    'utility' => esc_html__( 'Utility (Footer)', 'gs_elms' ),
    'library' => esc_html__( 'Library', 'gs_elms' ),
    'nursing' => esc_html__( 'Nursing', 'gs_elms' ),
    'special-nav' => esc_html__( 'Special Nav', 'gs_elms' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
  /*
	add_theme_support( 'custom-background', apply_filters( 'gs_elms_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
  */
}
endif;
add_action( 'after_setup_theme', 'gs_elms_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gs_elms_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gs_elms_content_width', 640 );
}
add_action( 'after_setup_theme', 'gs_elms_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gs_elms_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gs_elms' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'gs_elms' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gs_elms_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gs_elms_scripts() {
	wp_enqueue_style( 'micromodal', get_template_directory_uri() . '/css/micromodal.css', array(), filemtime(get_template_directory() . '/css/micromodal.css'));
	
	wp_enqueue_style( 'gs_elms-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_uri()) );

	wp_enqueue_script( 'gs_elms-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161220', true );

	wp_enqueue_script( 'gs_elms-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20161215', true );
	wp_enqueue_script( 'gs_elms-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20161215', true );

	wp_enqueue_script( 'gs_elms-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20160413', true );

	wp_enqueue_script( 'gs_elms-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array(), '20160413', true );
	wp_enqueue_script( 'gs_elms-hoverintent', get_template_directory_uri() . '/js/jquery.hoverIntent.js', array(), '20160413', true );
	wp_enqueue_script( 'gs_elms-velocity', get_template_directory_uri() . '/js/velocity.min.js', array(), '20160413', true );
	wp_enqueue_script( 'gs_elms-fitie', get_template_directory_uri() . '/js/object-fit-videos.js', array(), '20160413', true );

	wp_enqueue_script( 'gs_elms-dropdown-core', get_template_directory_uri() . '/js/dropdown/core.js', array(), '20151215', true );
	wp_enqueue_script( 'gs_elms-dropdown-touch', get_template_directory_uri() . '/js/dropdown/touch.js', array(), '20151215', true );
	wp_enqueue_script( 'gs_elms-dropdown-main', get_template_directory_uri() . '/js/dropdown/dropdown.js', array(), '20151215', true );

	wp_enqueue_script( 'gs_elms-what-input', get_template_directory_uri() . '/js/what-input.min.js', array(), '20151215', true );
	wp_enqueue_script( 'gs_elms-object-fit', get_template_directory_uri() . '/js/object-fit-videos.js', array(), '20151215', true );
	wp_enqueue_script( 'gs_elms-hoverintent', get_template_directory_uri() . '/js/jquery.hoverIntent.js', array(), '20151215', true );
	wp_enqueue_script( 'gs_elms-velocity', get_template_directory_uri() . '/js/velocity.min.js', array(), '20151215', true );
	wp_enqueue_script( 'micromodal', get_template_directory_uri() . '/js/micromodal.min.js', array(), '20190701', true );
	
	wp_enqueue_script( 'gs_elms-functions', get_template_directory_uri() . '/js/functions.js', array(), '36', true );
    wp_enqueue_style('print-styles', get_template_directory_uri() . '/css/print.css', array(), filemtime(get_template_directory() . '/css/print.css'), 'print' );
//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
}
add_action( 'wp_enqueue_scripts', 'gs_elms_scripts');

function multisite_scripts() {
	$blog_id = get_current_blog_id();
	if( 2 == $blog_id){//commencement subsite
	wp_enqueue_style( 'commencement', get_template_directory_uri() . '/css/commencement.css', array(), '1' );
	}
}
add_action( 'wp_enqueue_scripts', 'multisite_scripts', 20 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function get_event_start_date($event) {
  return strtotime(get_post_meta($event->ID, "_EventStartDate", true));
}

function get_upcoming_events( $count = 2, $taxonomy = null ) {
  //$queried_object = get_queried_object();
  
  $args = array(
    'post_type' => 'tribe_events',
    "posts_per_page" => -1,
    //"tribe_events_cat" => "featured",
    /*
    "tax_query" => array(
			'taxonomy' => 'tribe_events_cat',
			'field'    => 'term_id',
			'terms'    => "103",
    )
    */
    
  );
  
  
  if ($taxonomy) {
    $tax_query_array = array("relation" => "OR");
    foreach ($taxonomy as $tax) {
      $tax_query_array []= array(
      			'taxonomy' => 'tribe_events_cat',
      			'field'    => 'term_id',
      			'terms'    => $tax,
      		);
    }
    $args['tax_query'] = $tax_query_array;
  }
  //echo $args['category'].$args["category_name"];
  
  
  
  $all_related_events = get_posts($args);
  //echo var_dump($all_related_events);

  $upcoming_events = array();
  foreach ($all_related_events as &$event) {
    $event->real_start_time = get_event_start_date($event);
    $raw_start_date = get_post_meta($event->ID, "_EventEndDate", true);
    if (time() <= $event->real_start_time || ($raw_start_date != false && time() <= strtotime($raw_start_date)) ) {
      $upcoming_events[] = $event;
    }
  }

  function sort_upcoming_events_by_time($a, $b)
  {
      if ($a->real_start_time == $b->real_start_time) {
          return 0;
      }
      return ($a->real_start_time < $b->real_start_time) ? -1 : 1;
  }
  usort($upcoming_events, "sort_upcoming_events_by_time");

  $most_recent_upcoming_events = array_slice($upcoming_events, 0, $count);

  return $most_recent_upcoming_events;
}


function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

function current_dept($id) {
  return get_field("dept", $id);
}

function register_dept_menus($id) {
  return get_field("dept", $id);
}

add_post_type_support( 'page', 'excerpt' );

function gs_get_the_excerpt ($id, $more = false) {
    $excerpt = get_post_field('post_excerpt', $id);
    $moretext = "";
    if (empty($excerpt)) {
	if ( is_search() ) {
      		$excerpt = the_excerpt('post_content', $id);
    	}
    	else {	
      		$excerpt = get_post_field('post_content', $id);
	}
    }
    if ($more) {
      $moretext = '... <a href="'.get_the_permalink($id).'">Learn More</a>';
    }
    else {
      $moretext = "...";
    }
    $excerpt = preg_replace('#\[[^\]]+\]#', '', $excerpt);
    
    return wp_trim_words($excerpt, 30, $moretext);
}

function gs_add_typekit () {
  ?>
  <script src="https://use.typekit.net/dtj4bwl.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <?php
}
add_action('wp_head', 'gs_add_typekit');

function display_homepage_event ($event) {
  ?> 
  <a class="event" href="<?php print get_the_permalink($event) ?>">
    <div class="event-image">
		<?php
			if ( has_post_thumbnail($event->ID) ) {
				print get_the_post_thumbnail($event->ID, "medium", array( "class" => "grey-to-color" ));
			}else{
				echo "<img class='grey-to-color' src='/wp-content/uploads/2018/10/Elms-Campus_aerial-view-300x169.jpg' alt='Photo of Elms College campus'>";
			};
		?>
    </div>
    
    <div class="main-event-content">
		<div class="start-date">
			<div class="day">
			  <?php 
			  if (tribe_get_start_date($event, false, "ymd") < date("ymd")) { // if we're in the middle of a multiday event
				print date("j"); //print today's date
			  }
			  else {
				print tribe_get_start_date($event, false, "j");
			  }
			  ?>
			</div>
			<div class="month"><?php print tribe_get_start_date($event, false, "M")?></div>
		  </div>
		<div class="eventDetails">
		  <div class="times">
			<span class="start-time"><?php print str_ireplace(":00", "", tribe_get_start_date($event, false, "g:i A"))?></span> - 
			<span class="end-time2"><?php print str_ireplace(":00", "", tribe_get_end_date($event, false, "g:i A"))?></span>
		  </div>
		  <span class="permalink">
			<h3 class="field-title noMarginTop"><?php print mb_strimwidth($event->post_title, 0, 50, '...') ?></h3>
			Read More
		  </span>
			</div>
		</div>
  	</a>
  <?php
}

// a homepage link that factors in the cookie
function real_homepage_link () {
  if (isset($_COOKIE["homepage"])) {
    return get_the_permalink(get_field("homepage_copy", "option"));
  }
  else {
    return home_url( '/' );
  }
}

function redirect_if_homepage_cookie () {
  if (isset($_COOKIE["homepage"]) && is_front_page()) {
    wp_safe_redirect( $_COOKIE["homepage"] );
  }
}

function gs_is_active_sidebar () {
  global $post;
  $sidebar_calls_to_action = get_field("sidebar_calls_to_action");
  $sidebar_image = get_field("sidebar_image");
  $sidebar_content = get_field("sidebar_content");
  $sidebar_menu_items = get_field("sidebar_menu_items");
  
  return ( ($sidebar_calls_to_action) || ($sidebar_image) || ($sidebar_content) || ($sidebar_menu_items) || $post->post_parent != 0);
}

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
/*
 * Modify TinyMCE editor to remove H1.
 */
function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';
	return $init;
}

function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus' );

function inject_fontawesome() {
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <?php
}
add_action('wp_footer', 'inject_fontawesome');

add_action('admin_head', 'hide_custom_field_on_events');
function hide_custom_field_on_events () {
  ?> 
  <style>
    body.wp-admin.events-cal #postcustom {
        display: none;
    }
  </style>
  <?php
}

add_action('admin_head', 'hide_domain_in_permalink_on_admin');
function hide_domain_in_permalink_on_admin () {
  ?> 
  <script>
  jQuery(document).ready( function () {
    jQuery(".column-permalink").each( function () {
      jQuery(this).text(jQuery(this).text().replace(window.location.protocol+"//"+window.location.hostname, ""));
    });
  })
  
  </script>
  <?php
}

 add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
 function wpdocs_theme_setup() {
     add_image_size( 'hero-story', 896, 1886, false ); // 300 pixels wide (and unlimited  height)
     add_image_size( 'hero-story-preview', 224, 472, false ); // (cropped)
 }

function get_background_image_from_image_data ($image_data, $size_name = null) {
  if (isset($size_name)) {
    return "background-image:url(".$image_data["sizes"]["hero-story"].");";
  }
  else {
    return "background-image:url(".$image_data["url"]."); ";
  }
}
function get_background_position_from_image_data ($image_data) {
  $vertical = (floatval($image_data["focal_point"]["top"]) + floatval($image_data["focal_point"]["bottom"])) * 50;
  $horizontal = (floatval($image_data["focal_point"]["left"]) + floatval($image_data["focal_point"]["right"])) * 50;
  return "background-position: ".$horizontal."% ".$vertical."%; ";
}
function print_acf_image_as_background_style ($image_data, $size_name = null) {
  print get_background_image_from_image_data($image_data, $size_name).get_background_position_from_image_data($image_data);
}

function print_featured_image_style ($post_id, $size_name = null) {
  //var_dump(get_field("featured_image_cropped", $post_id));
  if (get_field("featured_image_cropped", $post_id)) {
    print_acf_image_as_background_style(get_field("featured_image_cropped", $post_id), $size_name);
  }
  else if (get_the_post_thumbnail_url($post_id)) {
    print "background-image:url(".get_the_post_thumbnail_url($post_id)."); ";
  }
  else {
    print "";
  }
}

add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
	if (is_search()) {
		global $wp_query;
		$wp_query->query_vars['posts_per_page'] = 40;
	}
	return $limits;
}

// add mobile class by default if user agent is mobile
add_filter( 'body_class', function( $classes ) {
  $useragent=$_SERVER['HTTP_USER_AGENT'];

  if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    return array_merge( $classes, array( 'mobile-or-library' ) );
  }
  else {
    return $classes;
  }
    
} );

add_action("ga_dash_addtrackingcode", "add_optimize_require");
function add_optimize_require () {
  echo "ga('require', 'GTM-T3ZX2GB');";
}

/* Tribe, add event date to Yoast Seo title */
function tribe_add_date_to_title( $title ) {
 
    if( !class_exists('Tribe__Events__Main') || !is_singular( Tribe__Events__Main::POSTTYPE ) ) {
      return $title;
    }
 
    // tribe_get_start_time docs https://theeventscalendar.com/function/tribe_get_start_time/ 
    return tribe_get_start_date(null)." ".$title ;
}
 
add_filter('wpseo_title', 'tribe_add_date_to_title');

add_filter('the_content', 'specific_no_wpautop', 9);
function specific_no_wpautop($content) {
    if (is_page (array('10133','10245','16684') )) { // or whatever other condition you like
        remove_filter( 'the_content', 'wpautop' );
        return $content;
    } else {
        return $content;
    }
}

function excerpt_readmore($more) {
return '... <a href="'. get_permalink($post->ID) . '" class="readmore">read more</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

add_filter('acf/format_value/type=text', 'do_shortcode');

function get_first_paragraph(){
    global $post;
		$str = get_the_content();
		$str = preg_replace("/<img[^>]+>/i", " ", $str);          
		$str = apply_filters('the_content', $str);
		$str = str_replace(']]>', ']]>', $str);
		$str = substr ( $str, 0, strpos( $str, '</p>' ) + 4 );
		$str = strip_tags($str);
		return $str;
}

function cptui_register_my_cpts_lp() {
  /**
   * Post Type: Advertising Landing Page.
   */
  $labels = [
    "name" => __( "Advertising Landing Page", "gs_elms" ),
    "singular_name" => __( "Advertising Landing Page", "gs_elms" ),
  ];
  $args = [
    "label" => __( "Advertising Landing Page", "gs_elms" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => true,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "lp", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-admin-page",
    "supports" => [ "title", "editor" ],
    'template' => array(
      array( 'core/image', array() ),
      array( 'advgb/columns', array('gutter' => '20'), array(
        array( 'advgb/column', array(), array(
          array( 'core/paragraph', array() ),
		) ),
        array( 'advgb/column', array(), array(
          array( 'core/heading', array('level' => '3','className' => 'noMarginTop'),'placeholder' => 'Classes start...' ),
          array( 'core/paragraph', array('content' => 'Applying to Elms College is easier than you think, and there’s no fee to apply.') ),
          array( 'core/block', array('ref' => 39731) ),
        ) ),
      ) )
    ),
  ];
  register_post_type( "lp", $args );
}
add_action( 'init', 'cptui_register_my_cpts_lp' );