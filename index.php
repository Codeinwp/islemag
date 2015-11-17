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
                    $title = get_theme_mod('islemag_section1_title','Section 1');
                    $cat = get_theme_mod('islemag_section1_category','all');
                    include(locate_template('template-parts/content-template1.php')); ?>
                
                
                <?php 
                    $title = get_theme_mod('islemag_section2_title','Section 2');
                    $cat = get_theme_mod('islemag_section1_category','all');
                    include(locate_template('template-parts/content-template2.php')); ?>
                
                
                <?php 
                    $title = get_theme_mod('islemag_section3_title','Section 3');
                    $cat = get_theme_mod('islemag_section3_category','all');
                    include(locate_template('template-parts/content-template1.php')); ?>
                
                
                <?php 
                    $title = get_theme_mod('islemag_section4_title','Section 4');
                    $cat = get_theme_mod('islemag_section4_category','all');
                    include(locate_template('template-parts/content-template3.php'));
                ?>
                <?php get_template_part('template-parts/content','template4'); ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>

    </div>


<?php get_footer(); ?>
