<?php
/**
 * islemag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package islemag
 */

if ( ! function_exists( 'islemag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function islemag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on islemag, use a find and replace
	 * to change 'islemag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'islemag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'main-slider', 400, 400, true );
	}


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'islemag' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'islemag_custom_background_args', array(
		'default-color' => 'red',
		'default-image' => '',
	) ) );
	
	// Header image
	$defaults = array(
		'default-image'          => get_stylesheet_directory_uri().'/img/banner.png',
		'width'                  => 900,
		'height'                 => 110,
		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,
		
		// Random image rotation off by default.
		'random-default'         => false,
	);
	add_theme_support( 'custom-header', $defaults );
	
	register_default_headers( array(
		'wheel' => array(
			'url'           => get_stylesheet_directory_uri().'/img/banner.png',
			'thumbnail_url' => get_stylesheet_directory_uri().'/img/banner_th.png',
			'description'   => __( 'Banner', 'islemag' )
		)
	) );
}
endif; // islemag_setup
add_action( 'after_setup_theme', 'islemag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function islemag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'islemag_content_width', 640 );
}
add_action( 'after_setup_theme', 'islemag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function islemag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'islemag' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'islemag_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function islemag_scripts() {
	
	
	wp_enqueue_style( 'islemag-bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css',array(), '1.0.0');
	
	wp_enqueue_style( 'islemag-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'islemag-font1', '//fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic');
	
	wp_enqueue_style( 'islemag-font2', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900');
	
	wp_enqueue_style( 'islemag-font3', '//fonts.googleapis.com/css?family=Montserrat:400,700');
	
	wp_enqueue_style( 'islemag-font4', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,600,300,800');
	
	wp_enqueue_style( 'islemag-font5', '//fonts.googleapis.com/css?family=Shadows+Into+Light');
	
	wp_enqueue_style( 'islemag-fontawesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css',array(), '1.0.0');
		
	wp_enqueue_script( 'islemag-script-all', get_template_directory_uri() . '/js/script.all.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script( 'islemag-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'islemag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'islemag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'islemag_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load customize controls js
 */
function islemag_customizer_script() {
	
	wp_enqueue_style( 'islemag-fontawesome_admin', get_stylesheet_directory_uri().'/css/font-awesome.min.css',array(), '1.0.0');
	
	wp_enqueue_script( 'islemag_customizer_script', get_template_directory_uri() .'/js/islemag_customizer.js', array("jquery","jquery-ui-draggable","islemag_ddslick"),'1.0.2', true  );
	
	wp_enqueue_script( 'islemag_ddslick', get_template_directory_uri() .'/js/jquery.ddslick.js', array("jquery"),'1.0.0', true  );
	
	wp_localize_script( 'islemag_customizer_script', 'islemagOneCustomizerObject', array(
		
		'documentation' => esc_html__( 'Documentation', 'islemag' ),
		'support' => esc_html__('Support Forum','islemag'),
		'pro' => __('Upgrade to PRO','islemag'),
		
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'islemag_customizer_script' );


/**
 * Load admin style
 */
function islemag_admin_styles() {
	wp_enqueue_style( 'islemag_admin_stylesheet', get_stylesheet_directory_uri().'/css/admin-style.css','1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'islemag_admin_styles', 10 );