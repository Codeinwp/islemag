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

															if( is_active_sidebar( 'islemag-fourth-footer-area' ) ){ ?>
                                <div itemscope itemtype="http://schema.org/WPSideBar" role="complementary" id="sidebar-widgets-area-4" class="col-md-3 col-sm-6" aria-label="<?php esc_html_e('Widgets Area 4','islemag'); ?>">
                                    <?php dynamic_sidebar( 'islemag-fourth-footer-area' ); ?>
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
                                    'theme_location'  => 'footer',
                                    'fallback_cb'     => false,
                                    'items_wrap'      => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                );

                                wp_nav_menu( $defaults );

                            ?>
                        </div><!-- End .col-md-6 -->
                        <div class="col-md-6 col-md-pull-6 powerdby">
	                      	<a class="" href="https://themeisle.com/themes/islemag/" target="_blank" rel="nofollow">Islemag </a> <?php printf( esc_html__( ' proudly powered by %s', 'islemag' ),'<a href="https://wordpress.org/">'.esc_html__( 'WordPress', 'islemag' ).'</a>' ); ?>
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
