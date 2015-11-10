<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */




$colors = array("red", "orange", "blue", "green", "purple", "pink", "yellow");
$choosed_color = array_rand($colors, 1);
?>
<article class="entry entry-overlay entry-block <?php echo $colors[$choosed_color];?>">
	<div class="entry-media">
		<figure>
			<a href="<?php the_permalink(); ?>" title="Ipsa quasi praesentium eos">
				<?php
				if(has_post_thumbnail()){
					the_post_thumbnail('main-slider');
				} else {
					echo '<img src="'.get_template_directory_uri().'/img/placeholder-image.png" />';
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
		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></a>
	</div><!-- End .entry-overlay-meta -->
</article>