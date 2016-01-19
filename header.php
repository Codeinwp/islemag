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
    <div id="wrapper" class="boxed">

        <header id="header" class="site-header" role="banner">
            <div class="collapse navbar-white" id="header-search-form">
              <?php get_search_form(); ?>
            </div><!-- End #header-search-form -->
            <div class="navbar-top container-fluid">
                <div class="navbar-left social-icons">
                    <?php
                        $islemag_social_icons = get_theme_mod('islemag_social_icons',json_encode(
                            array(
                                array('icon_value' =>'fa-facebook-official' , 'link' => '#'),
                                array('icon_value' =>'fa-google' , 'link' => '#'),
                                array('icon_value' =>'fa-instagram' , 'link' => '#')
                            )
                        ));

                        if( !empty( $islemag_social_icons ) ){
                            $islemag_social_icons_decode = json_decode( $islemag_social_icons );
                            if( !empty( $islemag_social_icons_decode ) ){
                                foreach( $islemag_social_icons_decode as $icon ){
                                    if( !empty( $icon->icon_value ) )
                                    echo '<a '.( empty( $icon->link ) ? '' : 'href="'. esc_url( $icon->link ).'"' ).' class="social-icon"><i class="fa '.esc_attr( $icon->icon_value ).'"></i></a>';
                                }
                            }
                        }
                    ?>
                </div>

                <button type="button" class="navbar-btn collapsed" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>

                <div class="navbar-right">
                  <div id="navbar" class="navbar">
            				<nav id="top-navigation" class="navigation top-navigation" role="navigation">
            					<button class="menu-toggle"><?php _e( 'Menu', 'islemag' ); ?></button>
            					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'islemag' ); ?>"><?php _e( 'Skip to content', 'islemag' ); ?></a>
            					<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu', 'depth' => 1 ) ); ?>
            				</nav><!-- #site-navigation -->
            			</div><!-- #navbar -->
                </div>
            </div>

            <div class="header-content clearfix">
                <div class="col-md-3 col-sm-3 col-xs-12 navbar-brand">
                    <?php
                        global $wp_customize;
                        $islemag_logo = get_theme_mod( 'islemag_logo' );

                        if(!empty($islemag_logo)):

                            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="islemag_logo" title="'. esc_attr( get_bloginfo( 'title' ) ) .'">';
                            echo '<img src="'.esc_url( $islemag_logo ).'" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'">';
                            echo '</a>';
                            echo '<div class="header-logo-wrap text-header islemag_only_customizer">';
                            echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
                            echo '<p itemprop="description" id="site-description" class="site-description">'.esc_attr( get_bloginfo( 'description' ) ).'</p>';
                            echo '</div>';

                        else:

                            if( isset( $wp_customize ) ):

                                echo '<a href="'.esc_url( home_url( '/' ) ).'" class="islemag_logo islemag_only_customizer" title="'.esc_attr( get_bloginfo( 'title' ) ).'">';
                                echo '<img src="" alt="'.esc_attr( get_bloginfo( 'title' ) ).'">';
                                echo '</a>';

                            endif;

                            echo '<div class="header-logo-wrap text-header">';
                            echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.esc_attr( get_bloginfo( 'name' ) ).'</a></h1>';
                            echo '<p itemprop="description" id="site-description" class="site-description">'.esc_attr( get_bloginfo( 'description' ) ).'</p>';
                            echo '</div>';

                        endif;
                    ?>
                </div>


                    <?php
                        $islemag_banner = get_theme_mod( 'islemag_banner', json_encode( array( 'choice' => 'image', 'position' => 'center', 'banner_link' => '#' ) ) );
                        $banner = json_decode( $islemag_banner, true );
                        if( !empty( $banner ) ){
                          if ( !empty( $banner['position'] ) ){
                            echo '<div class="col-md-9 col-sm-9 col-xs-12 islemag-banner" style=" text-align:'. esc_html__( $banner['position'] ) .' ">';
                          } else {
                            echo '<div class="col-md-9 col-sm-9 col-xs-12 islemag-banner">';
                          }

                          if( $banner['choice'] == 'code' ){
                            if( !empty( $banner['code'] ) ){
                              echo islemag_html_entity_decode ( $banner['code'] );
                            }
                          } else {
                            if( !empty( $banner['link'] ) && !empty( $banner['image_url'] ) ){
                              echo '<a href="'. esc_url( $banner['link'] ) .'"><img src="'. esc_url( $banner['image_url'] ) .'" alt="'. esc_html__( 'Banner link', 'islemag').'"></a>';
                            } elseif ( !empty( $banner['image_url'] ) ){
                              echo '<img src="'. esc_url( $banner['image_url'] ) .'" alt="'. esc_html__( 'Banner link', 'islemag').'">';
                            }
                          }

                          echo '</div>';
                        } ?>

            </div>
            <?php $islemag_sticky_menu = get_theme_mod( 'islemag_sticky_menu', false ); ?>
            <div id="navbar" class="islemag-sticky navbar <?php if( isset( $islemag_sticky_menu ) && $islemag_sticky_menu == false ) echo 'sticky-menu';?>">
              <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                <button class="menu-toggle"><?php _e( 'Menu', 'islemag' ); ?></button>
                <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'islemag' ); ?>"><?php _e( 'Skip to content', 'islemag' ); ?></a>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu', 'depth' => 0 ) ); ?>
              </nav><!-- #site-navigation -->
            </div><!-- #navbar -->



        </header><!-- End #header -->

			<div id="content" class="site-content">
