<?php
/**
 * Github
 */
?>

<div id="github" class="islemag-tab-pane">

	<h1><?php esc_html_e( 'How can I contribute?', 'islemag' ); ?></h1>

	<hr/>

	<div class="islemag-tab-pane-half islemag-tab-pane-first-half">
		<p><strong><?php esc_html_e( 'Found a bug? Want to contribute with a fix or create a new feature?','islemag'); ?></strong></p>

		<p><?php esc_html_e( 'GitHub is the place to go!','islemag' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://github.com/Codeinwp/islemag' ); ?>" class="github-button button button-primary"><?php esc_html_e( 'Islemag on GitHub', 'islemag' ); ?></a>
		</p>
		<hr>
	</div>

	<div class="islemag-tab-pane-half">
		<p><strong><?php esc_html_e( 'Are you a polyglot? Want to translate Islemag into your own language?', 'islemag' ); ?></strong></p>

		<p><?php esc_html_e( 'Get involved at WordPress.org.', 'islemag' ); ?></p>

		<p>
			<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/islemag' ); ?>" class="translate-button button button-primary"><?php _e( 'Translate Islemag', 'islemag' ); ?></a>
		</p>
		<hr>
	</div>

	<div>
		<h4><?php esc_html_e( 'Are you enjoying Islemag?', 'islemag' ); ?></h4>

		<p class="review-link"><?php echo sprintf( esc_html__( 'Rate our theme on %sWordPress.org%s. We\'d really appreciate it!', 'islemag' ), '<a href="https://wordpress.org/support/view/theme-reviews/islemag#postform/">', '</a>' ); ?></p>

		<p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
	</div>

</div>
