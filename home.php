<?php
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="islemag-content-left col-md-9">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
	
				the_posts_navigation();

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		</div><!-- End .islemag-content-left -->
		<?php get_sidebar(); ?>
	</div><!-- End .row -->
</div><!-- End .container -->
<?php
wp_reset_postdata();
get_footer(); ?>