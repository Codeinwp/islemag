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
		add_image_size( 'sections-small-thumbnail', 110, 110, true );
		add_image_size( 'section4-big-thumbnail', 420, 420, true );
		add_image_size( 'author-avatar', 90, 90, true );
		add_image_size( 'related-post', 348, 194, true );
	}


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'islemag' ),
		'footer'  => esc_html__( 'Footer Menu', 'islemag'),
		'header'  => esc_html__( 'Header Menu', 'islemag')
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
		'default-image' => '%1$s/img/background.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed',
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
		'id'            => 'islemag-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title-border blue title-bg-line"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar(
		array(
			'name' => esc_html__('Footer area 1','islemag'),
			'id' => 'islemag-first-footer-area',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		) 
	);
		
	register_sidebar(
		array(
			'name' => esc_html__('Footer area 2','islemag'),
			'id' => 'islemag-second-footer-area',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		) 
	);
		
	register_sidebar(
		array(
			'name' => esc_html__('Footer area 3','islemag'),
			'id' => 'islemag-third-footer-area',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		) 
	);
		
	register_sidebar(
		array(
			'name' => esc_html__('Footer area 4','islemag'),
			'id' => 'islemag-fourth-footer-area',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>'
		) 
	);
	
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


/**
 * Most popular posts
 */

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}


function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}


function get_excerpt(){
	$excerpt = get_the_content();
	$permalink = get_the_permalink();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 140);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
}


function islemag_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		
		
	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf( __( '<h4 class="media-heading">%s</h4><span class="comment-date">(%2$s - %3$s)</span>' ), get_comment_author_link(), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
		<div class="reply pull-right reply-link"> <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </div>
	</div>
		
		
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>



	<div class="media-body">
		<?php comment_text(); ?>
	</div>
		
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}
