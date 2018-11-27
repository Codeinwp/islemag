<?php
/**
 * Frontpage
 *
 * @package WordPress
 * @subpackage Islemag.
 */

get_header();

$islemag_header_slider_category  = esc_attr( get_theme_mod( 'islemag_header_slider_category', 'all' ) );
$islemag_header_slider_max_posts = esc_attr( get_theme_mod( 'islemag_header_slider_max_posts', '6' ) );
$islemag_section1_fullwidth      = get_theme_mod( 'islemag_section1_fullwidth', false );
$islemag_section2_fullwidth      = get_theme_mod( 'islemag_section2_fullwidth', false );
$islemag_section3_fullwidth      = get_theme_mod( 'islemag_section3_fullwidth', false );
$islemag_section4_fullwidth      = get_theme_mod( 'islemag_section4_fullwidth', false );
$islemag_section5_fullwidth      = get_theme_mod( 'islemag_section5_fullwidth', false );
$islemag_header_slider_disable   = (bool) get_theme_mod( 'islemag_header_slider_disable', false );
$islemag_header_slider_random    = (bool) get_theme_mod( 'islemag_header_slider_random', false );
$islemag_section1_disable        = (bool) get_theme_mod( 'islemag_section1_disable', false );
$islemag_section2_disable        = (bool) get_theme_mod( 'islemag_section2_disable', false );
$islemag_section3_disable        = (bool) get_theme_mod( 'islemag_section3_disable', false );
$islemag_section4_disable        = (bool) get_theme_mod( 'islemag_section4_disable', false );
$islemag_section5_disable        = (bool) get_theme_mod( 'islemag_section5_disable', false );

$wp_query = new WP_Query(
	array(
		'posts_per_page' => $islemag_header_slider_max_posts,
		'orderby'        => ( (bool) $islemag_header_slider_random == false ? 'date' : 'rand' ),
		'order'          => 'DESC',
		'post_status'    => 'publish',
		'category_name'  => ( ! empty( $islemag_header_slider_category ) && $islemag_header_slider_category != 'all' ? $islemag_header_slider_category : '' ),
	)
);

if ( (bool) $islemag_header_slider_disable !== true ) {
	if ( $wp_query->have_posts() ) { ?>

		<div class="islemag-top-container">
			<div class="owl-carousel islemag-top-carousel rect-dots">
				<?php
				while ( $wp_query->have_posts() ) :
					$wp_query->the_post();
					get_template_part( 'template-parts/slider-posts', get_post_format() );
				endwhile;
				?>
			</div><!-- End .islemag-top-carousel -->
		</div><!-- End .islemag-top-container -->

		<?php
	} else {
		get_template_part( 'template-parts/content', 'none' );
	}
	wp_reset_postdata();
}
?>

	<div class="container">
		<div class="row">

			<?php
			$archive_content_classes = apply_filters( 'islemag_archive_content_classes', array( 'islemag-content-left', 'col-md-9' ) );
			?>
			<div 
			<?php
			if ( ! empty( $archive_content_classes ) ) {
				echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; }
			?>
>
				<?php

				/* ---------Section 1--------- */
				if ( ! $islemag_section1_fullwidth && ! $islemag_section1_disable ) {
					islemag_display_section( 1 );
				}

				/* ---------Section 2--------- */
				if ( ! $islemag_section2_fullwidth && ! $islemag_section2_disable ) {
					islemag_display_section( 2 );
				}

				/* ---------Section 3--------- */
				if ( ! $islemag_section3_fullwidth && ! $islemag_section3_disable ) {
					islemag_display_section( 3 );
				}

				/* ---------Section 4--------- */
				if ( ! $islemag_section4_fullwidth && ! $islemag_section4_disable ) {
					islemag_display_section( 4 );
				}

				/* ---------Section 5--------- */
				if ( ! $islemag_section5_fullwidth && ! $islemag_section5_disable ) {
					islemag_display_section( 5 );
				}
				?>

			</div><!-- End .islemag-content-left -->

			<?php
			get_sidebar();
			?>


			<?php
			if ( $islemag_section1_fullwidth == true ||
				$islemag_section2_fullwidth == true ||
				$islemag_section3_fullwidth == true ||
				$islemag_section4_fullwidth == true ||
				$islemag_section5_fullwidth == true ) {
				?>


				<div class="col-md-12 islemag-fullwidth">
					<?php
					/* ---------Section 1--------- */
					if ( $islemag_section1_fullwidth && ! $islemag_section1_disable ) {
						islemag_display_section( 1 );
					}

					/* ---------Section 2--------- */
					if ( $islemag_section2_fullwidth && ! $islemag_section2_disable ) {
						islemag_display_section( 2 );
					}

					/* ---------Section 3--------- */
					if ( $islemag_section3_fullwidth && ! $islemag_section3_disable ) {
						islemag_display_section( 3 );
					}

					/* ---------Section 4--------- */
					if ( $islemag_section4_fullwidth && ! $islemag_section4_disable ) {
						islemag_display_section( 4 );
					}

					/* ---------Section 5--------- */
					if ( $islemag_section5_fullwidth && ! $islemag_section5_disable ) {
						islemag_display_section( 5 );
					}
					?>
				</div>
				<?php
			} else {
				if ( is_customize_preview() ) {
					echo '<div class="col-md-12 islemag-fullwidth"></div>';
				}
			}// End if().
			?>
		</div><!-- End .row -->
	</div><!-- End .container -->
<?php
get_footer();
