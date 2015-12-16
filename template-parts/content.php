<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("entry"); ?>>

	<div class="entry-media">
		<figure>
			<a href="<?php the_permalink(); ?>">
			 <?php
				if(has_post_thumbnail()){
					the_post_thumbnail('blog-post');
				} else {
					echo '<img src="'.get_template_directory_uri().'/img/blogpost-placeholder.jpg" />';
				}
			?>
			</a>
		</figure>
	</div><!-- End .entry-media -->

	<span class="entry-date">24<span>Feb</span></span>
	<span class="entry-format"><i class="fa fa-file-image-o"></i></span>
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	
	<div class="entry-content">
		<?php
			the_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'islemag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php islemag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	

</article>