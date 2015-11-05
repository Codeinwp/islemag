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
            <div class="collapse navbar-white" id="header-search-form">
                <form class="navbar-form animated fadeInDown"  role="search">
                    <input type="search" id="s" name="s" class="form-control" placeholder="Search in here...">
                    <button type="submit" title="Search"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- End #header-search-form -->
            <nav class="navbar navbar-white animated-dropdown ttb-dropdown" role="navigation">
                
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
                            <button type="button" class="navbar-btn btn-icon pull-right dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i></button>
                            <button type="button" class="navbar-btn btn-icon pull-right last" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>
                            <div class="dropdown account-dropdown pull-right">
                                <a class="dropdown-toggle" href="#" id="account-dropdown" data-toggle="dropdown" aria-expanded="true">
                                My Account
                                <span class="angle"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="account-dropdown">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="shop-dashboard.html">My Account</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="login.html">Login</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="register.html">Register</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Wishlist</a></li>
                                </ul>
                            </div><!-- End .account-dropdown -->
                            <div class="dropdowns-container pull-right clearfix">
                                <div class="dropdown currency-dropdown pull-right">
                                    <a class="dropdown-toggle" href="#" id="currency-dropdown" data-toggle="dropdown" aria-expanded="true">
                                    Currency
                                    <span class="angle"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="currency-dropdown">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Us Dollar</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Euro</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish TL</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Pound</a></li>
                                    </ul>
                                </div><!-- End .currency-dropdown -->

                                <div class="dropdown language-dropdown pull-right">
                                    <a class="dropdown-toggle" href="#" id="language-dropdown" data-toggle="dropdown" aria-expanded="true">
                                    Languages
                                    <span class="angle"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="language-dropdown">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Spanish</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Turkish</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">German</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Italian</a></li>
                                    </ul>
                                </div><!-- End .curreny-dropdown -->
                            </div><!-- End. dropdowns-container -->

                        </div><!-- End .pull-right -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .navbar-top -->
                <div class="container-fluid">
                    <div class="navbar-header fullwidth not-sticky">

                        <button type="button" class="navbar-toggle pull-right collapsed" data-toggle="collapse" data-target="#main-navbar-container">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="row">
                            <div class="col-md-3 navbar-brand">
                                <?php

                                    $islemag_logo = get_theme_mod('islemag_logo', get_template_directory_uri().'/images/logo-nav.png');



                                    if(!empty($islemag_logo)):

                                        echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo('title').'">';

                                        echo '<img src="'.esc_url($islemag_logo).'" alt="'.get_bloginfo('title').'">';

                                        echo '</a>';

                                        echo '<div class="header-logo-wrap text-header islemag_only_customizer">';

                                        echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';

                                        echo '<p itemprop="description" id="site-description" class="site-description">'.get_bloginfo( 'description' ).'</p>';

                                        echo '</div>';	

                                    else:

                                        if( isset( $wp_customize ) ):

                                            echo '<a href="'.esc_url( home_url( '/' ) ).'" class="islemag_only_customizer" title="'.get_bloginfo('title').'">';

                                            echo '<img src="" alt="'.get_bloginfo('title').'">';

                                            echo '</a>';

                                        endif;

                                        echo '<div class="header-logo-wrap text-header">';

                                        echo '<h1 itemprop="headline" id="site-title" class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';

                                        echo '<p itemprop="description" id="site-description" class="site-description">'.get_bloginfo( 'description' ).'</p>';

                                        echo '</div>';
                                
                                    endif;	

                                ?>
                            </div>
                            
                            <div class="col-md-9 islemag-banner">
                                <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
                            </div>
                        </div>
                        
                        
                        <div class="dropdown cart-dropdown pull-right">
                            <div class="dropdown-menu cart-dropdown-menu" role="menu">
                                <p class="cart-dropdown-desc"><i class="fa fa-cart-plus"></i>You have 2 product(s) in your cart:</p>
                                <hr>
                                <div class="product clearfix">
                                    <a href="#" class="remove-btn" title="Remove"><i class="fa fa-close"></i></a>
                                    <figure>
                                       <a href="product.html" title="Product Name"><!--<img class="img-responsive" src="images/products/thumbs/product1.jpg" alt="Product image">--></a>
                                    </figure>
                                    <div class="product-meta">
                                        <h4 class="product-name"><a href="product.html">Seamsun 3d Smart Tv</a></h4>
                                        <div class="product-quantity">x 2 piece(s)</div><!-- End .product-quantity -->
                                        <div class="product-price-container">
                                            <span class="product-price">$80.50</span>
                                            <span class="product-old-price">$120.50</span>
                                        </div><!-- End .product-price-container -->
                                    </div><!-- End .product-meta -->
                                </div><!-- End .product -->
                                <div class="product clearfix">
                                    <a href="#" class="remove-btn" title="Remove"><i class="fa fa-close"></i></a>
                                    <figure>
                                        <a href="product.html" title="Product Name"><!--<img class="img-responsive" src="images/products/thumbs/product1.jpg" alt="Product image">--></a>
                                    </figure>
                                    <div class="product-meta">
                                        <h4 class="product-name"><a href="product.html">Banana Smart Watch</a></h4>
                                        <div class="product-quantity">x 1 piece(s)</div><!-- End .product-quantity -->
                                        <div class="product-price-container">
                                            <span class="product-price">$120.99</span>
                                        </div><!-- End .product-price-container -->
                                    </div><!-- End .product-meta -->
                                </div><!-- End .product -->
                                <hr>
                                <div class="cart-action">
                                    <div class="pull-left cart-action-total">
                                        <span>Total:</span> $281.99
                                    </div><!-- End .pull-left -->
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-custom no-radius">Go to Cart</a>
                                    </div>
                                </div><!-- End .cart-action -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .navbar-header -->
                </div><!-- /.container-fluid -->


            <nav id="site-navigation" class="main-navigation" role="navigation">
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

        </header><!-- End #header -->

			<div id="content" class="site-content">
