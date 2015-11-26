<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

get_header(); ?>
			<div class="magazine-top-container">
                <div class="owl-carousel magazine-top-carousel rect-dots">
                    <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/slider-posts', get_post_format() );
                        ?>

                    <?php endwhile; ?>


                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>
                    
                </div><!-- End .magazine-top-carousel -->
            </div><!-- End .magazine-top-container -->
    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php 
                    $colors = array("red", "orange", "blue", "green", "purple", "pink", "yellow");
                    
                    $islemag_section_title = get_theme_mod('islemag_section1_title',esc_html__('Template 1','islemag'));
                    $islemag_section_category = get_theme_mod('islemag_section1_category');
                    $islemag_section_max_posts = get_theme_mod('islemag_section1_max_posts',-1);
                    $postperpage = get_theme_mod('islemag_section1_posts_per_page',6);
                    include(locate_template('template-parts/content-template1.php')); ?>
                
                <?php
                    $islemag_section_title = get_theme_mod('islemag_section2_title',esc_html__('Template 2','islemag'));
                    $islemag_section_category = get_theme_mod('islemag_section2_category');
                    $islemag_section_max_posts = get_theme_mod('islemag_section2_max_posts',-1);
                    include(locate_template('template-parts/content-template2.php')); ?>
                
                
                <?php 
                    $islemag_section_title = get_theme_mod('islemag_section3_title',esc_html__('Template 3','islemag'));
                    $islemag_section_category = get_theme_mod('islemag_section3_category');
                    $islemag_section_max_posts = get_theme_mod('islemag_section3_max_posts',-1);
                    $postperpage = get_theme_mod('islemag_section3_posts_per_page',6);
                    include(locate_template('template-parts/content-template1.php')); ?>
                
                
                <?php 
                    $islemag_section_title = get_theme_mod('islemag_section4_title',esc_html__('Template 4','islemag'));
                    $islemag_section_category = get_theme_mod('islemag_section4_category');
                    $islemag_section_max_posts = get_theme_mod('islemag_section4_max_posts',-1);
                    $postperpage = get_theme_mod('islemag_section4_posts_per_page',6);
                    include(locate_template('template-parts/content-template3.php'));
                ?>
                
                <?php 
                    $islemag_section_title = get_theme_mod('islemag_section5_title',esc_html__('Template 5','islemag'));
                    $islemag_section_category = get_theme_mod('islemag_section5_category');
                    $islemag_section_max_posts = get_theme_mod('islemag_section5_max_posts',-1);
                    $postperpage = get_theme_mod('islemag_section5_posts_per_page',6);
                    include(locate_template('template-parts/content-template4.php'));
                ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>

    </div>


<?php get_footer(); ?>
