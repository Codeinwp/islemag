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
    <div id="wrapper" class="boxed-long">
        
        <header id="masthead" class="site-header" role="banner">
            
            
            
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
                </div>
                
                <button type="button" class="navbar-btn" data-toggle="collapse" data-target="#header-search-form"><i class="fa fa-search"></i></button>
                <div class="navbar-right">
                    
                    <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
                    <?php

                            $defaults = array(
                                'theme_location'  => 'header',
                                'container'       => 'div',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class'      => 'nav navbar-nav',
                                'depth'           => 1,
                            );

                            wp_nav_menu( $defaults );

                    ?>

                      </div><!-- /.container-fluid -->
                    </nav>

                </div>
            </div>
            
            
            <div class="header-content clearfix">
                <div class="col-md-3 col-sm-3 col-xs-6 navbar-brand">
                    <?php
                        global $wp_customize;
                        $islemag_logo = get_theme_mod('islemag_logo');

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

                <?php if ( !empty(get_header_image()) ) { ?>
                <div class="col-md-9 col-sm-9 col-xs-6 islemag-banner">
                    <?php
                        $islemag_banner_link = get_theme_mod('islemag_banner_link','#');
                        if(!empty($islemag_banner_link)){
                            echo '<a href="'.$islemag_banner_link.'">';
                            echo '<img src="'.get_header_image().'" alt="'.get_bloginfo( 'title' ).'"/>';
                            echo '</a>';
                        } else {
                            echo '<img src="'.get_header_image().'" alt="'.get_bloginfo( 'title' ).'"/>';
                        }
                    ?>
                </div>
                <?php } ?>
            </div>
            
<!-- MENU -->
					<div itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_html_e('Primary Menu','islemag') ?>" id="menu-primary" class="navbar-default">

                        <div class="navbar-header">
                            
                            
                          <button id="menu-toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-container" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
						<!-- LOGO ON STICKY NAV BAR -->
						<div id="site-header-menu">
							<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php

                                $defaults = array(
                                    'theme_location'  => 'primary',
                                    'container'       => 'div',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id'    => 'main-navbar-container',
                                    'menu_class'      => 'nav navbar-nav',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth'           => 0,
                                );

                                wp_nav_menu( $defaults );

                            ?>
							</nav>
						</div>
                    </div>
                 
            
            
          
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="collapse navbar-white" id="header-search-form">
                <form class="navbar-form animated fadeInDown"  role="search">
                    <input type="search" id="s" name="s" class="form-control" placeholder="Search in here...">
                </form>
            </div><!-- End #header-search-form -->
        </header><!-- End #header -->

			<div id="content" class="site-content">
