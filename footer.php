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

						<div class="col-md-3 col-sm-6">
							<?php
								global $wp_customize;
								$islemag_footer_logo = get_theme_mod( 'islemag_footer_logo' );
								$islemag_footer_link = get_theme_mod( 'islemag_footer_link', '#' );
								$islemag_footer_text = get_theme_mod( 'islemag_footer_text', '<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a efficitur orci, a dictum nunc.
									Phasellus enim risus, vehicula in est a, lobortis convallis metus. Duis sed accumsan mi.
									Suspendisse eget ultricies est, ac suscipit dui. </p><address>Visit us: <a href="#">Test.com</a><br />Email: <a href="mailto:test@test.com">test@test.com</a><br /><br /><abbr title="copyright">Your Company</abbr> &copy;</address>' );
								$islemag_footer_socials_title = get_theme_mod( 'islemag_footer_socials_title', esc_html__( 'Find Us at:', 'islemag' ) );
								$islemag_footer_social_icons = get_theme_mod( 'islemag_footer_social_icons',json_encode( array(
										array('icon_value' =>'fa-facebook' , 'link' => '#', 'id' => 'islemag_57027801213be'),
										array('icon_value' =>'fa-twitter' , 'link' => '#', 'id' => 'islemag_57027802213bf'),
										array('icon_value' =>'fa-google-plus' , 'link' => '#', 'id' => 'islemag_57027803213c0'),
										array('icon_value' =>'fa-skype' , 'link' => '#', 'id' => 'islemag_57027804213c1'),
										array('icon_value' =>'fa-linkedin' , 'link' => '#', 'id' => 'islemag_57027805213c2')
										)
								) );

								if( !empty( $islemag_footer_logo ) ){
									echo '<a class="islemag-footer-logo" href="'.( !empty( $islemag_footer_link ) ? esc_url( $islemag_footer_link ) : esc_url( home_url( '/' ) ) ).'">';
									echo '<img src="'.esc_url( $islemag_footer_logo ).'" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'">';
									echo '</a>';
								} else {
									if( isset( $wp_customize ) ):
										echo '<a class="islemag-footer-logo" href="">';
										echo '<img src="" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'">';
										echo '</a>';
									endif;
								}

								if( !empty( $islemag_footer_text ) ){
									echo '<div class="islemag-footer-content">'.$islemag_footer_text.'</div>';
								} else {
									if( isset( $wp_customize ) ):
										echo '<div class="islemag-footer-content"></div>';
									endif;
								}

								if( !empty( $islemag_footer_socials_title ) ){
									echo '<span class="social-icons-label">'.$islemag_footer_socials_title.'</span>';
								} else {
									if( isset( $wp_customize ) ):
										echo '<span class="social-icons-label"></span>';
									endif;
								}
							?>
							<div class="footer-social-icons">
							<?php
									if( !empty( $islemag_footer_social_icons ) ){
			                            $islemag_footer_social_icons_decode = json_decode( $islemag_footer_social_icons );
			                            if( !empty( $islemag_footer_social_icons_decode ) ){
			                                foreach( $islemag_footer_social_icons_decode as $icon ){
			                                    if( !empty( $icon->icon_value ) )
			                                    echo '<a '.( empty( $icon->link ) ? '' : 'href="'. esc_url( $icon->link ).'"' ).' class="footer-social-icon"><i class="fa '.esc_attr( $icon->icon_value ).'"></i></a>';
			                                }
			                            }
			                        }
							?>
							</div><!-- .footer-social-icons -->
						</div><!-- .col-md-3.col-sm-6 -->

                        <?php if( is_active_sidebar( 'islemag-first-footer-area' ) ){ ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" class="col-md-3 col-sm-6" id="sidebar-widgets-area-1" aria-label="<?php esc_html_e('Widgets Area 1','islemag'); ?>">
                                    <?php dynamic_sidebar( 'islemag-first-footer-area' ); ?>
                                </div>
                        <?php }

								if( is_active_sidebar( 'islemag-second-footer-area' ) ){ ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-2" class="col-md-3 col-sm-6" aria-label="<?php esc_html_e('Widgets Area 2','islemag'); ?>">
                                    <?php dynamic_sidebar( 'islemag-second-footer-area' ); ?>
                                </div>
                        <?php }

								if( is_active_sidebar( 'islemag-third-footer-area' ) ){ ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-3" class="col-md-3 col-sm-6" aria-label="<?php esc_html_e('Widgets Area 3','islemag'); ?>">
                                   <?php dynamic_sidebar( 'islemag-third-footer-area' ); ?>
                                </div>
                        <?php
                            	}
						?>

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-inner -->
            <div id="footer-bottom" class="no-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <?php

                                $defaults = array(
                                    'theme_location'  => 'islemag-footer',
                                    'fallback_cb'     => false,
                                    'items_wrap'      => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                );

                                wp_nav_menu( $defaults );

                            ?>
                        </div><!-- End .col-md-6 -->
                        <div class="col-md-6 col-md-pull-6 powerdby">
							<?php printf(
								__( '%1$s powered by %2$s', 'islemag' ),
								sprintf( '<a href="https://themeisle.com/themes/islemag/" rel="nofollow">%s</a>', esc_html__( 'Islemag', 'islemag' ) ),
								sprintf( '<a href="http://wordpress.org/" rel="nofollow">%s</a>', esc_html__( 'WordPress', 'islemag' ) )
							); ?>
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End #footer-bottom -->
        </footer><!-- End #footer -->
	</div><!-- #page -->
</div><!-- End #wrapper -->
<?php wp_footer(); ?>

</body>
</html>