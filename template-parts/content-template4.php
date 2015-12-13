<?php
$wp_query = new WP_Query(
  array(
        'posts_per_page'      => $islemag_section_max_posts,
        'order'               => 'ASC',
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
        'post_status'         => 'publish',
        'category_name' 	    => ( !empty( $islemag_section4_category ) && $islemag_section4_category != 'all' ? $islemag_section4_category : ''),
        )
);

if( $wp_query->have_posts() ) :
?>
<div class="post-section islemag-template4 mb30">
  <?php $choosed_color = array_rand($colors, 1); ?>
  <h2 class="title-border title-bg-line <?php echo $colors[$choosed_color]; ?> mb30"><span><?php if( !empty( $islemag_section_title ) ) echo $islemag_section_title; ?></span></h2>
  <div class="owl-carousel islemag-template4-posts smaller-nav no-radius">
  <?php
      $counter = 0;

      while ( $wp_query->have_posts() ) : $wp_query->the_post();
        $case = $counter % 2;
        $category = get_the_category();

        switch ($case) {
                          case 0:
                                  $choosed_color = array_rand($colors, 1); ?>
                                  <div class="entry-wrapper">
                                    <article class="entry entry-overlay entry-block eb-small <?php echo $colors[$choosed_color]; ?>">

                                      <div class="entry-media">
                                        <a href="<?php echo get_category_link($category[0]->cat_ID);?>" class="category-block" title="Category <?php echo $category[0]->cat_name;?>"><?php echo $category[0]->cat_name;?></a>
                                        <figure>
                                          <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                          <?php
                                            if ( has_post_thumbnail() ) :
                                              $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->ID), 'sections-small-thumbnail' );
                                              $url = $thumb['0'];
                                              echo '<img class="owl-lazy" data-src="'.$url.'" />';
                                            else :
                                              echo '<img class="owl-lazy" data-src="'.get_template_directory_uri().'/img/placeholder-image.png">';
                                            endif;
                                          ?>
                                          </a>
                                        </figure> <!-- End figure -->
                                      </div> <!-- End .entry-media -->

                                      <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                      <div class="entry-meta">
                                        <span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
                                        <span class="entry-separator">/</span>
                                        <a href="<?php the_permalink(); ?>" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
                                        <div>
                                          <?php esc_html_e( 'Posted By','islemag' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="entry-author"><?php the_author(); ?></a>
                                        </div>
                                      </div> <!-- End .entry-meta -->

                                    </article> <!-- End .entry-overlay -->
                              <?php
                                if( $wp_query->current_post + 1 == $wp_query->post_count ){ ?>
                                </div> <!-- End .entry-wrapper -->
                              <?php
                                } else {
                                  $counter++;
                                }
                                break;

                          case 1:
                                  $choosed_color = array_rand($colors, 1); ?>
                                  <article class="entry entry-overlay entry-block eb-small <?php echo $colors[$choosed_color]; ?>">
                                    <div class="entry-media">
                                      <a href="<?php echo get_category_link($category[0]->cat_ID);?>" class="category-block" title="Category <?php echo $category[0]->cat_name;?>"><?php echo $category[0]->cat_name;?></a>
                                      <figure>
                                          <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                          <?php
                                            if ( has_post_thumbnail() ) :
                                              $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->ID), 'sections-small-thumbnail' );
                                              $url = $thumb['0'];
                                              echo '<img class="owl-lazy" data-src="'.$url.'" />';
                                            else :
                                              echo '<img class="owl-lazy" data-src="'.get_template_directory_uri().'/img/placeholder-image.png">';
                                            endif;
                                          ?>
                                          </a>
                                      </figure> <!-- End figure -->
                                    </div> <!-- End .entry-media -->

                                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="entry-meta">
                                      <span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
                                      <span class="entry-separator">/</span>
                                      <a href="#" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
                                      <div>
                                        <?php esc_html_e( 'Posted By','islemag' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="entry-author"><?php the_author(); ?></a>
                                      </div>
                                    </div> <!-- End .entry-meta -->

                                  </article>
                                </div> <!-- End .entry-wrapper -->
                                <?php
                                if( $wp_query->current_post +1 != $wp_query->post_count ){
                                  $counter++;
                                }
                        }
      endwhile;
      wp_reset_postdata();
    ?>

  </div> <!-- End .islemag-template4-posts -->
</div> <!-- End .post-section -->
<?php endif; ?>
