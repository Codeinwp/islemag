<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

    $post_id = get_the_ID();
?>
        <div id="content" role="main">
                <div class="row">
                    <div class="col-md-12">

                        <article id="post-<?php echo $post_id; ?>" <?php post_class("entry single"); ?>>
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="entry-media">
                                    <figure>
                                            <?php the_post_thumbnail(); ?>
                                    </figure>
                                </div><!-- End .entry-media -->
                            <?php } ?>
                            <span class="entry-date"><?php echo get_the_date( 'd' ); ?><span><?php echo strtoupper(get_the_date( 'M' )); ?></span></span>
                            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div><!-- End .entry-content -->

                            <footer class="entry-footer clearfix">
                                <?php
                                    $category = get_the_category();
                                ?>
                                <span class="entry-cats">
                                    <span class="entry-label">
                                        <i class="fa fa-tag"></i>Categories:
                                    </span>
                                    <?php
                                        if(!empty($category)){
                                            $i = 0;
                                            $len = count($category);
                                            foreach($category as $cat){
                                                echo '<a href="'. get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a>';
                                                if ($i != $len - 1) {
                                                   echo ', ';
                                                }
                                                $i++;
                                            }
                                        }
                                    ?>
                                </span><!-- End .entry-tags -->
                                <span class="entry-separator">/</span>
                                <a href="#" class="entry-comments"><?php comments_number( esc_html__('No Responses','islemag'), esc_html__('One Response','islemag'), esc_html__('% Responses','islemag') ); ?></a>
                                <span class="entry-separator">/</span>
                                by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="entry-author"><?php the_author(); ?></a>
                                
                            </footer>

                            <div class="about-author clearfix">
                                <h3 class="title-underblock custom">Post Author: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></h3>
                                <?php
                                    $author_id = get_the_author_meta( 'ID' );
                                    $profile_pic = get_avatar( $author_id, 'author-avatar' );
                                    if(!empty($profile_pic)){
                                ?>
                                <figure class="pull-left">
                                    <?php echo $profile_pic; ?>                                
                                </figure>
                                <?php
                                    }
                                ?>
                                <div class="author-content">
                                    <?php echo get_the_author_meta( 'description', $author_id ); ?> 
                                </div><!-- End .athor-content -->
                            </div><!-- End .about-author -->

                        </article>
                        
                        
                        
                        <h3 class="mb30 title-underblock custom">Related Posts</h3>
                        <div class="blog-related-carousel owl-carousel small-nav">
                            <?php

                                $related = get_posts( array( 'category__in' => wp_get_post_categories($post_id), 'numberposts' => 5, 'post__not_in' => array($post_id) ) );
                                if( $related ) foreach( $related as $post ) {
                                setup_postdata($post); ?>
                                    <article class="entry entry-box">
                                        <div class="entry-media">
                                                <div class="entry-media">
                                                    <figure>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php 
                                                            if ( has_post_thumbnail() ) { 
                                                                the_post_thumbnail('related-post');  
                                                            } else {
                                                                echo '<img src="'.get_template_directory_uri().'/img/related-placeholder.jpg"/>';
                                                            } ?>
                                                        </a>
                                                    </figure>
                                                </div><!-- End .entry-media -->
                                        </div><!-- End .entry-media -->
                                        
                                        <div class="entry-content-wrapper">
                                            <span class="entry-date"><?php echo get_the_date( 'd' ); ?><span><?php echo strtoupper(get_the_date( 'M' )); ?></span></span>
                                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <div class="entry-content">
                                                <p><?php echo get_excerpt(); ?></p>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-content-wrapper -->
                                        
                                        <footer class="entry-footer clearfix">
                                            <?php $category = get_the_category();?>
                                            <span class="entry-cats">
                                                <span class="entry-label"><i class="fa fa-tag"></i></span>
                                                <?php
                                                    if(!empty($category)){
                                                        $i = 0;
                                                        $len = count($category);
                                                        foreach($category as $cat){
                                                            echo '<a href="'. get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a>';
                                                            if($i == 2){
                                                                echo ' <span class="related-show-on-click" title="'.__('Show more categories','islemag').'">...</span> <span class="islemag-cat-show-on-click">, ';
                                                            }
                                                            if ($i != $len - 1 && $i!= 2) {
                                                               echo ', ';
                                                            } else {
                                                                if($i > 2){
                                                                    echo '</span>';
                                                                }
                                                            }
                                                            $i++;
                                                        }
                                                    }
                                                ?>
                                            </span><!-- End .entry-tags -->

                                            <a href="<?php the_permalink();?>" class="entry-readmore text-right">Read More <i class="fa fa-angle-right"></i></a>
                                        </footer>
                                    </article>
                                <?php }
                                wp_reset_postdata(); 
                            ?>
                                
                                


                            
                        </div><!-- End .blog-related-carousel -->



                    </div><!-- End .col-md-12 -->
                </div><!-- End .row -->

            <div class="mb20"></div><!-- space -->

        </div><!-- End #content -->