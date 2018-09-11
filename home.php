<?php
/**
 * This file adds the Home Page to the theme.
 *
 * @package WordPress
 * @subpackage Islemag
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
			echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; }
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
