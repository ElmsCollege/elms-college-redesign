<?php
/**
 * This template controls the department/department faculty pages in the directory because they are mstly the same
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Elms_College_Redesign
 */
$has_sidebar = gs_is_active_sidebar();
get_header(); ?>

	<link rel='stylesheet' id='a-z-listing-css'  href='https://www.elms.edu/wp-content/plugins/a-z-listing/css/a-z-listing-default.css?ver=4.9.9' type='text/css' media='all' />

  <div class="section-heading">
      <h1 class="field-title">
        <?php the_archive_title(); ?>
      </h1>
  </div>
	<div id="primary" class="content-area pure-g">
    <?php if ($has_sidebar) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

		<main id="main" class="site-main pure-u-1 <?php echo ($has_sidebar ? "pure-u-md-7-12 pure-u-lg-2-3" : "standalone") ; ?>" role="main">
<a href="/directory/">
	<i class="fas fa-chevron-left" aria-hidden="true"></i><i class="fas fa-chevron-left" aria-hidden="true"></i> Back to the directory
</a>

	<?php echo term_description(); ?>


<?php
    $al_cat_slug = get_queried_object()->slug;
?>
    <h2><?php echo $al_cat_name; ?></h2>
<?php
    $al_tax_post_args = array(
        'post_type' => 'personnel',
        'posts_per_page' => -1,
		'orderby' => 'name',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => $GLOBALS['taxonomyTerm'],
                'field' => 'slug',
                'terms' => $al_cat_slug
            )
        )
    );

	the_a_z_listing($al_tax_post_args);
?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
