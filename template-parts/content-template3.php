<?php
/**
 * Template for displaying Islemag frontpage section.
 *
 * @package WordPress
 * @subpackage Islemag
 */

$wp_query = new WP_Query(
	array(
		  'posts_per_page'      => $islemag_section_max_posts,
		  'order'               => 'DESC',
		  'post_status'         => 'publish',
		  'ignore_sticky_posts' => true,
		  'no_found_rows'       => true,
		  'category_name' 	    => ( ! empty( $islemag_section_category ) && $islemag_section_category != 'all' ? $islemag_section_category : '' ),
		)
);

if ( $wp_query->have_posts() ) : ?>
	<div class="post-section islemag-template3">
	<div class="owl-carousel islemag-template3-posts smaller-nav no-radius">
	<?php

	$counter = 0;

	while ( $wp_query->have_posts() ) : $wp_query->the_post();
		$case = $counter % $postperpage;
		$category = get_the_category();
		$postid = get_the_ID();

		switch ( $case ) {

			case 0:
				$choosed_color = array_rand( $colors, 1 ); ?>
				  <div class="entry-wrapperv2">
					<div class="row">
					  <div class="col-sm-6">
						<article class="entry entry-overlay entry-block <?php echo $colors[ $choosed_color ]; ?>">
						  <a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>" class="category-block" title="<?php esc_html_e( 'Category','islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
						  <div class="entry-media islemag-big">

							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php
									$thumb_id = get_post_thumbnail_id( $wp_query->ID );
									$thumb_meta = wp_get_attachment_metadata( $thumb_id );
									if ( ! empty( $thumb_id ) ) {
										if ( $thumb_meta['width'] / $thumb_meta['height'] > 1 ) {
											$thumb = wp_get_attachment_image_src( $thumb_id, 'islemag_section4_big_thumbnail' );
											$url = $thumb['0'];
										} else {
											$thumb = wp_get_attachment_image_src( $thumb_id, 'islemag_section4_big_thumbnail_no_crop' );
											$url = $thumb['0'];
										}
										echo '<img class="owl-lazy" data-src="' . esc_url( $url ) . '" />';
									} else {
										echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/img/placeholder-image.png" />';
									}
									?>
								</a>
							</figure> <!-- End figure -->
							<div class="entry-overlay-meta">
								<span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
								<span class="entry-separator">/</span>
								<a href="<?php the_permalink(); ?>" class="entry-comments"><i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></a>
								<span class="entry-separator">/</span>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></a>
							</div> <!-- End .entry-overlay-meta -->

						  </div> <!-- End .entry-media -->
						  <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php
							if ( function_exists( 'cwppos_calc_overall_rating' ) ) {
								$rating = cwppos_calc_overall_rating( $postid );
								if ( ! empty( $rating['option1'] ) ) {  ?>
									<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
									<div class="star-ratings-css">
									  <div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
									  <div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
									</div>
								<?php
								}
							} ?>
						  <p><?php the_excerpt(); ?></p>
						</article> <!-- End .entry-overlay -->
					  </div> <!-- End .col-md-6 -->
					  <div class="mb20 visible-xs"></div>
						<?php
						if ( $wp_query->current_post + 1 == $wp_query->post_count ) { ?>
							  </div> <!-- End .row -->
							</div><!-- End .entry-wrapperv2 -->
							<?php
						} else {
							$counter++;
						}
		  break;

			case 1:
				$choosed_color = array_rand( $colors, 1 ); ?>
				  <div class="col-sm-6">
					<article class="entry entry-overlay entry-block eb-small <?php echo $colors[ $choosed_color ]; ?>">
					  <div class="entry-media islemag-t3-small">
						<a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>" class="category-block" title="<?php esc_html_e( 'Category','islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
						<figure>
						  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
							$thumb_id = get_post_thumbnail_id( $postid );
							$thumb_meta = wp_get_attachment_metadata( $thumb_id );
							if ( ! empty( $thumb_id ) ) {
								if ( $thumb_meta['width'] / $thumb_meta['height'] > 1 || $thumb_meta['height'] / $thumb_meta['width'] > 1 ) {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail' );
								} else {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail_no_crop' );
								}
							} else {
								echo '<img src="' . get_template_directory_uri() . '/img/placeholder-image.png" />';
							}
							?>
						  </a>
						</figure> <!-- End figure -->
					  </div> <!-- End .entry-media -->
					  <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php
						if ( function_exists( 'cwppos_calc_overall_rating' ) ) {
							$rating = cwppos_calc_overall_rating( $postid );
							if ( ! empty( $rating['option1'] ) ) {  ?>
								<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
								<div class="star-ratings-css">
								  <div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
								  <div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
								</div>
							<?php
							}
						} ?>
					  <div class="entry-meta">
					<span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
					<span class="entry-separator">/</span>
					<a href="<?php the_permalink(); ?>" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
					<div>
						<?php esc_html_e( 'Posted By', 'islemag' ); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
					</div>
					  </div> <!-- End .entry-meta -->

					</article> <!-- End .entry-overlay -->
					<?php
					if ( $wp_query->current_post + 1 == $wp_query->post_count ) { ?>
					  </div><!-- End .col-sm-6 -->
					</div><!-- End .row -->
				  </div><!-- End .entry-wrapperv2 -->
				<?php
					} else {
						$counter++;
					}
		  break;

			case ($postperpage - 1):
				$choosed_color = array_rand( $colors, 1 ); ?>
				  <article class="entry entry-overlay entry-block eb-small <?php echo $colors[ $choosed_color ]; ?>">
					<div class="entry-media islemag-t3-small">
					  <a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>" class="category-block" title="<?php esc_html_e( 'Category','islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
					  <figure>
						<a href="<?php the_permalink(); ?>" title="Ipsa quasi praesentium eos">
							<?php
							$thumb_id = get_post_thumbnail_id( $postid );
							$thumb_meta = wp_get_attachment_metadata( $thumb_id );
							if ( ! empty( $thumb_id ) ) {
								if ( $thumb_meta['width'] / $thumb_meta['height'] > 1 || $thumb_meta['height'] / $thumb_meta['width'] > 1 ) {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail' );
								} else {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail_no_crop' );
								}
							} else {
								echo '<img src="' . get_template_directory_uri() . '/img/placeholder-image.png" />';
							}
							?>
						</a>
					  </figure> <!-- End figure -->
					</div> <!-- End .entry-media -->

					<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php
					if ( function_exists( 'cwppos_calc_overall_rating' ) ) {
						$rating = cwppos_calc_overall_rating( $postid );
						if ( ! empty( $rating['option1'] ) ) {  ?>
							<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
							<div class="star-ratings-css">
							  <div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							  <div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							</div>
						<?php
						}
					} ?>
					<div class="entry-meta">
				<span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
				<span class="entry-separator">/</span>
				<a href="<?php the_permalink(); ?>" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
				<div>
					<?php esc_html_e( 'Posted By', 'islemag' ); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
				</div>
					</div> <!-- End .entry-meta -->
				  </article> <!-- End .entry-overlay -->
				</div><!-- End .col-sm-6 -->
			  </div><!-- End .row -->
			</div><!-- End .entry-wrapperv2 -->
			<?php
			if ( $wp_query->current_post + 1 != $wp_query->post_count ) {
				$counter++;
			};
	  break;


			default:
				$choosed_color = array_rand( $colors, 1 ); ?>
				  <article class="entry entry-overlay entry-block eb-small <?php echo $colors[ $choosed_color ]; ?>">
					<div class="entry-media islemag-t3-small">
					  <a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) );?>" class="category-block" title="<?php esc_html_e( 'Category','islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
					  <figure>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
							$thumb_id = get_post_thumbnail_id( $postid );
							$thumb_meta = wp_get_attachment_metadata( $thumb_id );
							if ( ! empty( $thumb_id ) ) {
								if ( $thumb_meta['width'] / $thumb_meta['height'] > 1 || $thumb_meta['height'] / $thumb_meta['width'] > 1 ) {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail' );
								} else {
									$thumb = the_post_thumbnail( 'islemag_sections_small_thumbnail_no_crop' );
								}
							} else {
								echo '<img src="' . get_template_directory_uri() . '/img/placeholder-image.png" />';
							}
							?>
						</a>
					  </figure> <!-- End figure -->
					</div> <!-- End .entry-media -->

					<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php
					if ( function_exists( 'cwppos_calc_overall_rating' ) ) {
						$rating = cwppos_calc_overall_rating( $postid );
						if ( ! empty( $rating['option1'] ) ) {  ?>
							<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
							<div class="star-ratings-css">
							  <div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							  <div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							</div>
						<?php
						}
					} ?>
					<div class="entry-meta">
				<span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
				<span class="entry-separator">/</span>
				<a href="<?php the_permalink(); ?>" class="entry-comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
				<div>
					<?php esc_html_e( 'Posted By', 'islemag' ); ?><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><?php the_author(); ?></a>
				</div>
					</div> <!-- End .entry-meta -->
				  </article> <!-- End .entry-overlay -->
					<?php
					if ( $wp_query->current_post + 1 == $wp_query->post_count ) {  ?>
						  </div><!-- End .col-sm-6 -->
						</div><!-- End .row -->
					  </div><!-- End .entry-wrapperv2 -->
						<?php
					} else {
						$counter++;
					}
			break;
		}// End switch().
	endwhile;
		?>
	</div> <!-- End .islemag-template3-posts -->
</div> <!-- End .islemag-template3 -->
<?php endif;
wp_reset_postdata(); ?>
