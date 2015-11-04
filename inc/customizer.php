<?php
/**
 * islemag Theme Customizer.
 *
 * @package islemag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function islemag_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	
	require_once ( 'class/islemag-general-control.php');
	
	
	
	$wp_customize->add_panel( 'header_panel', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Header', 'islemag' )
	) );
	
	
	
	$wp_customize->add_section( 'islemag_header_content' , array(
			'title'       => esc_html__( 'Header top bar', 'islemag' ),
			'priority'    => 1,
			'panel'		  => 'header_panel'
	));
	
	$wp_customize->add_setting( 'islemag_social_icons', array(
	//	'sanitize_callback' => 'islemag_sanitize_repeater',
		'default' => json_encode(
			array(
				array('icon_value' =>'fa-facebook-official' , 'link' => '#'),
				array('icon_value' =>'fa-google' , 'link' => '#'),
				array('icon_value' =>'fa-instagram' , 'link' => '#')
			)
		)

	));
	$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'islemag_social_icons', array(
		'label'   => esc_html__('Add new social icon','islemag'),
		'section' => 'islemag_header_content',
		'priority' => 1,
        'islemag_icon_control' => true,
        'islemag_link_control' => true
	) ) );
	
	
	
	$wp_customize->add_section( 'islemag_appearance_general' , array(
		'title'       => esc_html__( 'Header content', 'islemag' ),
      	'priority'    => 2,
      	'description' => esc_html__('Islemag header content','islemag'),
		'panel' 	  => 'header_panel'
	));
	
	/* Logo	*/
	$wp_customize->add_setting( 'islemag_logo', array(
		'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'islemag_logo', array(
	      	'label'    => esc_html__( 'Logo', 'parallax-one' ),
	      	'section'  => 'islemag_appearance_general',
			'priority'    => 1,
	)));
	
	
}
add_action( 'customize_register', 'islemag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function islemag_customize_preview_js() {
	wp_enqueue_script( 'islemag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'islemag_customize_preview_js' );
