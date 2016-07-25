<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="islemag-tab-pane active">

	<div class="islemag-tab-pane-center">

		<h1 class="islemag-welcome-title">Welcome to IsleMag! <?php if( !empty($islemag['Version']) ): ?> <sup id="islemag-theme-version"><?php echo esc_attr( $islemag['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php printf( esc_html__( 'Our best free one page magazine WordPress theme, %s!','islemag'), 'IsleMag' ); ?></p>
		<p><?php printf( esc_html__( 'We want to make sure you have the best experience using %s and that is why we gathered here all the necessary informations for you. We hope you will enjoy using %s, as much as we enjoy creating great products.', 'islemag' ), 'IsleMag', 'IsleMag' ); ?>

	</div>

	<hr />

	<div class="islemag-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'islemag' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'islemag' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'islemag' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'islemag' ); ?></a></p>

	</div>

	<hr />

	<div class="islemag-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'islemag' ); ?></h1>

	</div>

	<div class="islemag-tab-pane-half islemag-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'islemag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/14-how-to-create-a-child-theme/' ); ?>" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'islemag' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Build a landing page with a drag-and-drop content builder', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to build a great looking landing page using a drag-and-drop content builder plugin.', 'islemag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/219-how-to-build-a-landing-page-with-a-drag-and-drop-content-builder' ); ?>" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'islemag' ); ?></a></p>

		<hr />

		<h4><?php printf( esc_html__( 'Translate %s', 'islemag' ), 'IsleMag' ); ?></h4>
		<p><?php printf( esc_html__( 'In the below documentation you will find an easy way to translate %s into your native language or any other language you need for you site.', 'islemag' ), 'IsleMag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/80-how-to-translate-islemag' ); ?>" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'islemag' ); ?></a></p>

	</div>

	<div class="islemag-tab-pane-half">

		<h4><?php esc_html_e( 'Speed up your site', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'If you find yourself in the situation where everything on your site is running very slow, you might consider having a look at the below documentation where you will find the most common issues causing this and possible solutions for each of the issues.', 'islemag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/63-speed-up-your-wordpress-site/' ); ?>" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'islemag' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( '30 Experts Share: The Top *Non-Obvious* WordPress Plugins That\'ll Make You a Better Blogger', 'islemag' ); ?></h4>
		<p><?php esc_html_e( ' At the address below you will find a cool set of original WordPress plugins that can give you great benefits despite being a little lesser known out there.', 'islemag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://www.codeinwp.com/blog/top-non-obvious-wordpress-plugins/' ); ?>" class="button" target="_blank"><?php esc_html_e( 'Read more', 'islemag' ); ?></a></p>

		<hr>
		<h4>How to make IsleMag look like the demo</h4>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/334-how-to-make-islemag-look-like-demo' ); ?>" class="button" target="_blank"><?php esc_html_e( 'View how to do this', 'islemag' ); ?></a></p>

	</div>

	<div class="islemag-clear"></div>

	<hr />

	<div class="islemag-tab-pane-center">

		<h1><?php esc_html_e( 'View full documentation', 'islemag' ); ?></h1>
		<p><?php printf( esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use %s.', 'islemag' ), 'IsleMag' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/315-islemag-documentation' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Read full documentation', 'islemag' ); ?></a></p>

	</div>

	<hr />

	<div class="islemag-tab-pane-center">
		<h1><?php esc_html_e( 'Recommended plugins', 'islemag' ); ?></h1>
	</div>

	<div class="islemag-tab-pane-half islemag-tab-pane-first-half">

		<!-- Page Builder by SiteOrigin -->
		<h4><?php esc_html_e( 'Page Builder by SiteOrigin', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'Build responsive page layouts using the widgets you know and love using this simple drag and drop page builder.', 'islemag' ); ?></p>

		<?php if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) { ?>

				<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=siteorigin-panels' ), 'install-plugin_siteorigin-panels' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Page Builder by SiteOrigin', 'islemag' ); ?></a></p>

			<?php
		}

		?>

		<hr />

		<!-- WP Product Review -->
		<h4><?php esc_html_e( 'WP Product Review', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'Easily turn your basic posts into in-depth reviews with ratings, pros and cons, affiliate links, rich snippets and user reviews.', 'islemag' ); ?></p>

		<?php if ( is_plugin_active( 'wp-product-review/wp-product-review.php' ) ) { ?>

				<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wp-product-review' ), 'install-plugin_wp-product-review' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WP Product Review', 'islemag' ); ?></a></p>

			<?php
		}

		?>

		<hr />

		<!-- Custom Login Customizer -->
		<h4><?php esc_html_e( 'Custom Login Customizer', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! You can preview your changes before you save them!', 'islemag' ); ?></p>

		<?php if ( is_plugin_active( 'login-customizer/login-customizer.php' ) ) { ?>

			<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=login-customizer' ), 'install-plugin_login-customizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Custom Login Customizer', 'islemag' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- Adblock Notify -->
		<h4>Adblock Notify</h4>

		<?php if ( is_plugin_active( 'adblock-notify-by-bweb/adblock-notify.php' ) ) { ?>

			<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=adblock-notify-by-bweb' ), 'install-plugin_adblock-notify-by-bweb' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install', 'islemag' ); ?> Adblock Notify</a></p>

			<?php
		}
		?>

	</div>

	<div class="islemag-tab-pane-half">

		<!-- Visualizer: Charts and Graphs -->
		<h4><?php esc_html_e( 'Visualizer: Charts and Graphs', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'A simple, easy to use and quite powerful chart tool to create, manage and embed interactive charts into your WordPress posts and pages.', 'islemag' ); ?></p>

		<?php if ( class_exists( 'Visualizer_Plugin' ) ) { ?>

			<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=visualizer' ), 'install-plugin_visualizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Visualizer', 'islemag' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- ECPT -->
		<h4><?php esc_html_e( 'Easy Content Types', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'Custom Post Types, Taxonomies and Metaboxes in Minutes', 'islemag' ); ?></p>

		<?php if ( is_plugin_active( 'easy-content-types/easy-content-types.php' ) ) { ?>

				<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( 'http://themeisle.com/plugins/easy-content-types/' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Download Easy Content Types', 'islemag' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- Revive Old Post -->
		<h4><?php esc_html_e( 'Revive Old Post', 'islemag' ); ?></h4>
		<p><?php esc_html_e( 'A plugin to share about your old posts on twitter, facebook, linkedin to get more hits for them and keep them alive.', 'islemag' ); ?></p>

		<?php if ( is_plugin_active( 'tweet-old-post/tweet-old-post.php' ) ) { ?>

			<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=tweet-old-post' ), 'install-plugin_tweet-old-post' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Revive Old Post', 'islemag' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- FEEDZY RSS Feeds -->
		<h4>FEEDZY RSS Feeds</h4>

		<?php if ( is_plugin_active( 'feedzy-rss-feeds/feedzy-rss-feed.php' ) ) { ?>

			<p><span class="islemag-w-activated button"><?php esc_html_e( 'Already activated', 'islemag' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=feedzy-rss-feeds' ), 'install-plugin_feedzy-rss-feeds' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install', 'islemag' ); ?> FEEDZY RSS Feeds</a></p>

			<?php
		}
		?>

	</div>

	<div class="islemag-clear"></div>

</div>
