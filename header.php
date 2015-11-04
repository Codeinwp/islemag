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

                <div class="sticky-menu">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse collapse-row " id="main-navbar-container">
                            <ul class="nav navbar-nav navbar-nav-colored navbar-nav-border">
                                <li class="dropdown active megamenu-container">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Home<span class="angle"></span></a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="index.html">Home - Version 1</a></li>
                                                        <li><a href="index2.html">Home - Version 2</a></li>
                                                        <li><a href="index3.html">Home - Version 3</a></li>
                                                        <li><a href="index4.html">Home - Version 4</a></li>
                                                        <li><a href="index5.html">Home - Version 5</a></li>
                                                        <li><a href="index6.html">Home - Version 6</a></li>
                                                        <li><a href="index7.html">Home - Version 7</a></li>
                                                        <li><a href="index8.html">Home - Version 8</a></li>
                                                        <li><a href="index9.html">Home - Version 9</a></li>
                                                        <li><a href="index10.html">Home - Version 10</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="index11.html">Home - Version 11</a></li>
                                                        <li><a href="index12.html">Home - Version 12</a></li>
                                                        <li><a href="index13.html">Home - Portfolio 1</a></li>
                                                        <li><a href="index14.html">Home - Portfolio 2</a></li>
                                                        <li><a href="index15.html">Home - Portfolio 3</a></li>
                                                        <li><a href="index16.html">Home - Portfolio 4</a></li>
                                                        <li><a href="index17.html">Home - Portfolio 5</a></li>
                                                        <li><a href="index18.html">Home - Portfolio 6</a></li>
                                                        <li><a href="index19.html">Home - Portfolio 7</a></li>
                                                        <li><a href="index20.html">Home - Blog 1</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="index21.html">Home - Blog 2</a></li>
                                                        <li><a href="index22.html">Home - Blog 3</a></li>
                                                        <li><a href="index23.html">Home - Magazine 1</a></li>
                                                        <li><a href="index24.html">Home - Magazine 2</a></li>
                                                        <li><a href="index25.html">Home - Shop 1</a></li>
                                                        <li><a href="index26.html">Home - Shop 2</a></li>
                                                        <li><a href="index27.html">Home - Shop 3</a></li>
                                                        <li><a href="index28.html">Home - Shop 4</a></li>
                                                        <li><a href="index29.html">Home - Landing 1</a></li>
                                                        <li><a href="index30.html">Home - Landing 2</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="index31.html">Home - Landing 3</a></li>
                                                        <li><a href="index32.html">Home - Onepage 1</a></li>
                                                        <li><a href="index33.html">Home - Onepage 2</a></li>
                                                        <li><a href="index34.html">Home - Onepage 3</a></li>
                                                        <li><a href="index35.html">Home - Onepage 4</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .container -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="dropdown megamenu-container">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pages<span class="angle"></span></a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="aboutus.html">About - Agency</a></li>
                                                        <li><a href="aboutus2.html">About - Agency 2</a></li>
                                                        <li><a href="aboutus3.html">About - Agency 3</a></li>
                                                        <li><a href="aboutus4.html">About - Agency 4</a></li>
                                                        <li><a href="aboutus5.html">About - Agency 5</a></li>
                                                        <li><a href="aboutme.html">About - Personal</a></li>
                                                        <li><a href="aboutme2.html">About - Personal 2</a></li>
                                                        <li><a href="aboutme3.html">About - Personal 3</a></li>
                                                        <li><a href="aboutme4.html">About - Personal 4</a></li>
                                                        <li><a href="services1.html">Services - Page 1</a></li>
                                                        <li><a href="services2.html">Services - Page 2</a></li>
                                                        <li><a href="services3.html">Services - Page 3</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="services4.html">Services - Page 4</a></li>
                                                        <li><a href="services5.html">Services - Page 5</a></li>
                                                        <li><a href="services6.html">Services - Page 6</a></li>
                                                        <li><a href="pricing.html">Pricing Tables 1</a></li>
                                                        <li><a href="pricing2.html">Pricing Tables 2</a></li>
                                                        <li><a href="pricing3.html">Pricing Tables 3</a></li>
                                                        <li><a href="pricing4.html">Pricing Tables 4</a></li>
                                                        <li><a href="events.html">Events - Grid 1</a></li>
                                                        <li><a href="events-right-sidebar.html">Events - Grid 2</a></li>
                                                        <li><a href="events-left-sidebar.html">Events - Grid 3</a></li>
                                                        <li><a href="events-list.html">Events - List 1</a></li>
                                                        <li><a href="events-list-right-sidebar.html">Events - List 2</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="events-list-left-sidebar.html">Events - List 3</a></li>
                                                        <li><a href="knowledge.html">knowledge Base 1</a></li>
                                                        <li><a href="knowledge2.html">knowledge Base 2</a></li>
                                                        <li><a href="knowledge3.html">knowledge Base 3</a></li>
                                                        <li><a href="testimonials.html">Testimonials - Page</a></li>
                                                        <li><a href="testimonials2.html">Testimonials - Page 2</a></li>
                                                        <li><a href="testimonials3.html">Testimonials - Page 3</a></li>
                                                        <li><a href="team.html">Team - Page</a></li>
                                                        <li><a href="team2.html">Team - Page 2</a></li>
                                                        <li><a href="team3.html">Team - Page 3</a></li>
                                                        <li><a href="faqs.html">FaQs - Page 1</a></li>
                                                        <li><a href="faqs2.html">FaQs - Page 2</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <ul>
                                                        <li><a href="faqs3.html">FaQs - Page 3</a></li>
                                                        
                                                        <li><a href="404.html">404 - Version 1</a></li>
                                                        <li><a href="404-2.html">404 - Version 2</a></li>
                                                        <li><a href="404-3.html">404 - Version 3</a></li>
                                                        <li><a href="404-4.html">404 - Version 4</a></li>
                                                        <li><a href="404-5.html">404 - Version 5</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .container -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop<span class="angle"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category Grid<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="category.html">Grid - Right Sidebar</a></li>
                                                <li><a href="category-left-sidebar.html">Grid - Left Sidebar</a></li>
                                                <li><a href="category-both-sidebar.html">Grid - Both Sidebar</a></li>
                                                <li><a href="category-4col.html">Grid - 4 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category List<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="category-list.html">List - Right Sidebar</a></li>
                                                <li><a href="category-list-left-sidebar.html">List - Left Sidebar</a></li>
                                                <li><a href="category-list-both-sidebar.html">List - Both Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Product Page<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="product.html">Product - Version 1</a></li>
                                                <li><a href="product2.html">Product - Version 2</a></li>
                                                <li><a href="product3.html">Product - Version 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="cart2.html">Shopping Cart 2</a></li>
                                        <li><a href="checkout.html">Checkout - Version 1</a></li>
                                        <li><a href="checkout2.html">Checkout - Version 2</a></li>
                                        <li><a href="compare.html">Compare Products</a></li>
                                        <li><a href="wishlist.html">Wishlist Page</a></li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="login.html">Login - Version 1</a></li>
                                                <li><a href="login2.html">Login - Version 2</a></li>
                                                <li><a href="login3.html">Login - Version 3</a></li>
                                                <li><a href="login4.html">Login - Version 4</a></li>
                                                <li><a href="login5.html">Login - Version 5</a></li>
                                                <li><a href="login6.html">Login - Version 6</a></li>
                                                <li><a href="login7.html">Login - Version 7</a></li>
                                                <li><a href="login8.html">Login - Version 8</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="register.html">Register - Version 1</a></li>
                                        <li><a href="register2.html">Register - Version 2</a></li>
                                        <li><a href="recover-password.html">Password Recover</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown megamenu-container">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Portfolio<span class="angle"></span></a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Fullwidth</a>
                                                    <ul>
                                                        <li><a href="portfolio-masonry-fullwidth-6col.html">Masonry - 6 Columns</a></li>
                                                        <li><a href="portfolio-masonry-fullwidth-5col.html">Masonry - 5 Columns</a></li>
                                                        <li><a href="portfolio-masonry-fullwidth-4col.html">Masonry - 4 Columns</a></li>
                                                        <li><a href="portfolio-masonry-fullwidth-3col.html">Masonry - 3 Columns</a></li>
                                                        <li><a href="portfolio-grid-fullwidth-6col.html">Grid - 6 Columns</a></li>
                                                        <li><a href="portfolio-grid-fullwidth-5col.html">Grid - 5 Columns</a></li>
                                                        <li><a href="portfolio-grid-fullwidth-4col.html">Grid - 4 Columns</a></li>
                                                        <li><a href="portfolio-grid-fullwidth-3col.html">Grid - 3 Columns</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Boxed</a>
                                                    <ul>
                                                        <li><a href="portfolio-masonry-4col.html">Masonry - 4 Columns</a></li>
                                                        <li><a href="portfolio-masonry-3col.html">Masonry - 3 Columns</a></li>
                                                        <li><a href="portfolio-masonry-left-sidebar.html">Masonry - Left Sidebar</a></li>
                                                        <li><a href="portfolio-masonry-left-sidebar-2col.html">Masonry - 2 Col Sidebar</a></li>
                                                        <li><a href="portfolio-masonry-right-sidebar.html">Masonry - Right Sidebar</a></li>
                                                        <li><a href="portfolio-masonry-right-sidebar-2col.html">Masonry - 2 Col Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Boxed</a>
                                                    <ul>
                                                        <li><a href="portfolio-grid-4col.html">Grid - 4 Columns</a></li>
                                                        <li><a href="portfolio-grid-3col.html">Grid - 3 Columns</a></li>
                                                        <li><a href="portfolio-grid-left-sidebar.html">Grid - Left Sidebar</a></li>
                                                        <li><a href="portfolio-grid-left-sidebar-2col.html">Grid - 2 Col Sidebar</a></li>
                                                        <li><a href="portfolio-grid-right-sidebar.html">Grid - Right Sidebar</a></li>
                                                        <li><a href="portfolio-grid-right-sidebar-2col.html">Grid - 2 Col Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Single</a>
                                                    <ul>
                                                        <li><a href="single-portfolio.html">Single - Image</a></li>
                                                        <li><a href="single-portfolio-gallery.html">Single - Gallery</a></li>
                                                        <li><a href="single-portfolio-video.html">Single - Video</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .container -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog<span class="angle"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">blog - Simple<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog.html">Blog Simple</a></li>
                                                <li><a href="blog-left-sidebar.html">Blog -Left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Blog -Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">blog - Classic<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog-classic-fullwidth.html">Blog - Fullwidth</a></li>
                                                <li><a href="blog-classic-left-sidebar.html">Blog - Left Sidebar</a></li>
                                                <li><a href="blog-classic-right-sidebar.html">Blog - Right Sidebar</a></li>
                                                <li><a href="blog-classic-both-sidebar.html">Blog - Both Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog List<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog-list-left-sidebar.html">List - Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">List - Right Sidebar</a></li>
                                                <li><a href="blog-list-fullwidth.html">List - Fullwidth</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Masonry - Boxed<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog-masonry-left-sidebar.html">Blog - Left Sidebar</a></li>
                                                <li><a href="blog-masonry-right-sidebar.html">Blog - Right Sidebar</a></li>
                                                <li><a href="blog-masonry-3col.html">Masonry - 3 Columns</a></li>
                                                <li><a href="blog-masonry-4col.html">Masonry - 4 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Masonry - Fullwidth<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog-masonry-fullwidth-3col.html">Masonry - 3 Columns</a></li>
                                                <li><a href="blog-masonry-fullwidth-4col.html">Masonry - 4 Columns</a></li>
                                                <li><a href="blog-masonry-fullwidth-5col.html">Masonry - 5 Columns</a></li>
                                                <li><a href="blog-masonry-fullwidth-6col.html">Masonry - 6 Columns</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog timeline<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog-timeline.html">Timeline - Version 1</a></li>
                                                <li><a href="blog-timeline2.html">Timeline - Version 2</a></li>
                                                <li><a href="blog-timeline3.html">Timeline - Version 3</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sub-dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog Post<span class="angle"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="single.html">Blog Post</a></li>
                                                <li><a href="single-left-sidebar.html">Post - Left Sidebar</a></li>
                                                <li><a href="single-right-sidebar.html">Blog - Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown megamenu-container">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Elements<span class="angle"></span></a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Boss Elements</a>
                                                    <ul>
                                                        <li><a href="elements-tabs.html">Elements - Tabs</a></li>
                                                        <li><a href="elements-collapses.html">Elements - Collapses</a></li>
                                                        <li><a href="elements-buttons.html">Elements - Buttons</a></li>
                                                        <li><a href="elements-typography.html">Elements - Typography</a></li>
                                                        <li><a href="elements-forms.html">Elements - Forms</a></li>
                                                        <li><a href="elements-portfolio.html">Elements - Portfolio</a></li>
                                                        <li><a href="elements-products.html">Elements - Products</a></li>
                                                        <li><a href="elements-pageheaders.html">Elements - Page Header</a></li>
                                                        <li><a href="elements-progressbars.html">Elements - Progress Bars</a></li>
                                                        <li><a href="elements-services.html">Elements - Services</a></li>
                                                        <li><a href="elements-callouts.html">Elements - Callouts</a></li>
                                                        <li><a href="elements-titles.html">Elements - Titles</a></li>
                                                        <li><a href="elements-icons.html">Elements - icons</a></li>
                                                        <li><a href="elements-lists.html">Elements - lists</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Boss Elements</a>
                                                    <ul>
                                                        <li><a href="elements-teammembers.html">Elements - Team Members</a></li>
                                                        <li><a href="elements-tables.html">Elements - Tables</a></li>
                                                        <li><a href="elements-carousels.html">Elements - Carousels</a></li>
                                                        <li><a href="elements-socialicons.html">Elements - Social Icons</a></li>
                                                        <li><a href="elements-maps.html">Elements - Maps</a></li>
                                                        <li><a href="elements-counters.html">Elements - Counters</a></li>
                                                        <li><a href="elements-animations.html">Elements - Animations</a></li>
                                                        <li><a href="elements-alerts.html">Elements - Alerts</a></li>
                                                        <li><a href="elements-dividers.html">Elements - Dividers</a></li>
                                                        <li><a href="elements-media.html">Elements - Media</a></li>
                                                        <li><a href="elements-modals.html">Elements - Modals</a></li>
                                                        <li><a href="elements-grid.html">Elements - Grid</a></li>
                                                        <li><a href="elements-more.html">Elements - More</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Headers</a>
                                                    <ul>
                                                        <li><a href="header.html">Header - Version 1</a></li>
                                                        <li><a href="header2.html">Header - Version 2</a></li>
                                                        <li><a href="header3.html">Header - Version 3</a></li>
                                                        <li><a href="header4.html">Header - Version 4</a></li>
                                                        <li><a href="header5.html">Header - Version 5</a></li>
                                                        <li><a href="header6.html">Header - Version 6</a></li>
                                                        <li><a href="header7.html">Header - Version 7</a></li>
                                                        <li><a href="header8.html">Header - Version 8</a></li>
                                                        <li><a href="header9.html">Header - Version 9</a></li>
                                                        <li><a href="header10.html">Header - Version 10</a></li>
                                                        <li><a href="header11.html">Header - Version 11</a></li>
                                                        <li><a href="header12.html">Header - Version 12</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                                <div class="col-sm-3">
                                                    <a href="#" class="megamenu-title">Footers</a>
                                                    <ul>
                                                        <li><a href="header13.html">Header - Version 13</a></li>
                                                        <li><a href="header14.html">Header - Version 14</a></li>
                                                        <li><a href="footer.html">Footer - Version 1</a></li>
                                                        <li><a href="footer2.html">Footer - Version 2</a></li>
                                                        <li><a href="footer3.html">Footer - Version 3</a></li>
                                                        <li><a href="footer4.html">Footer - Version 4</a></li>
                                                        <li><a href="footer5.html">Footer - Version 5</a></li>
                                                        <li><a href="footer6.html">Footer - Version 6</a></li>
                                                        <li><a href="footer7.html">Footer - Version 7</a></li>
                                                        <li><a href="footer8.html">Footer - Version 8</a></li>
                                                        <li><a href="footer9.html">Footer - Version 9</a></li>
                                                    </ul>
                                                </div><!-- End .col-sm-3 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .container -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact Us<span class="angle"></span></a>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="contact.html">Contact - Version 1</a></li>
                                        <li><a href="contact2.html">Contact - Version 2</a></li>
                                        <li><a href="contact3.html">Contact - Version 3</a></li>
                                        <li><a href="contact4.html">Contact - Version 4</a></li>
                                        <li><a href="contact5.html">Contact - Version 5</a></li>
                                        <li><a href="contact6.html">Contact - Version 6</a></li>
                                        <li><a href="contact7.html">Contact - Version 7</a></li>
                                        <li><a href="contact8.html">Contact - Version 8</a></li>
                                        <li><a href="contact9.html">Contact - Version 9</a></li>
                                        <li><a href="contact10.html">Contact - Version 10</a></li>
                                    </ul>
                                </li>
                                <li class="visible-lg"><a href="//wrapbootstrap.com/user/eony">Buy Now!</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </div><!-- End .sticky-menu -->
            </nav>
        </header><!-- End #header -->

			<div id="content" class="site-content">
