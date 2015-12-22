<?php

	$wp_query = new WP_Query(
	  array(
	          'posts_per_page'        => 6,
	          'order'                 => 'ASC',
	          'post_status'           => 'publish',
	          'no_found_rows'       => true,
	      )
	);
?>
		<div class="container">
			<div class="row">
				<div class="islemag-content-left <?php if ( !is_active_sidebar( 'islemag-sidebar' ) ) { echo 'col-md-12'; } else { echo 'col-md-9'; } ?>">
					<?php
						if ( $wp_query->have_posts() ) :

							while ( $wp_query->have_posts() ) : $wp_query->the_post();

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
?>
