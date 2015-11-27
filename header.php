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
	
	<!--div class="boss-loader-overlay"></div--><!-- End .boss-loader-overlay -->
    <div id="wrapper" class="boxed-long">
        <header id="header" class="no-border" role="banner">
            
            <div class="navbar navbar-white animated-dropdown ttb-dropdown" role="navigation">
                
                <div class="navbar-top clearfix">
                    <div class="container-fluid">
                        <div class="pull-left">
                            <div class="social-icons hidden-xs">
                                <?php
                                    $islemag_social_icons = get_theme_mod('islemag_social_icons',json_encode(
                                        array(
                                            array('icon_value' =>'fa-facebook-official' , 'link' => '#'),
                                            array('icon_value' =>'fa-google' , 'link' => '#'),
                                            array('icon_value' =>'fa-instagram' , 'link' => '#')
                                        )
                                    ));
                                
                                    if(!empty($islemag_social_icons)){
                                        $islemag_social_icons_decode = json_decode($islemag_social_icons);
                                        if(!empty($islemag_social_icons_decode)){
                                            foreach($islemag_social_icons_decode as $icon){
                                                if(!empty($icon->icon_value))
                                                echo '<a '.( empty($icon->link) ? '' : 'href="'.$icon->link.'"' ).' class="social-icon"><i class="fa '.$icon->icon_value.'"></i></a>';
                                            }
                                        }
                                    }
                                ?>
                            </div><!-- End .social-icons -->
                        </div><!-- End .pull-left -->

                        <div class="pull-right">
                            <button type="button" class="navbar-btn btn-icon pull-right last" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>
                            
                            
                            
                          
                               <!-- <a class="dropdown-toggle" href="#" id="account-dropdown" data-toggle="dropdown" aria-expanded="true">
                                My Account
                                <span class="angle"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="account-dropdown">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="shop-dashboard.html">My Account</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="login.html">Login</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="register.html">Register</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Wishlist</a></li>
                                </ul>-->
                                
                                <?php

                                    $defaults = array(
                                        'theme_location'  => 'header',
                                        'container'       => 'div',
                                        'container_class' => 'dropdown account-dropdown pull-right',
                                        'container_id'    => 'account-dropdown',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 1,
                                    );

                                    wp_nav_menu( $defaults );

                                ?>
                        
                            
                            
                            
                        </div><!-- End .pull-right -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .navbar-top -->
            
                

                
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'islemag' ); ?></button>
                    <?php

                        $defaults = array(
                            'theme_location'  => 'primary',
                            'container'       => 'div',
                            'container_class' => 'collapse navbar-collapse collapse-row',
                            'container_id'    => 'main-navbar-container',
                            'menu_class'      => 'nav navbar-nav navbar-nav-colored navbar-nav-border',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                        );

                        wp_nav_menu( $defaults );

                    ?>
                </nav><!-- #site-navigation -->
            
            </div>
            <div class="collapse navbar-white" id="header-search-form">
                <form class="navbar-form animated fadeInDown"  role="search">
                    <input type="search" id="s" name="s" class="form-control" placeholder="Search in here...">
                </form>
            </div><!-- End #header-search-form -->
        </header><!-- End #header -->

			<div id="content" class="site-content">
