<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package islemag
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<?php
			$archive_content_classes = apply_filters( 'islemag_archive_content_classes',array( 'islemag-content-left', 'col-md-9' ) ); ?>
			<div <?php if ( ! empty( $archive_content_classes ) ) { echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; } ?>>
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
