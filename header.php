<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package islemag
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	$wrapper_class = apply_filters( 'islemag_wrapper_class', array( 'boxed' ) ); ?>
	<div id="wrapper" <?php if ( ! empty( $wrapper_class ) ) { echo 'class="' . implode( ' ', $wrapper_class ) . '"';}?>>

		<header id="header" class="site-header" role="banner">
			<?php
			$navbar_top_classes = apply_filters( 'islemag_navbar_top_classes', array( 'navbar-top', 'container-fluid' ) ); ?>
			<div <?php if ( ! empty( $navbar_top_classes ) ) { echo 'class="' . implode( ' ', $navbar_top_classes ) . '"';} ?>>
				<?php
				islemag_navbar_top_head(); ?>
				<div class="navbar-left social-icons">
					<?php
						$islemag_social_icons = get_theme_mod( 'islemag_social_icons' );

					if ( ! empty( $islemag_social_icons ) ) {
						$islemag_social_icons_decode = json_decode( $islemag_social_icons );
						if ( ! empty( $islemag_social_icons_decode ) ) {
							foreach ( $islemag_social_icons_decode as $icon ) {
								if ( ! empty( $icon->icon_value ) ) {
									echo '<a ' . ( empty( $icon->link ) ? '' : 'href="' . esc_url( $icon->link ) . '"' ) . ' class="social-icon"><i class="fa ' . esc_attr( $icon->icon_value ) . '"></i></a>';
								}
							}
						}
					}
					?>
				</div>

				<button type="button" class="navbar-btn"><i class="fa fa-search"></i></button>

				<div class="navbar-right">
				  <div id="navbar" class="navbar">
							<nav id="top-navigation" class="navigation top-navigation" role="navigation">
								<button class="menu-toggle"><?php _e( 'Menu', 'islemag' ); ?></button>
								<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'islemag' ); ?>"><?php _e( 'Skip to content', 'islemag' ); ?></a>
								<?php wp_nav_menu( array(
									'theme_location' => 'islemag-header',
									'menu_class' => 'nav-menu',
									'menu_id' => 'primary-menu',
									'depth' => 1,
								) ); ?>
							</nav><!-- #site-navigation -->
						</div><!-- #navbar -->
				</div>
				<div class="navbar-white top" id="header-search-form">
					<?php get_search_form(); ?>
				</div><!-- End #header-search-form -->
				<?php
				islemag_navbar_top_bottom();?>
			</div>

			<div class="header-content clearfix">
				<?php
				islemag_header_content_head(); ?>
				<div class="col-md-3 col-sm-3 col-xs-12 navbar-brand">
					<?php
						global $wp_customize;

					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :
						the_custom_logo();
						echo '<div class="header-logo-wrap text-header islemag_only_customizer">';
						echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
						echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
						echo '</div>';

						else :

							if ( isset( $wp_customize ) ) :

								echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link islemag_only_customizer" title="' . esc_attr( get_bloginfo( 'title' ) ) . '">';
								echo '<img src="">';
								echo '</a>';

							endif;

							echo '<div class="header-logo-wrap text-header">';
							echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
							echo '<p itemprop="description" id="site-description" class="site-description">' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
							echo '</div>';

						endif;
					?>
				</div>
			
				<div class="col-md-9 col-sm-9 col-xs-12 islemag-banner">
					<?php
					if ( is_active_sidebar( 'islemag-header-ad' ) ) {
						dynamic_sidebar( 'islemag-header-ad' );
					} else {
						the_widget(
							'Islemag_Content_Ad',
							array(
								'link_ad'  => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
								'image_uri_ad'   => apply_filters( 'islemag_default_top_banner_filter', get_template_directory_uri() . '/img/banner_placeholder.png' ),
								'ad_type' => 'image',
							),
							array(
								'before_widget' => '<div id="islemag_content_ad-widget-2" class="widget islemag_content_ad">',
								'after_widget'  => '</div>',
							)
						);
					} ?>
				</div>
				<?php
				islemag_header_content_bottom(); ?>
			</div>

			<?php
			islemag_main_nav_before(); ?>
			<?php $islemag_sticky_menu = get_theme_mod( 'islemag_sticky_menu', false ); ?>
			<div id="navbar" class="navbar <?php if ( isset( $islemag_sticky_menu ) && $islemag_sticky_menu == false ) { echo 'islemag-sticky';} ?>">
			  <nav id="site-navigation" class="navigation main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'islemag' ); ?></button>
				<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'islemag' ); ?>"><?php _e( 'Skip to content', 'islemag' ); ?></a>
				<?php wp_nav_menu( array(
					'theme_location' => 'islemag-primary',
					'menu_class' => 'nav-menu',
					'menu_id' => 'primary-menu',
					'depth' => 6,
				) ); ?>
			  </nav><!-- #site-navigation -->
			</div><!-- #navbar -->
			<?php
			islemag_main_nav_after(); ?>


		</header><!-- End #header -->
		<?php
		$islemag_content_classes = apply_filters( 'islemag_content_classes', array( 'site-content' ) );
		$islemag_content_ids = apply_filters( 'islemag_content_ids', array( 'content' ) ); ?>
		<div <?php if ( ! empty( $islemag_content_ids ) ) { echo 'id="' . implode( ' ', $islemag_content_ids ) . '"'; } ?> <?php if ( ! empty( $islemag_content_classes ) ) {  echo 'class="' . implode( ' ', $islemag_content_classes ) . '"'; }?>>
