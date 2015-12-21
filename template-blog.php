<?php
/*
Template Name: Blog
*/

	get_header();
	query_posts( array( 'post_type' => 'post', 'posts_per_page' => 6, 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );
?>
		<div class="container">
			<div class="row">
				<div class="islemag-content-left <?php if ( !is_active_sidebar( 'islemag-sidebar' ) ) { echo 'col-md-12'; } else { echo 'col-md-9'; } ?>">
					<?php
						if ( have_posts() ) :

							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
				</div><!-- End .islemag-content-left -->
				<?php get_sidebar(); ?>

			</div><!-- End .row -->
		</div><!-- End .container -->
<?php
	wp_reset_postdata();
	get_footer();
?>
