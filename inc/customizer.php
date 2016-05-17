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
	$wp_customize->get_setting( 'header_textcolor' )->default = '#454545';
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Text color','islemag' );
	$wp_customize->get_control( 'header_textcolor' )->priority = 2;
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->get_control('custom_logo')->section = 'islemag_appearance_general';

	require_once ( 'class/islemag-general-control.php');
	require_once ( 'class/islemag-category-selector.php');



	/*******************************
	 *********** Pannels ***********
	 *******************************/

	$wp_customize->add_panel( 'header_panel', array(
		'priority' => 30,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Header', 'islemag' )
	) );

	$wp_customize->add_panel( 'sections_panel', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'title' => esc_html__( 'Frontpage sections', 'islemag' )
	) );

	/*******************************
	 ********** Sections ***********
	 *******************************/

	 $wp_customize->add_section( 'islemag_header_content', array(
		 'title'				=> esc_html__( 'Header top bar', 'islemag' ),
		 'priority'			=> 1,
		 'panel'				=> 'header_panel'
	 ) );

	 $wp_customize->add_section( 'islemag_appearance_general', array(
			'title'				=> esc_html__( 'Header content', 'islemag' ),
			'description'	=> esc_html__('Islemag header content','islemag'),
			'priority'		=> 2,
			'panel'				=> 'header_panel'
	 ) );

	 $wp_customize->add_section( 'islemag_header_slider', array(
 			'title'				=> esc_html__( 'Header slider', 'islemag' ),
 			'priority'		=> 3,
 			'panel'				=> 'header_panel'
 	) );

	$wp_customize->add_section( 'islemag_section1', array(
			'title'				=> esc_html__( 'Section 1', 'islemag' ),
      'priority'		=> 1,
			'panel'				=> 'sections_panel'
	) );

	$wp_customize->add_section( 'islemag_section2', array(
			'title'				=> esc_html__( 'Section 2', 'islemag' ),
  		'priority'		=> 2,
			'panel'				=> 'sections_panel'
	) );

	$wp_customize->add_section( 'islemag_section3', array(
			'title'				=> esc_html__( 'Section 3', 'islemag' ),
  		'priority'		=> 3,
			'panel'				=> 'sections_panel'
	) );

	$wp_customize->add_section( 'islemag_section4', array(
			'title'				=> esc_html__( 'Section 4', 'islemag' ),
  		'priority'		=> 4,
			'panel'				=> 'sections_panel'
	) );

	$wp_customize->add_section( 'islemag_section5', array(
			'title'				=> esc_html__( 'Section 5', 'islemag' ),
			'priority'		=> 5,
			'panel'				=> 'sections_panel'
	) );

	$wp_customize->add_section( 'islemag_single_post' , array(
			'title' => __( 'Single post settings', 'islemag' ),
			'priority' => 50,
	) );

	$wp_customize->add_section( 'islemag_footer' , array(
			'title' => __( 'Footer', 'islemag' ),
			'priority' => 60,
	) );

	/*******************************
	 ********** Settings ***********
	 *******************************/

	$wp_customize->add_setting( 'islemag_title_color', array(
		 	'default' 							=> '#454545',
			'transport'							=> 'postMessage',
		 	'sanitize_callback' 		=> 'sanitize_text_field'
	)	);

	$wp_customize->add_setting( 'islemag_top_slider_post_title_color', array(
		 	'default' 							=> '#ffffff',
			'transport'							=> 'postMessage',
		 	'sanitize_callback' 		=> 'sanitize_text_field'
	)	);

	$wp_customize->add_setting( 'islemag_top_slider_post_text_color', array(
		'default' 							=> '#ffffff',
		'transport'							=> 'postMessage',
		'sanitize_callback' 		=> 'sanitize_text_field'
	)	);

	$wp_customize->add_setting( 'islemag_sections_post_title_color', array(
		'default' 							=> '#454545',
		'transport'							=> 'postMessage',
		'sanitize_callback' 		=> 'sanitize_text_field'
	)	);

	$wp_customize->add_setting( 'islemag_sections_post_text_color', array(
		'default' 							=> '#454545',
		'transport'							=> 'postMessage',
		'sanitize_callback' 		=> 'sanitize_text_field'
	)	);


	$wp_customize->add_setting( 'islemag_social_icons', array(
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'islemag_sanitize_repeater'
	) );


	$wp_customize->add_setting( 'islemag_sticky_menu', array(
			'default'								=> false,
			'sanitize_callback'			=> 'sanitize_text_field',
	) );


	$wp_customize->add_setting( 'islemag_header_slider_category', array(
			'default'								=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_header_slider_max_posts', array(
			'default'								=> 6,
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'absint'
	) );


	$wp_customize->add_setting( 'islemag_section1_fullwidth', array(
			'defalt'								=> false,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section1_title', array(
			'default'								=> esc_html__('Section 1','islemag'),
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section1_category', array(
			'default' 							=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_section1_max_posts', array(
			'default' 							=> 6,
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_section2_fullwidth', array(
			'defalt'								=> false,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section2_title', array(
			'default'								=> esc_html__( 'Section 2', 'islemag' ),
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section2_category', array(
			'default' 							=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_section2_max_posts', array(
			'default' 							=> 6,
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_section3_fullwidth', array(
			'defalt'								=> false,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section3_title', array(
			'default' 							=> esc_html__( 'Section 3', 'islemag' ),
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section3_category', array(
			'default' 							=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_section3_max_posts', array(
			'default' 							=> 6,
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_section4_fullwidth', array(
			'defalt'								=> false,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section4_title', array(
			'default'								=> esc_html__('Section 4','islemag'),
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section4_category', array(
			'defalt'								=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback' 		=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_section4_max_posts', array(
			'default'								=> 12,
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_section4_posts_per_page', array(
			'default'								=> 6,
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_section5_fullwidth', array(
			'defalt'								=> false,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section5_title', array(
			'default'								=> esc_html__('Section 5','islemag'),
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_section5_category', array(
			'default' 							=> 'all',
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'islemag_sanitize_category_dropdown'
	) );

	$wp_customize->add_setting( 'islemag_section5_max_posts', array(
			'default'								=> 8,
			'transport'							=> 'postMessage',
			'sanitize_callback'			=> 'absint'
	) );

	$wp_customize->add_setting( 'islemag_single_post_hide_author', array(
			'defalt'								=> true,
			'transport' 						=> 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_single_post_hide_related_posts', array(
			'transport' => 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );

	$wp_customize->add_setting( 'islemag_single_post_hide_thumbnail', array(
			'default' => '1',
			'transport' => 'postMessage',
			'sanitize_callback'			=> 'sanitize_text_field'
	) );
	

	$wp_customize->add_setting( 'islemag_footer_logo', array(
			'sanitize_callback'			=> 'esc_url',
			'transport'							=> 'postMessage'
	) );

	$wp_customize->add_setting( 'islemag_footer_link', array(
			'sanitize_callback'			=> 'esc_url',
			'transport'							=> 'postMessage'
	) );

	$wp_customize->add_setting( 'islemag_footer_text', array(
			'sanitize_callback' => 'islemag_sanitize_html',
			'transport' => 'postMessage'
	) );

	$wp_customize->add_setting( 'islemag_footer_socials_title', array(
			'sanitize_callback'			=> 'sanitize_text_field',
			'transport'							=> 'postMessage'
	) );

	$wp_customize->add_setting( 'islemag_footer_social_icons', array(
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'islemag_sanitize_repeater'
	) );


	/*******************************
	 ********** Controls ***********
	 *******************************/

	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'islemag_title_color', array(
		 	'label'      							=> esc_html__( 'Title color', 'islemag' ),
			'section'    							=> 'colors',
			'priority'   							=> 1
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'islemag_top_slider_post_title_color', array(
		 'label'      							=> esc_html__( 'Top slider\'s posts title color', 'islemag' ),
		 'section'    							=> 'colors',
		 'priority'   							=> 3
	 ) ) );

 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'islemag_top_slider_post_text_color', array(
		'label'      								=> esc_html__( 'Top slider\'s posts text color', 'islemag' ),
		'section'    								=> 'colors',
		'priority'   								=> 4
	) ) );


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'islemag_sections_post_title_color', array(
		 'label'      							=> esc_html__( 'Section\'s posts title color', 'islemag' ),
		 'section'    							=> 'colors',
		 'priority'   							=> 5
 ) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'islemag_sections_post_text_color', array(
			'label'      							=> esc_html__( 'Section\'s posts text color', 'islemag' ),
			'section'    							=> 'colors',
			'priority'   							=> 6
	) ) );


	$wp_customize->add_control( new Islemag_General_Repeater( $wp_customize, 'islemag_social_icons', array(
			'label'					=> esc_html__('Add new social icon','islemag'),
			'section'				=> 'islemag_header_content',
			'priority'				=> 1,
			'islemag_icon_control'	=> true,
			'islemag_link_control'	=> true
	) ) );


	$wp_customize->add_control( 'islemag_sticky_menu', array(
			'type'										=> 'checkbox',
			'label' 									=> esc_html__( 'Disable sticky menu', 'islemag' ),
			'section'  								=> 'islemag_appearance_general',
			'priority' 								=> 2,
	) );


	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_header_slider_category', array(
			'label'										=> esc_html__( 'Category', 'islemag' ),
			'section'									=> 'islemag_header_slider',
			'priority'								=> 1
	) ) );

	$wp_customize->add_control( 'islemag_header_slider_max_posts', array(
			'label'    								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description'							=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_header_slider',
			'type' 										=> 'number',
		'input_attrs' 							=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 2
	) );

	$wp_customize->add_control( 'islemag_section1_fullwidth', array(
			'type'										=> 'checkbox',
			'label' 									=> __( 'Full width section', 'islemag' ),
			'description' 						=> __( 'If you check this box and you have a sidebar, the section will be displayed after the sidebar','islemag' ),
			'section'  								=> 'islemag_section1',
			'priority' 								=> 1,
	) );

	$wp_customize->add_control( 'islemag_section1_title', array(
			'label'   								=> esc_html__( 'Title', 'islemag' ),
			'section'  								=> 'islemag_section1',
			'priority'    						=> 2
	) );

	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section1_category', array(
    	'label'    								=> esc_html__( 'Category', 'islemag' ),
    	'section'  								=> 'islemag_section1',
			'priority'    						=> 3
	) ) );

	$wp_customize->add_control( 'islemag_section1_max_posts', array(
			'label'    								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description' 						=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_section1',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 4
	) );

	$wp_customize->add_control( 'islemag_section2_fullwidth', array(
			'type'										=> 'checkbox',
			'label' 									=> __( 'Full width section', 'islemag' ),
			'description' 						=> __( 'If you check this box and you have a sidebar, the section will be displayed after the sidebar','islemag' ),
			'section'  								=> 'islemag_section2',
			'priority' 								=> 1,
	) );

	$wp_customize->add_control( 'islemag_section2_title', array(
			'label'    								=> esc_html__( 'Title', 'islemag' ),
			'section'  								=> 'islemag_section2',
			'priority'    						=> 2
	) );

	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section2_category', array(
    	'label'    								=> esc_html__( 'Category', 'islemag' ),
    	'section'  								=> 'islemag_section2',
			'priority'    						=> 3
	) ) );

	$wp_customize->add_control( 'islemag_section2_max_posts', array(
			'label'    								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description' 						=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_section2',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 4
	) );

	$wp_customize->add_control( 'islemag_section3_fullwidth', array(
			'type'										=> 'checkbox',
			'label' 									=> __( 'Full width section', 'islemag' ),
			'description' 						=> __( 'If you check this box and you have a sidebar, the section will be displayed after the sidebar','islemag' ),
			'section'  								=> 'islemag_section3',
			'priority' 								=> 1,
	) );


	$wp_customize->add_control( 'islemag_section3_title', array(
			'label'    								=> esc_html__( 'Title', 'islemag' ),
			'section'  								=> 'islemag_section3',
			'priority'   							=> 2
	) );

	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section3_category', array(
    	'label'    								=> esc_html__( 'Category', 'islemag' ),
    	'section'  								=> 'islemag_section3',
			'priority'    						=> 3
	) ) );

	$wp_customize->add_control( 'islemag_section3_max_posts', array(
			'label'   								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description' 						=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_section3',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 4
	) );

	$wp_customize->add_control( 'islemag_section4_fullwidth', array(
			'type'										=> 'checkbox',
			'label' 									=> __( 'Full width section', 'islemag' ),
			'description' 						=> __( 'If you check this box and you have a sidebar, the section will be displayed after the sidebar','islemag' ),
			'section'  								=> 'islemag_section4',
			'priority' 								=> 1,
	) );


	$wp_customize->add_control( 'islemag_section4_title', array(
			'label'    								=> esc_html__( 'Title', 'islemag' ),
			'section'  								=> 'islemag_section4',
			'priority'    						=> 2
	) );

	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section4_category', array(
    	'label'    								=> esc_html__( 'Category', 'islemag' ),
    	'section'  								=> 'islemag_section4',
			'priority'    						=> 3
	) ) );

	$wp_customize->add_control( 'islemag_section4_max_posts', array(
			'label'    								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description' 						=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_section4',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 4
	) );

	$wp_customize->add_control( 'islemag_section4_posts_per_page', array(
			'label'    								=> esc_html__( 'Number of posts in each slide', 'islemag' ),
			'section'  								=> 'islemag_section4',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => 1, 'step' => 1	),
			'priority'    						=> 5
	) );

	$wp_customize->add_control( 'islemag_section5_fullwidth', array(
			'type'										=> 'checkbox',
			'label' 									=> __( 'Full width section', 'islemag' ),
			'description' 						=> __( 'If you check this box and you have a sidebar, the section will be displayed after the sidebar','islemag' ),
			'section'  								=> 'islemag_section5',
			'priority' 								=> 1,
	) );

	$wp_customize->add_control( 'islemag_section5_title', array(
			'label'    								=> esc_html__( 'Title', 'islemag' ),
			'section'  								=> 'islemag_section5',
			'priority'    						=> 2
	) );

	$wp_customize->add_control( new IseleMagCategorySelector( $wp_customize, 'islemag_section5_category', array(
    	'label'    								=> esc_html__( 'Category', 'islemag' ),
    	'section'									=> 'islemag_section5',
			'priority'								=> 3
	) ) );

	$wp_customize->add_control( 'islemag_section5_max_posts', array(
			'label'    								=> esc_html__( 'Number of posts in this section', 'islemag' ),
			'description' 						=> esc_html__('To display all posts, set this field to -1.','islemag'),
			'section'  								=> 'islemag_section5',
			'type' 										=> 'number',
			'input_attrs' 						=> array( 'min' => -1, 'step' => 1 ),
			'priority'    						=> 4
	) );

	$wp_customize->add_control( 'islemag_single_post_hide_author', array(
			'type' 										=> 'checkbox',
			'label' 									=> __( 'Hide author\'s description?', 'islemag' ),
			'description' 						=> __( 'If you check this box, the author\'s description will disappear from single page.','islemag' ),
			'section' 								=> 'islemag_single_post',
			'priority' 								=> 1,
	) );

	$wp_customize->add_control( 'islemag_single_post_hide_related_posts', array(
			'type' 										=> 'checkbox',
			'label'										=> __( 'Hide related posts?', 'islemag' ),
			'description' 						=> __( 'If you check this box, related posts will disappear from single page.','islemag' ),
			'section' 								=> 'islemag_single_post',
			'priority' 								=> 2,
	) );

	$wp_customize->add_control( 'islemag_single_post_hide_thumbnail', array(
			'type' 										=> 'checkbox',
			'label'										=> __( 'Hide post thumbnail on single page?', 'islemag' ),
			'description' 						=> __( 'If you check this box, the thumbnail will disappear from single page.','islemag' ),
			'section' 								=> 'islemag_single_post',
			'priority' 								=> 3,
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'islemag_footer_logo', array(
			'label'										=> esc_html__( 'Footer logo', 'islemag' ),
			'section'									=> 'islemag_footer',
			'priority'								=> 1
	) ) );

	$wp_customize->add_control( 'islemag_footer_link', array(
			'label' 									=> esc_html__( 'Footer logo link', 'islemag' ),
			'description' 						=> esc_html__( 'If not set, the footer logo will point to homepage url.', 'islemag' ),
			'section' 								=> 'islemag_footer',
			'priority' 								=> 2,
	) );

	$wp_customize->add_control( 'islemag_footer_text', array(
			'description'							=> esc_html__( 'Allowed HTML tags: <p>, <br>, <em>, <strong>, <ul>, <li>, <a>, <button>, <address>, <abbr>', 'islemag' ),
			'type'										=> 'textarea',
			'label' 									=> esc_html__( 'Footer content', 'islemag' ),
			'section' 								=> 'islemag_footer',
			'priority' 								=> 3,
	) );

	$wp_customize->add_control( 'islemag_footer_socials_title', array(
			'label' 									=> esc_html__( 'Socials title', 'islemag' ),
			'section' 								=> 'islemag_footer',
			'priority' 								=> 4,
	) );

	$wp_customize->add_control( new Islemag_General_Repeater( $wp_customize, 'islemag_footer_social_icons', array(
			'label'					=> esc_html__('Add new social icon','islemag'),
			'section'				=> 'islemag_footer',
			'priority'				=> 5,
			'islemag_icon_control'	=> true,
			'islemag_link_control'	=> true
	) ) );


}
add_action( 'customize_register', 'islemag_customize_register' );


/*********************************
***** Sanitization Functions *****
**********************************/

function islemag_sanitize_repeater( $input ) {
		$input_decoded = json_decode( $input, true );
		if( !empty( $input_decoded ) ) {
			$icons_array = array('none' => 'none','500px' => 'fa-500px','amazon' => 'fa-amazon','android' => 'fa-android','behance' => 'fa-behance','behance-square' => 'fa-behance-square','bitbucket' => 'fa-bitbucket','bitbucket-square' => 'fa-bitbucket-square','american-express' => 'fa-cc-amex','diners-club' => 'fa-cc-diners-club','discover' => 'fa-cc-discover','jcb' => 'fa-cc-jcb','mastercard' => 'fa-cc-mastercard','paypal' => 'fa-cc-paypal','stripe' => 'fa-cc-stripe','visa' => 'fa-cc-visa','codepen' => 'fa-codepen','css3' => 'fa-css3','delicious' => 'fa-delicious','deviantart' => 'fa-deviantart','digg' => 'fa-digg','dribble' => 'fa-dribbble','dropbox' => 'fa-dropbox','drupal' => 'fa-drupal','facebook' => 'fa-facebook','facebook-official' => 'fa-facebook-official','facebook-square' => 'fa-facebook-square','flickr' => 'fa-flickr','foursquare' => 'fa-foursquare','git' => 'fa-git','git-square' => 'fa-git-square','github' => 'fa-github','github-alt' => 'fa-github-alt','github-square' => 'fa-github-square','google' => 'fa-google','google-plus' => 'fa-google-plus','google-plus-square' => 'fa-google-plus-square','html5' => 'fa-html5','instagram' => 'fa-instagram','joomla' => 'fa-joomla','jsfiddle' => 'fa-jsfiddle','linkedin' => 'fa-linkedin','linkedin-square' => 'fa-linkedin-square','opencart' => 'fa-opencart','openid' => 'fa-openid','paypal' => 'fa-paypal','pinterest' => 'fa-pinterest','pinterest-p' => 'fa-pinterest-p','pinterest-square' => 'fa-pinterest-square','rebel' => 'fa-rebel','reddit' => 'fa-reddit','reddit-square' => 'fa-reddit-square','share' => 'fa-share-alt','share-square' => 'fa-share-alt-square','skype' => 'fa-skype','slack' => 'fa-slack','soundcloud' => 'fa-soundcloud','spotify' => 'fa-spotify','stack-overflow' => 'fa-stack-overflow','steam' => 'fa-steam','steam-square' => 'fa-steam-square','tripadvisor' => 'fa-tripadvisor','tumblr' => 'fa-tumblr','tumblr-square' => 'fa-tumblr-square','twitch' => 'fa-twitch','twitter' => 'fa-twitter','twitter-square' => 'fa-twitter-square','vimeo' => 'fa-vimeo','vimeo-square' => 'fa-vimeo-square','vine' => 'fa-vine','whatsapp' => 'fa-whatsapp','wordpress' => 'fa-wordpress','yahoo' => 'fa-yahoo','youtube' => 'fa-youtube','youtube-play' => 'fa-youtube-play','youtube-squar' => 'fa-youtube-square');

			foreach ($input_decoded as $iconk => $iconv) {
				foreach ($iconv as $key => $value) {
					if ( $key == 'icon_value' && !in_array( $value, $icons_array ) ){
						$input_decoded [$iconk][$key] = 'none';
					}
					if( $key == 'link' ){
						$input_decoded [$iconk][$key] = esc_url( $value );;
					}
				}
			}

			$result =  json_encode( $input_decoded );
			return $result;
		}
		return $input;
}

function islemag_sanitize_category_dropdown( $input ){
	$cat = get_category_by_slug( $input );
	if( empty( $cat ) ){
		return 'all';
	}
	return $input;
}

function islemag_sanitize_banner( $input){
	$input_decoded = json_decode( $input, true );

	$choice = $input_decoded['choice'];
	$position = $input_decoded['position'];
	$code = html_entity_decode ( $input_decoded['code'] );
	$link = $input_decoded['link'];
	$image = $input_decoded['image_url'];

	$banner_type = array( 'code', 'image' );
	if ( !in_array( $choice, $banner_type ) ) {
    $input_decoded['choice'] = 'image';
	}

	$banner_position = array( 'right', 'center', 'left' );
	if ( !in_array( $position, $banner_position ) ) {
    $input_decoded['position'] = 'center';
	}

	$allowed_html = array(
							'a' => array(
								'href' => array(),
								'class' => array(),
								'id' => array(),
								'target' => array()
							),
							'img' => array(
								'src' => array(),
								'alt' => array(),
								'title' => array(),
								'width' => array(),
								'height' => array()
							),
							'iframe' => array(
								'src' => array(),
								'width' => array(),
								'height' => array(),
								'seamless' => array(),
								'scrolling' => array(),
								'frameborder' => array(),
								'allowtransparency' => array()
							)
						);

	$string = force_balance_tags( $code );
	$input_decoded['code'] = wp_kses( $string, $allowed_html );

	$input_decoded['link'] = esc_url( $link );
	$input_decoded['image'] = esc_url( $image );

	return json_encode( $input_decoded );
}


function islemag_sanitize_html( $input){
	$allowed_html = array(
							'p' => array(
								'class' => array(),
								'id' => array()
							),
							'br' => array(),
							'em' => array(),
							'address' => array(),
							'strong' => array(),
							'ul' => array(
								'class' => array(),
								'id' => array()
							),
							'li' => array(
								'class' => array(),
								'id' => array()
							),
							'a' => array(
								'href' => array(),
								'class' => array(),
								'id' => array(),
								'target' => array()
							),
							'button' => array(
								'class' => array(),
								'id' => array()
							),
							'abbr' => array(
								'title'=> array()
							)
						);


	$string = force_balance_tags($input);
	return wp_kses($string, $allowed_html);
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function islemag_customize_preview_js() {
	wp_enqueue_script( 'islemag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.8', true );
	wp_localize_script( 'islemag_customizer', 'requestpost', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),

	));
}
add_action( 'customize_preview_init', 'islemag_customize_preview_js' );
