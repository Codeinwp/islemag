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
	require_once ( 'class/islemag-category-selector.php');
	
	
	
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
	      	'label'    => esc_html__( 'Logo', 'islemag' ),
	      	'section'  => 'islemag_appearance_general',
			'priority'    => 1,
	)));
    
	$wp_customize->add_setting( 'islemag_banner_link', array(
		'default' => '#',
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_banner_link', array(
		'label'    => esc_html__( 'Banner link', 'islemag' ),
		'section'  => 'islemag_appearance_general',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	/*** SECTIONS ***/
	$wp_customize->add_panel( 'sections_panel', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Sections', 'islemag' )
	) );
	
	
	//Section1
	$wp_customize->add_section( 'islemag_section1' , array(
		'title'       => esc_html__( 'Section 1', 'islemag' ),
      	'priority'    => 1,
		'panel' 	  => 'sections_panel'
	));
	
	$wp_customize->add_setting( 'islemag_section1_title', array(
		'default' => esc_html__('Popular Posts','islemag'),
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section1_title', array(
		'label'    => esc_html__( 'Title', 'islemag' ),
		'section'  => 'islemag_section1',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	$wp_customize->add_setting( 'islemag_section1_category', array(
	//	'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section1_category', array(
	      	'label'    => esc_html__( 'Category', 'islemag' ),
	      	'section'  => 'islemag_section1',
			'priority'    => 2,
	)));
	
	$wp_customize->add_setting( 'islemag_section1_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section5_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section1',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
	
	$wp_customize->add_setting( 'islemag_section1_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section1_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section1',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
	
	//Section2
	$wp_customize->add_section( 'islemag_section2' , array(
		'title'       => esc_html__( 'Section 2', 'islemag' ),
      	'priority'    => 2,
		'panel' 	  => 'sections_panel'
	));
	
	$wp_customize->add_setting( 'islemag_section2_title', array(
		'default' => esc_html__('Popular Posts','islemag'),
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section2_title', array(
		'label'    => esc_html__( 'Title', 'islemag' ),
		'section'  => 'islemag_section2',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	$wp_customize->add_setting( 'islemag_section2_category', array(
	//	'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section2_category', array(
	      	'label'    => esc_html__( 'Category', 'islemag' ),
	      	'section'  => 'islemag_section2',
			'priority'    => 2,
	)));
	
	$wp_customize->add_setting( 'islemag_section2_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section2_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section2',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
	//Section3
	$wp_customize->add_section( 'islemag_section3' , array(
		'title'       => esc_html__( 'Section 3', 'islemag' ),
      	'priority'    => 3,
		'panel' 	  => 'sections_panel'
	));
	
	$wp_customize->add_setting( 'islemag_section3_title', array(
		'default' => esc_html__('Popular Posts','islemag'),
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section3_title', array(
		'label'    => esc_html__( 'Title', 'islemag' ),
		'section'  => 'islemag_section3',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	$wp_customize->add_setting( 'islemag_section3_category', array(
	//	'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section3_category', array(
	      	'label'    => esc_html__( 'Category', 'islemag' ),
	      	'section'  => 'islemag_section3',
			'priority'    => 2,
	)));

	$wp_customize->add_setting( 'islemag_section3_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section3_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section3',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
	//Section4
	$wp_customize->add_section( 'islemag_section4' , array(
		'title'       => esc_html__( 'Section 4', 'islemag' ),
      	'priority'    => 4,
		'panel' 	  => 'sections_panel'
	));
	
	$wp_customize->add_setting( 'islemag_section4_title', array(
		'default' => esc_html__('Section 1','islemag'),
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section4_title', array(
		'label'    => esc_html__( 'Title', 'islemag' ),
		'section'  => 'islemag_section4',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	$wp_customize->add_setting( 'islemag_section4_category', array(
	//	'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section4_category', array(
	      	'label'    => esc_html__( 'Category', 'islemag' ),
	      	'section'  => 'islemag_section4',
			'priority'    => 2,
	)));
	
	$wp_customize->add_setting( 'islemag_section4_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section4_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section4',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
	$wp_customize->add_setting( 'islemag_section4_posts_per_page', array(
		'default' => 6,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section4_posts_per_page', array(
		'label'    => esc_html__( 'Number of posts in each slide', 'islemag' ),
		'section'  => 'islemag_section4',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority'    => 4
	));
	
	
	//Section5
	$wp_customize->add_section( 'islemag_section5' , array(
		'title'       => esc_html__( 'Section 5', 'islemag' ),
      	'priority'    => 5,
		'panel' 	  => 'sections_panel'
	));
	
	$wp_customize->add_setting( 'islemag_section5_title', array(
		'default' => esc_html__('Popular Posts','islemag'),
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	$wp_customize->add_control( 'islemag_section5_title', array(
		'label'    => esc_html__( 'Title', 'islemag' ),
		'section'  => 'islemag_section5',
		//'active_callback' => 'parallax_one_show_on_front',
		'priority'    => 1
	));
	
	$wp_customize->add_setting( 'islemag_section5_category', array(
	//	'sanitize_callback' => 'esc_url',
	));
	
	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section5_category', array(
	      	'label'    => esc_html__( 'Category', 'islemag' ),
	      	'section'  => 'islemag_section5',
			'priority'    => 2,
	)));
	
	$wp_customize->add_setting( 'islemag_section5_max_posts', array(
		'default' => -1,
		'sanitize_callback' => 'islemag_sanitize_text',
		//'transport' => 'postMessage'
	));
	
	$wp_customize->add_control( 'islemag_section5_max_posts', array(
		'label'    => esc_html__( 'Number of posts in this section', 'islemag' ),
		'description' => esc_html__('To display all posts, set this field to -1.','islemag'),
		'section'  => 'islemag_section5',
		//'active_callback' => 'parallax_one_show_on_front',
		'type' => 'number',
		'input_attrs' => array(
			'min' => -1,
			'step' => 1,
		),
		'priority'    => 3
	));
	
}
add_action( 'customize_register', 'islemag_customize_register' );


function islemag_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function islemag_customize_preview_js() {
	wp_enqueue_script( 'islemag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'islemag_customize_preview_js' );
