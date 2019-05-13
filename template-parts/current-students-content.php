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
$main_pre_title = get_field("main_pre_title", $fake_id);

?>

   <div class="section-heading" style=" <?php print_featured_image_style($fake_id) ?>">
       <h1 class="field-title <?php if (!$main_pre_title): ?>no-pre-title<?php endif;?>">
         <?php the_title() ?>
       </h1>
   </div>

 	<div id="primary" class="content-area pure-g">
 		<main id="main" class="site-main pure-u-1" role="main">
      
       <div class="homepage-setter" style="display: none;">
         <?php if (isset($_COOKIE["homepage"])) : ?>
           <h3>Current student homepage</h3>
           <p><a href="#" class="home-page-setter">Click here</a> to set the College homepage as your default homepage.</p>
         <?php else : ?>
           <h3>Are you a current student or faculty?</h3>
           <p><a href="#" class="home-page-setter">Click here</a> to make this your default home page.</p>
        <?php endif; ?>
       </div>
      
 			<?php
 			while ( have_posts() ) : the_post();

 				get_template_part( 'template-parts/content', 'page' );

 				// If comments are open or we have at least one comment, load up the comment template.
 				if ( comments_open() || get_comments_number() ) :
 					comments_template();
 				endif;

 			endwhile; // End of the loop.
 			?>

 		</main><!-- #main -->
    
 	</div><!-- #primary -->

 <?php 