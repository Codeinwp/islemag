<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package islemag
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="error-page text-center">
				<div class="container">
						<h2 class="error-title"><?php esc_html_e( '404', 'islemag' ); ?></h2>
						<h3 class="error-subtitle"><?php esc_html_e( 'Page Not Found', 'islemag' ); ?></h3>

						<p class="error-text center-block"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'islemag' ); ?></p>

						<?php get_search_form(); ?>
				</div><!-- End .container -->
		</div><!-- End .error-page -->
	</div><!-- End .row -->
</div><!-- End .container -->


<?php get_footer(); ?>
