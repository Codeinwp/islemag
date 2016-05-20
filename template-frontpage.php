<?php
/**
 * Template name: Frontpage
 */

get_header();

$islemag_header_slider_category = esc_attr( get_theme_mod( 'islemag_header_slider_category', 'all' ) );
$islemag_header_slider_max_posts = esc_attr( get_theme_mod( 'islemag_header_slider_max_posts', '6' ) );

$wp_query = new WP_Query( array(
	'posts_per_page'        => $islemag_header_slider_max_posts,
	'order'                 => 'DESC',
	'post_status'           => 'publish',
	'category_name'         =>  ( !empty( $islemag_header_slider_category ) && $islemag_header_slider_category != 'all' ? $islemag_header_slider_category : '' )
) );

if ( $wp_query->have_posts() ) { ?>

	<div class="islemag-top-container">
		<div class="owl-carousel islemag-top-carousel rect-dots">
			<?php
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				get_template_part( 'template-parts/slider-posts', get_post_format() );
			endwhile;
			 ?>
		</div><!-- End .islemag-top-carousel -->
	</div><!-- End .islemag-top-container -->

<?php
} else {

	get_template_part( 'template-parts/content', 'none' );

}
wp_reset_postdata(); ?>

	<div class="container">
		<div class="row">

			<div class="islemag-content-left col-md-9">
				<?php 
				$colors = array( "red", "orange", "blue", "green", "purple", "pink", "light_red" ); 
    
    			/* ---------Section 1--------- */
				if ( get_theme_mod( 'islemag_section1_fullwidth', false) == false ) { ?>
					<div class="islemag-section1">
						<?php 
						if( is_active_sidebar( 'islemag-ads' ) ){ ?>
							<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-1" aria-label="<?php esc_html_e('Ads Area 1','islemag'); ?>">
								<?php dynamic_sidebar( 'islemag-ads' ); ?>
							</div>
          				<?php 
          				}

						$islemag_section_title = get_theme_mod( 'islemag_section1_title', esc_html__( 'Section 1', 'islemag' ) );
						if( !empty( $islemag_section_title ) ) {
							$choosed_color = array_rand( $colors, 1 ); ?>
							<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
								<span><?php echo esc_attr( $islemag_section_title ); ?></span>
							</h2>
						<?php
						} else {
							global $wp_customize;
							if( isset( $wp_customize ) ) { ?>
								<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
									<span></span>
								</h2>
							<?php
							}
						}

						$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section1_category', 'all' ) );
						$islemag_section_max_posts = esc_attr( get_theme_mod( 'islemag_section1_max_posts', 6 ) );
						include( locate_template( 'template-parts/content-template1.php' ) ); ?>
					</div>
				<?php 
				} 


				/* ---------Section 2--------- */
				if ( get_theme_mod( 'islemag_section2_fullwidth', false) == false ) { ?>
					<div class="islemag-section2">
						<?php 
						if( is_active_sidebar( 'ads-2' ) ){ ?>
							<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-2" aria-label="<?php esc_html_e('Ads Area 2','islemag'); ?>">
								<?php dynamic_sidebar( 'ads-2' ); ?>
							</div>
						<?php 
						}

						$islemag_section_title = get_theme_mod( 'islemag_section2_title', esc_html__( 'Section 2','islemag' ) );
		
						if( !empty( $islemag_section_title ) ) {
							$choosed_color = array_rand($colors, 1); ?>
							<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
								<span><?php echo esc_attr( $islemag_section_title ); ?></span>
							</h2>
						<?php
						} else {
							global $wp_customize;
							if( isset( $wp_customize ) ) {?>
								<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
									<span></span>
								</h2>
			          		<?php
							}
						}

						$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section2_category', 'all' ) );
						$islemag_section_max_posts = esc_attr( get_theme_mod( 'islemag_section2_max_posts', 6 ) );
						include( locate_template( 'template-parts/content-template2.php' ) ); ?>
					</div> <!-- End .islemag-section2 -->
				<?php 
				} 


				/* ---------Section 3--------- */
				if ( get_theme_mod( 'islemag_section3_fullwidth', false) == false ) { ?>
					<div class="islemag-section3">
						<?php 
						if( is_active_sidebar( 'ads-3' ) ){ ?>
							<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-3" aria-label="<?php esc_html_e('Ads Area 3','islemag'); ?>">
								<?php dynamic_sidebar( 'ads-3' ); ?>
							</div>
						<?php 
						}

						$islemag_section_title = get_theme_mod( 'islemag_section3_title', esc_html__( 'Section 3','islemag' ) );
						if( !empty( $islemag_section_title ) ) {
							$choosed_color = array_rand($colors, 1); ?>
							<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
								<span><?php echo esc_attr( $islemag_section_title ); ?></span>
							</h2>
						<?php
						} else {
							global $wp_customize;
							if( isset( $wp_customize ) ) {?>
								<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
									<span></span>
								</h2>
						<?php
							}
						}

						$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section3_category', 'all' ) );
						$islemag_section_max_posts = esc_attr( get_theme_mod( 'islemag_section3_max_posts', 6 ) );
						include( locate_template( 'template-parts/content-template1.php' ) ); ?>
					</div> <!-- End .islemag-section3 -->
				<?php 
				} 


				/* ---------Section 4--------- */
				if ( get_theme_mod( 'islemag_section4_fullwidth', false) == false ) { ?>
					<div class="islemag-section4">
						<?php 
						if( is_active_sidebar( 'ads-4' ) ){ ?>
							<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-4" aria-label="<?php esc_html_e('Ads Area 4','islemag'); ?>">
								<?php dynamic_sidebar( 'ads-4' ); ?>
							</div>
						<?php 
						} 

						$islemag_section_title = get_theme_mod( 'islemag_section4_title', esc_html__( 'Section 4','islemag' ) );
						if( !empty( $islemag_section_title ) ) {
							$choosed_color = array_rand($colors, 1); ?>
							<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
								<span><?php echo esc_attr( $islemag_section_title ); ?></span>
							</h2>
						<?php
						} else {
							global $wp_customize;
							if( isset( $wp_customize ) ) {?>
								<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
									<span></span>
								</h2>
							<?php
							}
						}

						$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section4_category', 'all' ) );
						$islemag_section_max_posts = esc_attr( get_theme_mod( 'islemag_section4_max_posts' , 12) );
						$postperpage = get_theme_mod( 'islemag_section4_posts_per_page', 6 );
						include( locate_template( 'template-parts/content-template3.php' ) ); ?>
					</div>
				<?php 
				} 


				/* ---------Section 5--------- */
				if ( get_theme_mod( 'islemag_section5_fullwidth', false) == false ) { ?>
					<div class="islemag-section5">
						<?php 
						if( is_active_sidebar( 'ads-5' ) ){ ?>
							<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-5" aria-label="<?php esc_html_e('Ads Area 5','islemag'); ?>">
								<?php dynamic_sidebar( 'ads-5' ); ?>
							</div>
						<?php 
						}

						$islemag_section_title = get_theme_mod( 'islemag_section5_title', esc_html__( 'Section 5','islemag' ) );
						if( !empty( $islemag_section_title ) ) {
							$choosed_color = array_rand( $colors, 1 ); ?>
							<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
								<span><?php echo esc_attr( $islemag_section_title ); ?></span>
							</h2>
						<?php
						} else {
							global $wp_customize;
							if( isset( $wp_customize ) ) {?>
								<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
									<span></span>
								</h2>
							<?php
							}
						}
						$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section5_category', 'all' ) );
						$islemag_section_max_posts = esc_attr( get_theme_mod( 'islemag_section5_max_posts', 8 ) );
						include( locate_template( 'template-parts/content-template4.php' ) ); ?>
					</div>
				<?php 
				} ?>

			</div><!-- End .islemag-content-left -->
			
			<?php 
			get_sidebar(); ?>


			<?php 
			if (  get_theme_mod( 'islemag_section1_fullwidth', false) == true ||  
				get_theme_mod( 'islemag_section2_fullwidth', false) == true ||  
				get_theme_mod( 'islemag_section3_fullwidth', false) == true ||  
				get_theme_mod( 'islemag_section4_fullwidth', false) == true ||  
				get_theme_mod( 'islemag_section5_fullwidth', false) == true ) { ?>


				<div class="col-md-12 islemag-fullwidth">
					<?php 
					$colors = array( "red", "orange", "blue", "green", "purple", "pink", "light_red" );

					/* ---------Section 1--------- */
					if ( get_theme_mod( 'islemag_section1_fullwidth', false) == true ) { ?>
						<div class="islemag-section1">
							<?php 
							if( is_active_sidebar( 'islemag-ads' ) ){ ?>
								<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-1" aria-label="<?php esc_html_e('Ads Area 1','islemag'); ?>">
									<?php dynamic_sidebar( 'islemag-ads' ); ?>
								</div>
							<?php 
							}

							$islemag_section_title = get_theme_mod( 'islemag_section1_title', esc_html__( 'Section 1', 'islemag' ) );
							if( !empty( $islemag_section_title ) ) {
								$choosed_color = array_rand( $colors, 1 ); ?>
								<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
									<span><?php echo esc_attr( $islemag_section_title ); ?></span>
								</h2>
							<?php
							} else {
								global $wp_customize;
								if( isset( $wp_customize ) ) { ?>
									<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30"><span></span></h2>
								<?php
								}
							}
							$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section1_category', 'all' ) );
							$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section1_max_posts', 6 ) );
							include( locate_template( 'template-parts/content-template1.php' ) ); ?>
						</div>
					<?php 
					} 


					/* ---------Section 2--------- */
					if ( get_theme_mod( 'islemag_section2_fullwidth', false) == true ) { ?>
						<div class="islemag-section2">
							<?php 
							if( is_active_sidebar( 'islemag-ads-2' ) ){ ?>
								<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-2" aria-label="<?php esc_html_e('Ads Area 2','islemag'); ?>">
									<?php dynamic_sidebar( 'islemag-ads-2' ); ?>
								</div>
							<?php 
							} 

							$islemag_section_title = get_theme_mod( 'islemag_section2_title', esc_html__( 'Section 2','islemag' ) );
							if( !empty( $islemag_section_title ) ) {
								$choosed_color = array_rand($colors, 1); ?>
								<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
									<span><?php echo esc_attr( $islemag_section_title ); ?></span>
								</h2>
							<?php
							} else {
								global $wp_customize;
								if( isset( $wp_customize ) ) {?>
									<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
										<span></span>
									</h2>
							<?php
								}
							}

							$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section2_category', 'all' ) );
							$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section2_max_posts', 6 ) );
							include( locate_template( 'template-parts/content-template2.php' ) ); ?>
						</div> <!-- End .islemag-section2 -->
					<?php 
					} 


					/* ---------Section 3--------- */
					if ( get_theme_mod( 'islemag_section3_fullwidth', false) == true ) { ?>
						<div class="islemag-section3">
							<?php 
							if( is_active_sidebar( 'islemag-ads-3' ) ){ ?>
								<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-3" aria-label="<?php esc_html_e('Ads Area 3','islemag'); ?>">
									<?php dynamic_sidebar( 'islemag-ads-3' ); ?>
								</div>
							<?php 
							} 

							$islemag_section_title = get_theme_mod( 'islemag_section3_title', esc_html__( 'Section 3','islemag' ) );
							if( !empty( $islemag_section_title ) ) {
								$choosed_color = array_rand($colors, 1); ?>
								<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
									<span><?php echo esc_attr( $islemag_section_title ); ?></span>
								</h2>
							<?php
							} else {
								global $wp_customize;
								if( isset( $wp_customize ) ) {?>
									<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
										<span></span>
									</h2>
								<?php
								}
							}
							$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section3_category', 'all' ) );
							$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section3_max_posts', 6 ) );
							include( locate_template( 'template-parts/content-template1.php' ) ); ?>
						</div> <!-- End .islemag-section3 -->
					<?php 
					} 


					/* ---------Section 4--------- */
					if ( get_theme_mod( 'islemag_section4_fullwidth', false) == true ) { ?>
						<div class="islemag-section4">
							<?php 
							if( is_active_sidebar( 'islemag-ads-4' ) ){ ?>
								<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-4" aria-label="<?php esc_html_e('Ads Area 4','islemag'); ?>">
									<?php dynamic_sidebar( 'islemag-ads-4' ); ?>
								</div>
							<?php 
							} 
						
							$islemag_section_title = get_theme_mod( 'islemag_section4_title', esc_html__( 'Section 4','islemag' ) );
							if( !empty( $islemag_section_title ) ) {
								$choosed_color = array_rand($colors, 1); ?>
								<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
									<span><?php echo esc_attr( $islemag_section_title ); ?></span>
								</h2>
							<?php
							} else {
								global $wp_customize;
								if( isset( $wp_customize ) ) {?>
									<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
										<span></span>
									</h2>
								<?php
								}
							}

							$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section4_category', 'all' ) );
							$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section4_max_posts' , 12) );
							$postperpage = get_theme_mod( 'islemag_section4_posts_per_page', 6 );
							include( locate_template( 'template-parts/content-template3.php' ) ); ?>
						</div>
					<?php 
					}


					/* ---------Section 5--------- */
					if ( get_theme_mod( 'islemag_section5_fullwidth', false) == true ) { ?>
						<div class="islemag-section5">
							<?php 
							if( is_active_sidebar( 'islemag-ads-5' ) ){ ?>
								<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-5" aria-label="<?php esc_html_e('Ads Area 5','islemag'); ?>">
									<?php dynamic_sidebar( 'islemag-ads-5' ); ?>
								</div>
							<?php 
							} 

							$islemag_section_title = get_theme_mod( 'islemag_section5_title', esc_html__( 'Section 5','islemag' ) );
							if( !empty( $islemag_section_title ) ) {
								$choosed_color = array_rand( $colors, 1 ); ?>
								<h2 class="title-border title-bg-line <?php echo $colors[$choosed_color];?> mb30">
									<span><?php echo esc_attr( $islemag_section_title ); ?></span>
								</h2>
							<?php
							} else {
								global $wp_customize;
								if( isset( $wp_customize ) ) {?>
									<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[$choosed_color];?> mb30">
										<span></span>
									</h2>
								<?php
								}
							}
							$islemag_section_category = esc_attr( get_theme_mod( 'islemag_section5_category', 'all' ) );
							$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section5_max_posts', 8 ) );
							include( locate_template( 'template-parts/content-template4.php' ) ); ?>
						</div>
					<?php 
					} ?>
				</div>
			<?php 
			} else {
				if( isset($wp_customize) ){
					echo '<div class="col-md-12 islemag-fullwidth"></div>';
				}
			} ?>
		</div><!-- End .row -->
	</div><!-- End .container -->
<?php
get_footer();