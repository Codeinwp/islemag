<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package islemag
 */


?>

<aside class="col-md-3 sidebar islemag-content-right " role="complementary">
	<?php

	if ( is_active_sidebar( 'islemag-sidebar' ) ) {
		dynamic_sidebar( 'islemag-sidebar' );
	} else {
		the_widget( 'WP_Widget_Text',
			array(
				'title'  => __( 'Example Widget', 'islemag' ),
				'text'   => sprintf( __( 'This is an example widget to show how the Sidebar looks by default. You can add custom widgets from the %swidgets screen%s in the admin. If custom widgets is added than this will be replaced by those widgets.', 'islemag' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' )
			),
			array(
				'before_widget' => '<div id="text-3" class="widget widget_text">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
				'after_title'   => '</span></h3>'
			)
		);

		the_widget( 'islemag_multiple_ads',
			array(
				'widget_title' => __( 'Banner Widget Example', 'islemag' ),
				'link_ad1' => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad1' => get_template_directory_uri() . '/img/small_banner_placeholder.png',
				'banner_type1' => 'image',
				'link_ad2' => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad2' => get_template_directory_uri() . '/img/small_banner_placeholder.png',
				'banner_type2' => 'image',
				'link_ad3' => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad3' => get_template_directory_uri() . '/img/small_banner_placeholder.png',
				'banner_type3' => 'image',
				'link_ad4' => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad4' => get_template_directory_uri() . '/img/small_banner_placeholder.png',
				'banner_type4' => 'image',
			),
			array(
				'before_widget' => '<div class="widget islemag_multiple_ads">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
				'after_title'   => '</span></h3>'
			)

		);
	} ?>
</aside><!-- #secondary -->