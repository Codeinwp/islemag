<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

get_header(); ?>

  <?php
		$islemag_header_slider_category = get_theme_mod('islemag_header_slider_category','all');
		$islemag_header_slider_max_posts = get_theme_mod('islemag_header_slider_max_posts','6');

		$wp_query = new WP_Query(
			array(
							'posts_per_page'        => $islemag_header_slider_max_posts,
							'order'                 => 'ASC',
							'post_status'           => 'publish',
							'category_name'         =>  (!empty($islemag_header_slider_category) && $islemag_header_slider_category != 'all' ? $islemag_header_slider_category : '')
					)
		);
	?>

    <?php
		if ( $wp_query->have_posts() ) : ?>
      <div class="islemag-top-container">
        <div class="owl-carousel islemag-top-carousel rect-dots">
          <?php
									while ( $wp_query->have_posts() ) : $wp_query->the_post();
				            get_template_part( 'template-parts/slider-posts', get_post_format() );
									endwhile;
										wp_reset_postdata();
					?>
        </div><!-- End .islemag-top-carousel -->
      </div><!-- End .islemag-top-container -->
      <?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

    <?php
		if ( have_posts() ) : ?>
			<div class="container">
				<div class="row">

					<div class="islemag-content-left <?php if ( !is_active_sidebar( 'islemag-sidebar' ) ) { echo 'col-md-12';} else { echo 'col-md-9'; } ?>">
						<?php
					      $colors = array("red", "orange", "blue", "green", "purple", "pink", "yellow");

					      $islemag_section_title = get_theme_mod( 'islemag_section1_title', esc_html__( 'Section 1', 'islemag' ) );
					      $islemag_section_category = get_theme_mod( 'islemag_section1_category', 'all' );
					      $islemag_section_max_posts = get_theme_mod( 'islemag_section1_max_posts', 6 );
					      include( locate_template( 'template-parts/content-template1.php' ) ); ?>

					  <?php
					      $islemag_section_title = get_theme_mod( 'islemag_section2_title', esc_html__( 'Section 2','islemag' ) );
					      $islemag_section_category = get_theme_mod( 'islemag_section2_category', 'all' );
					      $islemag_section_max_posts = get_theme_mod( 'islemag_section2_max_posts', 6 );
					      include( locate_template( 'template-parts/content-template2.php' ) ); ?>


					    <?php
					      $islemag_section_title = get_theme_mod( 'islemag_section3_title', esc_html__( 'Section 3','islemag' ) );
					      $islemag_section_category = get_theme_mod( 'islemag_section3_category', 'all' );
					      $islemag_section_max_posts = get_theme_mod( 'islemag_section3_max_posts', 6 );
					      include( locate_template( 'template-parts/content-template1.php' ) ); ?>


					      <?php
					      $islemag_section_title = get_theme_mod( 'islemag_section4_title', esc_html__( 'Section 4','islemag' ) );
					      $islemag_section_category = get_theme_mod( 'islemag_section4_category', 'all' );
					      $islemag_section_max_posts = get_theme_mod( 'islemag_section4_max_posts' , 12);
					      $postperpage = get_theme_mod( 'islemag_section4_posts_per_page', 6 );
					      include( locate_template( 'template-parts/content-template3.php' ) );
					  ?>

					  <?php
					      $islemag_section_title = get_theme_mod( 'islemag_section5_title', esc_html__( 'Section 5',' islemag' ) );
					      $islemag_section_category = get_theme_mod( 'islemag_section5_category', 'all' );
					      $islemag_section_max_posts = get_theme_mod( 'islemag_section5_max_posts', 8 );
					      include( locate_template( 'template-parts/content-template4.php' ) );
					  ?>
          </div><!-- End .islemag-content-left -->
					<?php get_sidebar(); ?>

				</div><!-- End .row -->
			</div><!-- End .container -->
    <?php
		endif; ?>

<?php get_footer(); ?>
