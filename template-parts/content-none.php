<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

?>
	<div class="container">
	<div class="row">

	  <section class="no-results not-found col-md-9">
		<header class="page-header">
		  <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'islemag' ); ?></h1>
		</header><!-- End .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			  <p>
				<?php
				/* translators: Add new post link */
				printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'islemag' ), array(
					'a' => array(
					'href' => array(),
					),
				) ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
			  </p>
			<?php
			elseif ( is_search() ) : ?>
			  <p>
				<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'islemag' ); ?>
			  </p>
			<?php
			  get_search_form();
			else : ?>
			  <p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'islemag' ); ?>
			  </p>
			<?php
			get_search_form();
			endif; ?>
		</div><!-- End .page-content -->
	  </section><!-- End .no-results -->

	</div><!-- End .row -->
	</div><!-- End .container -->
