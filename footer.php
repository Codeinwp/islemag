<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package islemag
 */

?>

		</div><!-- #content -->

		<footer id="footer" class="footer-inverse" role="contentinfo">
			<div id="footer-inner">
				<div class="container">
					<div class="row">

						<div class="col-md-3 col-sm-12">
							<?php
								global $wp_customize;
								$islemag_footer_logo = get_theme_mod( 'islemag_footer_logo' );
								$islemag_footer_link = get_theme_mod( 'islemag_footer_link' );
								$islemag_footer_text = get_theme_mod( 'islemag_footer_text' );
								$islemag_footer_socials_title = get_theme_mod( 'islemag_footer_socials_title' );
								$islemag_footer_social_icons = get_theme_mod( 'islemag_footer_social_icons' );

							if ( ! empty( $islemag_footer_logo ) ) {
								echo '<a class="islemag-footer-logo" href="' . ( ! empty( $islemag_footer_link ) ? esc_url( $islemag_footer_link ) : esc_url( home_url( '/' ) ) ) . '">';
								echo '<img src="' . esc_url( $islemag_footer_logo ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">';
								echo '</a>';
							} else {
								if ( isset( $wp_customize ) ) :
									echo '<a class="islemag-footer-logo" href="">';
									echo '<img src="" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">';
									echo '</a>';
									endif;
							}

							if ( ! empty( $islemag_footer_text ) ) {
								echo '<div class="islemag-footer-content">' . $islemag_footer_text . '</div>';
							} else {
								if ( isset( $wp_customize ) ) :
									echo '<div class="islemag-footer-content"></div>';
									endif;
							}

							if ( ! empty( $islemag_footer_socials_title ) ) {
								echo '<span class="social-icons-label">' . $islemag_footer_socials_title . '</span>';
							} else {
								if ( isset( $wp_customize ) ) :
									echo '<span class="social-icons-label"></span>';
									endif;
							}
							?>
							<div class="footer-social-icons">
							<?php
							if ( ! empty( $islemag_footer_social_icons ) ) {
								$islemag_footer_social_icons_decode = json_decode( $islemag_footer_social_icons );
								if ( ! empty( $islemag_footer_social_icons_decode ) ) {
									foreach ( $islemag_footer_social_icons_decode as $icon ) {
										if ( ! empty( $icon->icon_value ) ) {
											echo '<a ' . ( empty( $icon->link ) ? '' : 'href="' . esc_url( $icon->link ) . '"' ) . ' class="footer-social-icon"><i class="fa ' . esc_attr( $icon->icon_value ) . '"></i></a>';
										}
									}
								}
							}
							?>
							</div><!-- .footer-social-icons -->
						</div><!-- .col-md-3.col-sm-6 -->

						<?php if ( is_active_sidebar( 'islemag-first-footer-area' ) ) {  ?>
								<div itemscope itemtype="http://schema.org/WPSideBar" class="col-md-3 col-sm-12" id="sidebar-widgets-area-1" aria-label="<?php esc_html_e( 'Widgets Area 1','islemag' ); ?>">
									<?php dynamic_sidebar( 'islemag-first-footer-area' ); ?>
								</div>
						<?php }

if ( is_active_sidebar( 'islemag-second-footer-area' ) ) {  ?>
								<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-2" class="col-md-3 col-sm-12" aria-label="<?php esc_html_e( 'Widgets Area 2','islemag' ); ?>">
									<?php dynamic_sidebar( 'islemag-second-footer-area' ); ?>
								</div>
						<?php }

if ( is_active_sidebar( 'islemag-third-footer-area' ) ) {  ?>
								<div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-3" class="col-md-3 col-sm-12" aria-label="<?php esc_html_e( 'Widgets Area 3','islemag' ); ?>">
									<?php dynamic_sidebar( 'islemag-third-footer-area' ); ?>
								</div>
						<?php
}
						?>

					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End #footer-inner -->
			<div id="footer-bottom" class="no-bg">
				<div class="islemag-footer-container">
					<?php
					islemag_footer_container_head();

					islemag_footer_content();

	                islemag_footer_container_bottom();?>

				</div><!-- End .row -->
			</div><!-- End #footer-bottom -->
		</footer><!-- End #footer -->
	</div><!-- #page -->
</div><!-- End #wrapper -->
<?php wp_footer(); ?>

</body>
</html>
