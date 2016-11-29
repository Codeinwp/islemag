<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<?php
		$archive_content_classes = apply_filters( 'islemag_archive_content_classes',array( 'islemag-content-left', 'col-md-9' ) ); ?>
		<div <?php if ( ! empty( $archive_content_classes ) ) { echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; } ?>>
			<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php

						while ( have_posts() ) : the_post();

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



<?php get_footer(); ?>
