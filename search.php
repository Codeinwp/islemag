<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package islemag
 */

get_header(); ?>
<div class="container">
	<div class="row">
	    <?php
	    $archive_content_classes = apply_filters( 'islemag_archive_content_classes',array( 'islemag-content-left', 'col-md-9' ) ); ?>
	    <div <?php if ( ! empty( $archive_content_classes ) ) { echo 'class="' . implode( ' ', $archive_content_classes ) . '"'; } ?>>


		<?php

		if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php /* translators: Search query */ printf( esc_html__( 'Search Results for: %s', 'islemag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) : the_post();

						/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
						get_template_part( 'template-parts/content', 'search' );

			endwhile;

				echo apply_filters( 'islemag_post_navigation_filter', get_the_posts_navigation() ); ?>

			<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
