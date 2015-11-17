<div class="post-section">
    <h2 class="title-border title-bg-line blue mb30"><span><?php echo $title; ?></span></h2>

    <div class="row">
        
            <?php

                $popularpost = new WP_Query( 
                    array( 
                            'posts_per_page' => 6, 
                            'meta_key' => ($cat == "Popular Posts" ? 'wpb_post_views_count' : '' ) , 
                            'orderby' => ($cat == "Popular Posts" ? 'meta_value_num' : '' ) , 
                            'order' => 'ASC', 
                            'category_name' => ($cat != "popular" && $cat != "all" ? $cat : '' )
                    )
                );
            
                while ( $popularpost->have_posts() ) : $popularpost->the_post();
                    $colors = array("red", "orange", "blue", "green", "purple", "pink", "yellow");
                    $choosed_color = array_rand($colors, 1);
                    $category = get_the_category();
                    $postid = get_the_ID();
            
            ?>
                    <div class="col-sm-6">
                        <article class="entry entry-overlay entry-block eb-small purple">
                            <div class="entry-media">
                                <a href="#" class="category-block" title="Category Sports"><?php echo $category[0]->cat_name;?></a>
                                <figure>
                                    <a href="single.html" title="Ipsa quasi praesentium eos">
                                        <?php
                                            if(has_post_thumbnail()){
                                                the_post_thumbnail('main-slider');
                                            } else {
                                                echo '<img src="'.get_template_directory_uri().'/img/placeholder-image.png" />';
                                            }
                                        ?>
                                    </a>
                                </figure>
                            </div>
                            <!-- End .entry-media -->

                            <h3 class="entry-title"><a href="single.html"><?php the_title();?></a></h3>
                            <div class="entry-meta">
                                <span class="entry-overlay-date"><i class="fa fa-calendar"></i>><?php echo get_the_date( 'j M' ); ?></span>
                                <span class="entry-separator">/</span>
                                <a href="#" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
                                <div>
                                    Posted By <a href="#" class="entry-author"><?php the_author(); ?></a>
                                </div>
                            </div>
                            <!-- End .entry-meta -->

                        </article>   
                    </div>
        <!-- End .col-sm-6 -->
                <?php
                    endwhile;
                ?>


    </div>
    <!-- End .row -->
</div>
<!-- End .post-section -->