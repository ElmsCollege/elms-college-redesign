<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elms_College_Redesign
 */


get_header(); ?>

  <div class="section-heading" style=" <?php if (the_post_thumbnail_url()): ?>background-image:url('<?php print the_post_thumbnail_url() ?>');<?php endif;?>">
    <div class="section-heading-inner">
      <h1 class="field-title no-pre-title">
        News
      </h1>
    </div>
  </div>
	<div id="primary" class="content-area pure-g">
		<main id="main" class="site-main pure-u-1 standalone" role="main">
<ul class="embedDirectory-image ulreset">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// WP_Query arguments
$args = array(
	'post_type'              => array( 'post','student_story','blog' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => false,
	'posts_per_page'         => '15',
	'paged'					 => $paged,
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		?>
<li class="flexRowWrapStart spaceBetween">
<div class="listText">
<h3 class="noMarginTop"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<?php 
		$type = get_post_type();
		if($type == "student_story"){
			$kind = "Student Story";
		}elseif($type == "blog"){
			$kind = "Blog Post";
		}else{
			$kind = "News Story";
		};
		
		$post_date = get_the_date( 'l, F j, Y' );
		echo '<span class="smallText">Published on ' .$post_date .' as a <strong>' . $kind . '</strong></span><p>';
		echo get_first_paragraph();?>
		<a href="<?php the_permalink(); ?>">
			<?php if( get_field("alternate_read_more") ){
				the_field("alternate_read_more");
			}else{
				echo "Read more";
			}; ?>
		</a>
		</p>
		</div>
		<?php
		echo get_the_post_thumbnail($post_id, 'thumbnail');
		echo '</li>';
	}
}
?>
	</ul>
<div class="pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 1,
            'mid_size'     => 1,
            'prev_next'    => true,
//            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
//            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
            'prev_text'    => sprintf('Newer Posts', 'text-domain'),
            'next_text'    => sprintf('Older Posts', 'text-domain'),
            'add_args'     => false,
//            'add_fragment' => '',
        ) );
    ?>
</div>
<?php
// Restore original Post Data
wp_reset_postdata();
?>
		</main><!-- #main -->
    
	</div><!-- #primary -->

<?php
get_footer();
