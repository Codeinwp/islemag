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
 * @package Islemag
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<?php
		$archive_content_classes = apply_filters( 'islemag_archive_content_classes', array( 'islemag-content-left', 'col-md-9' ) );
		?>
		<div 
		<?php
		if ( ! empty( $archive_content_classes ) ) {
			echo 'class="' . implode( ' ', $archive_content_classes ) . '"';}
		?>
			>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				echo apply_filters( 'islemag_post_navigation_filter', get_the_posts_navigation() );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div><!-- End .islemag-content-left -->
		<?php get_sidebar(); ?>

	</div><!-- End .row -->
</div><!-- End .container -->
<?php
wp_reset_postdata();
get_footer(); ?>
