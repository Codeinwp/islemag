<div class="post-section">
    <?php
        $choosed_color = array_rand($colors, 1);
    ?>
    <h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30"><span><?php if(!empty($islemag_section_title)) echo $islemag_section_title; ?></span></h2>
    <div class="owl-carousel mpopular-posts smaller-nav no-radius">

            <?php

        
        
            $wp_query = new WP_Query( 
                    array( 
                            'posts_per_page'        => $islemag_section_max_posts, 
                            'meta_key'              => ($islemag_section_category == "popular" ? 'wpb_post_views_count' : '' ) , 
                            'orderby'               => ($islemag_section_category == "popular" ? 'meta_value_num' : '' ) , 
                            'order'                 => 'ASC',
                            'post_status'           => 'publish',
                            'ignore_sticky_posts'   => true,
                            'category_name'         =>  (!empty($islemag_section_category) && $islemag_section_category != 'all' && $islemag_section_category !='popular' ? $islemag_section_category : '')
                        )
            );
        
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                $choosed_color = array_rand($colors, 1);
                $category = get_the_category();
            ?>

                <article class="entry entry-overlay entry-block <?php echo $colors[$choosed_color];?>">
                    <a href="<?php echo get_category_link($category[0]->cat_ID);?>" class="category-block" title="Category <?php echo $category[0]->cat_name;?>"><?php echo $category[0]->cat_name;?></a>
                    <div class="entry-media">
                        <figure>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                 <?php
                                    if(has_post_thumbnail()){
                                        the_post_thumbnail('main-slider');
                                    } else {
                                        echo '<img src="'.get_template_directory_uri().'/img/placeholder-image.png" />';
                                    }
                                ?>
                            </a>
                        </figure>
                        <div class="entry-overlay-meta">
                            <span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
                            <span class="entry-separator">/</span>
                            <a href="<?php the_permalink(); ?>" class="entry-comments"><i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></a>
                            <span class="entry-separator">/</span>
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></a>
                        </div><!-- End .entry-overlay-meta -->
                    </div><!-- End .entry-media -->

                    <h3 class="entry-title"><a href="single.html"><?php the_title();?></a></h3>
                </article>

            <?php
            endwhile;

            ?>
    </div>

        
                            
                
                
                
                
            
        
    <!-- End .mpopular-posts -->
</div>