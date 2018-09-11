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
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
		'post_status'         => 'publish',
		'category_name'       => ( ! empty( $islemag_section_category ) && $islemag_section_category != 'all' ? $islemag_section_category : '' ),
	)
);

if ( $wp_query->have_posts() ) :
	?>
	<div class="post-section islemag-template4 mb30">
		<div class="owl-carousel islemag-template4-posts smaller-nav no-radius">
			<?php
			$counter = 0;

			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
				$case     = $counter % 2;
				$category = get_the_category();
				$postid   = get_the_ID();

				switch ( $case ) {
					case 0:
						$choosed_color = array_rand( $colors, 1 );
						?>
						<div class="entry-wrapper">
						<article class="entry entry-overlay entry-block eb-small <?php echo $colors[ $choosed_color ]; ?>">

					<div class="entry-media">
						<a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>" class="category-block"
							title="<?php esc_html_e( 'Category', 'islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
						<figure>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php
								$thumb_id   = get_post_thumbnail_id( $postid );
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
								if ( ! empty( $rating['option1'] ) ) {
									?>
									<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
								<div class="star-ratings-css">
								<div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%">
									<span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i
												class="fa fa-star"></i></span><span><i
												class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span>
								</div>
								<div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i
												class="fa fa-star"></i></span><span><i
												class="fa fa-star"></i></span><span><i
												class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span>
								</div>
								</div>
									<?php
								}
							}
							?>
							<div class="entry-meta">
							<span class="entry-overlay-date"><i
									class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
						<?php if ( comments_open() ) { ?>
						<span class="entry-separator">/</span>
						<a href="<?php the_permalink(); ?>"
							class="entry-comments"><?php comments_number( esc_html__( '0 Comments', 'islemag' ), esc_html__( '1 Comment', 'islemag' ), esc_html__( '% Comments', 'islemag' ) ); ?></a>
						<?php } ?>
						<div>
							<?php esc_html_e( 'Posted By', 'islemag' ); ?><a
									href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
									class="entry-author"><?php the_author(); ?></a>
						</div>
						</div> <!-- End .entry-meta -->

						</article> <!-- End .entry-overlay -->
						<?php
						if ( $wp_query->current_post + 1 == $wp_query->post_count ) {
							?>
							</div> <!-- End .entry-wrapper -->
							<?php
						} else {
							$counter++;
						}
						break;

					case 1:
						$choosed_color = array_rand( $colors, 1 );
						?>
					<article class="entry entry-overlay entry-block eb-small <?php echo $colors[ $choosed_color ]; ?>">
				<div class="entry-media">
					<a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>" class="category-block"
						title="<?php esc_html_e( 'Category', 'islemag' ); ?> <?php echo esc_attr( $category[0]->cat_name ); ?>"><?php echo esc_attr( $category[0]->cat_name ); ?></a>
					<figure>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
							$thumb_id   = get_post_thumbnail_id( $postid );
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
							if ( ! empty( $rating['option1'] ) ) {
								?>
								<label><?php esc_html_e( 'Rating:', 'islemag' ); ?></label>
							<div class="star-ratings-css">
							<div class="star-ratings-css-top" style="width: <?php echo $rating['overall']; ?>%"><span><i
											class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							<div class="star-ratings-css-bottom"><span><i class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i
											class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></div>
							</div>
								<?php
							}
						}
						?>
						<div class="entry-meta">
						<span class="entry-overlay-date"><i
								class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
						<?php if ( comments_open() ) { ?>
					<span class="entry-separator">/</span>
					<a href="#"
						class="entry-comments"><?php comments_number( esc_html__( '0 Comments', 'islemag' ), esc_html__( '1 Comment', 'islemag' ), esc_html__( '% Comments', 'islemag' ) ); ?></a>
					<?php } ?>
					<div>
						<?php esc_html_e( 'Posted By', 'islemag' ); ?><a
								href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
								class="entry-author"><?php the_author(); ?></a>
					</div>
					</div> <!-- End .entry-meta -->

					</article>
				</div> <!-- End .entry-wrapper -->
						<?php
						if ( $wp_query->current_post + 1 != $wp_query->post_count ) {
							$counter++;
						}
				}// End switch().
		endwhile;

			?>

	</div> <!-- End .islemag-template4-posts -->
	</div> <!-- End .post-section -->
<?php endif;
wp_reset_postdata(); ?>
