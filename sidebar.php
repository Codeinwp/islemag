<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package islemag
 */

$sidebar_classes = apply_filters( 'islemag_sidebar_classes', array( 'col-md-3', 'sidebar', 'islemag-content-right' ) ); ?>

<aside 
<?php
if ( ! empty( $sidebar_classes ) ) {
	echo 'class="' . implode( ' ', $sidebar_classes ) . '"'; }
?>
role="complementary">
	<?php

	if ( is_active_sidebar( 'islemag-sidebar' ) ) {
		dynamic_sidebar( 'islemag-sidebar' );
	} else {
		the_widget(
			'WP_Widget_Text',
			array(
				'title' => __( 'Example Widget', 'islemag' ),
				/* translators: Widgets area editing link */
				'text'  => sprintf( __( 'This is an example widget to show how the Sidebar looks by default. You can add custom widgets from the %1$swidgets screen%1$s in the admin. If custom widgets is added than this will be replaced by those widgets.', 'islemag' ), current_user_can( 'edit_theme_options' ) ? '<a href="' . admin_url( 'widgets.php' ) . '">' : '', current_user_can( 'edit_theme_options' ) ? '</a>' : '' ),
			),
			array(
				'before_widget' => '<div id="text-3" class="widget widget_text">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
				'after_title'   => '</span></h3>',
			)
		);

		the_widget(
			'Islemag_Multiple_Ads',
			array(
				'widget_title'  => __( 'Banner Widget Example', 'islemag' ),
				'link_ad1'      => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad1' => apply_filters( 'islemag_default_sidebar_banner_filter', get_template_directory_uri() . '/img/small_banner_placeholder.png' ),
				'banner_type1'  => 'image',
				'link_ad2'      => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad2' => apply_filters( 'islemag_default_sidebar_banner_filter', get_template_directory_uri() . '/img/small_banner_placeholder.png' ),
				'banner_type2'  => 'image',
				'link_ad3'      => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad3' => apply_filters( 'islemag_default_sidebar_banner_filter', get_template_directory_uri() . '/img/small_banner_placeholder.png' ),
				'banner_type3'  => 'image',
				'link_ad4'      => ( current_user_can( 'edit_theme_options' ) ? admin_url( 'widgets.php' ) : '' ),
				'image_uri_ad4' => apply_filters( 'islemag_default_sidebar_banner_filter', get_template_directory_uri() . '/img/small_banner_placeholder.png' ),
				'banner_type4'  => 'image',
			),
			array(
				'before_widget' => '<div class="widget islemag_multiple_ads">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
				'after_title'   => '</span></h3>',
			)
		);
	}// End if().
	?>
</aside><!-- #secondary -->
