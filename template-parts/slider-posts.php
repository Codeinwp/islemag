<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

$colors = array("red", "orange", "blue", "green", "purple", "pink", "light_red");
$choosed_color = array_rand($colors, 1);
?>
<article class="entry entry-overlay entry-block <?php echo $colors[$choosed_color];?>">
	<div class="entry-media">
		<figure>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php
				if(has_post_thumbnail()){
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $wp_query->ID ), 'islemag_main_slider' );
					$url = $thumb['0'];
					echo '<img class="owl-lazy" data-src="' . esc_url( $url ) . '" />';
				} else {
					echo '<img class="owl-lazy" data-src="' . get_template_directory_uri() . '/img/placeholder-image.png" />';
				}
				?>
			</a>
		</figure>
	</div><!-- End .entry-media -->

	<div class="entry-overlay-meta">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<span class="entry-overlay-date"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j M' ); ?></span>
		<span class="entry-separator">/</span>
		<a href="<?php the_permalink(); ?>" class="entry-comments"><i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></a>
		<span class="entry-separator">/</span>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></a>
	</div><!-- End .entry-overlay-meta -->
</article>
