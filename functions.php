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
		add_image_size( 'blog-post', 770, 430, true );
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
	add_theme_support( 'custom-background', array(
		'default-image' => get_template_directory_uri() . '/img/islemag-background.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
		'default-attachment'     => 'fixed',
	) );

	// Header image
	$defaults = array(
		'default-image'          => get_stylesheet_directory_uri().'/img/banner.jpg',
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
			'url'           => get_stylesheet_directory_uri().'/img/banner.jpg',
			'thumbnail_url' => get_stylesheet_directory_uri().'/img/banner_th.jpg',
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


	wp_enqueue_style( 'islemag-bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css',array(), '3.3.5');

	wp_enqueue_style( 'islemag-style', get_stylesheet_uri() );

	wp_enqueue_style( 'islemag-font1', '//fonts.googleapis.com/css?family=Lato:400,700');

	wp_enqueue_style( 'islemag-font2', '//fonts.googleapis.com/css?family=Raleway:400,600,700');

	wp_enqueue_style( 'islemag-font3', '//fonts.googleapis.com/css?family=Open+Sans:400,700,600');

	wp_enqueue_style( 'islemag-fontawesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css',array(), '4.4.0');

	if( is_home() ){
		wp_enqueue_script( 'islemag-script-index', get_template_directory_uri() . '/js/script.index.js', array('jquery'), '1.0.0', true );
	}

	if( is_single() ){
		wp_enqueue_script( 'islemag-script-single', get_template_directory_uri() . '/js/script.single.js', array('jquery'), '1.0.0', true );
	}

	wp_enqueue_script( 'islemag-script-all', get_template_directory_uri() . '/js/script.all.js', array('jquery'), '1.0.0', true );
  wp_localize_script( 'islemag-script-all', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'islemag' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'islemag' ) . '</span>',
	) );

	wp_enqueue_script( 'islemag-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.0.0', true );

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

	wp_enqueue_script( 'islemag_customizer_script', get_template_directory_uri() .'/js/islemag_customizer.js', array("jquery","jquery-ui-draggable","islemag_ddslick"),'1.0.0', true  );

	wp_enqueue_script( 'islemag_ddslick', get_template_directory_uri() .'/js/jquery.ddslick.js', array("jquery"),'1.0.0', true  );

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
 * Related Posts Excerpt
 **/
function islemag_get_excerpt(){
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

/**
 * Callback function for form
 **/
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



add_action( 'wp_ajax_nopriv_request_post', 'islemag_requestpost' );
add_action( 'wp_ajax_request_post', 'islemag_requestpost' );

$islemag_section1_category = '';

function islemag_requestpost() {
		$colors = array("red", "orange", "blue", "green", "purple", "pink", "yellow");
		$section = $_POST['section'];

		if( $section == 'islemag_topslider_category' ){

			if ( get_option( 'islemag_header_slider_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_header_slider_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_header_slider_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_header_slider_category', 'all' );
					add_option( 'islemag_header_slider_category', $cat );
				}
			}


			if ( get_option( 'islemag_header_slider_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_header_slider_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_header_slider_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_header_slider_max_posts', 6 );
					add_option( 'islemag_header_slider_max_posts', $nb_of_posts );
				}
			}
			$cat = get_option( 'islemag_header_slider_category' );
			$nb_of_posts = get_option( 'islemag_header_slider_max_posts' );

			$islemag_header_slider_category = $cat;
			$islemag_header_slider_max_posts =  $nb_of_posts;
			$wp_query = new WP_Query(
				array(
								'posts_per_page'        => $islemag_header_slider_max_posts,
								'order'                 => 'ASC',
								'post_status'           => 'publish',
								'category_name'         =>  (!empty($islemag_header_slider_category) && $islemag_header_slider_category != 'all' ? $islemag_header_slider_category : '')
						)
			);

			if ( $wp_query->have_posts() ) : ?>
	      <div class="islemag-top-container">
	        <div class="owl-carousel islemag-top-carousel rect-dots">
	          <?php
										while ( $wp_query->have_posts() ) : $wp_query->the_post();
					            get_template_part( 'template-parts/slider-posts', get_post_format() );
										endwhile;
											wp_reset_postdata();
						?>
	        </div><!-- End .islemag-top-carousel -->
	      </div><!-- End .islemag-top-container -->
	      <?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
		}

		if( $section == 'islemag_section1_category' ){

			if ( get_option( 'islemag_section1_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_section1_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_section1_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_section1_category', 'all' );
					add_option( 'islemag_section1_category', $cat );
				}
			}


			if ( get_option( 'islemag_section1_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_section1_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_section1_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_section1_max_posts', 6 );
					add_option( 'islemag_section1_max_posts', $nb_of_posts );
				}
			}

			$cat = get_option( 'islemag_section1_category' );
			$nb_of_posts = get_option( 'islemag_section1_max_posts' );

			$islemag_section_category = $cat;
			$islemag_section_max_posts = $nb_of_posts;
			include( locate_template( 'template-parts/content-template1.php' ) );

		}

		if( $section == 'islemag_section2_category' ){

			if ( get_option( 'islemag_section2_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_section2_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_section2_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_section2_category', 'all' );
					add_option( 'islemag_section2_category', $cat );
				}
			}


			if ( get_option( 'islemag_section2_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_section2_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_section2_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_section2_max_posts', 6 );
					add_option( 'islemag_section2_max_posts', $nb_of_posts );
				}
			}
			$cat = get_option( 'islemag_section2_category' );
			$nb_of_posts = get_option( 'islemag_section2_max_posts' );

			$islemag_section_category = $cat;
			$islemag_section_max_posts = $nb_of_posts;
			include( locate_template( 'template-parts/content-template2.php' ) );

		}

		if( $section == 'islemag_section3_category' ){

			if ( get_option( 'islemag_section3_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_section3_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_section3_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_section3_category', 'all' );
					add_option( 'islemag_section3_category', $cat );
				}
			}

			if ( get_option( 'islemag_section3_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_section3_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_section3_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_section3_max_posts', 6 );
					add_option( 'islemag_section3_max_posts', $nb_of_posts );
				}
			}

			$cat = get_option( 'islemag_section3_category' );
			$nb_of_posts = get_option( 'islemag_section3_max_posts' );

			$islemag_section_category = $cat;
			$islemag_section_max_posts = $nb_of_posts;
			include( locate_template( 'template-parts/content-template1.php' ) );
		}

		if( $section == 'islemag_section4_category' ){

			if ( get_option( 'islemag_section4_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_section4_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_section4_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_section4_category', 'all' );
					add_option( 'islemag_section4_category', $cat );
				}
			}

			if ( get_option( 'islemag_section4_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_section4_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_section4_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_section4_max_posts', 12 );
					add_option( 'islemag_section4_max_posts', $nb_of_posts );
				}
			}

			if ( get_option( 'islemag_section4_posts_per_page' ) !== false ) {
				if( !empty( $_POST['posts_per_page'] ) ){
					update_option( 'islemag_section4_posts_per_page', $_POST['posts_per_page'] );
				}
			} else {
				if( !empty( $_POST['posts_per_page'] ) ){
					add_option( 'islemag_section4_posts_per_page', $_POST['posts_per_page'] );
				} else {
					$posts_per_page = get_theme_mod( 'islemag_section4_posts_per_page', 6 );
					add_option( 'islemag_section4_posts_per_page', $posts_per_page );
				}
			}
			$cat = get_option( 'islemag_section4_category' );
			$nb_of_posts = get_option( 'islemag_section4_max_posts' );
			$posts_per_page = get_option( 'islemag_section4_posts_per_page' );

			$islemag_section_category = $cat;
			$islemag_section_max_posts = $nb_of_posts;
			$postperpage = $posts_per_page;
			include( locate_template( 'template-parts/content-template3.php' ) );

		}




		if( $section == 'islemag_section5_category' ){

			if ( get_option( 'islemag_section5_category' ) !== false ) {
				if( !empty( $_POST['category'] ) ){
					update_option( 'islemag_section5_category', $_POST['category'] );
				}
			} else {
				if( !empty( $_POST['category'] ) ){
					add_option( 'islemag_section5_category', $_POST['category'] );
				} else {
					$cat = get_theme_mod( 'islemag_section5_category', 'all' );
					add_option( 'islemag_section5_category', $cat );
				}
			}

			if ( get_option( 'islemag_section5_max_posts' ) !== false ) {
				if( !empty( $_POST['nb_of_posts'] ) ){
					update_option( 'islemag_section5_max_posts', $_POST['nb_of_posts'] );
				}
			} else {
				if( !empty( $_POST['nb_of_posts'] ) ){
					add_option( 'islemag_section5_max_posts', $_POST['nb_of_posts'] );
				} else {
					$nb_of_posts = get_theme_mod( 'islemag_section5_max_posts', 12 );
					add_option( 'islemag_section5_max_posts', $nb_of_posts );
				}
			}
			$cat = get_option( 'islemag_section5_category' );
			$nb_of_posts = get_option( 'islemag_section5_max_posts' );

			$islemag_section_category = $cat;
			$islemag_section_max_posts = $nb_of_posts;
			include( locate_template( 'template-parts/content-template4.php' ) );
		}


    die();
}


add_action('wp_footer','islemag_style', 100);
function islemag_style() {

	echo '<style type="text/css">';

	$islemag_title_color = get_theme_mod( 'islemag_title_color','#454545' );
	if(!empty($islemag_title_color)){
		echo '.title-border span { color: '. $islemag_title_color .' }';
		echo 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: '. $islemag_title_color .' }';
	}

	$islemag_sidebar_textcolor = get_theme_mod( 'header_textcolor','#454545' );
	if( !empty($islemag_sidebar_textcolor) ){
		echo '.sidebar .widget li a, .islemag-content-right, .islemag-content-right a, .post .entry-content, .post .entry-content p,
		 .post .entry-cats, .post .entry-cats a, .post .entry-comments', '.post .entry-separator, .post .entry-footer a,
		 .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content { color: #'.$islemag_sidebar_textcolor.'}';
	}

	$islemag_top_slider_post_title_color = get_theme_mod( 'islemag_top_slider_post_title_color','#ffffff' );
	if( !empty($islemag_top_slider_post_title_color) ){
		echo '.islemag-top-container .entry-block .entry-overlay-meta .entry-title a { color: '. $islemag_top_slider_post_title_color .' }';
	}

	$islemag_top_slider_post_text_color = get_theme_mod( 'islemag_top_slider_post_text_color','#ffffff' );
	if( !empty($islemag_top_slider_post_text_color) ){
		echo '.islemag-top-container .entry-overlay-meta .entry-overlay-date { color: '. $islemag_top_slider_post_text_color .' }';
		echo '.islemag-top-container .entry-overlay-meta .entry-separator { color: '. $islemag_top_slider_post_text_color .' }';
		echo '.islemag-top-container .entry-overlay-meta > a { color: '. $islemag_top_slider_post_text_color .' }';
	}

	$islemag_sections_post_title_color = get_theme_mod( 'islemag_sections_post_title_color','#454545' );
	if( !empty($islemag_sections_post_title_color) ){
		echo '.islemag-content-left .entry-title a { color: '. $islemag_sections_post_title_color .' }';
	}



	$islemag_sections_post_text_color = get_theme_mod( 'islemag_sections_post_text_color','#454545' );
	if( !empty($islemag_sections_post_text_color) ){
		echo '.islemag-content-left .entry-meta, .islemag-content-left .blog-related-carousel .entry-content p,
		.islemag-content-left .blog-related-carousel .entry-cats .entry-label, .islemag-content-left .blog-related-carousel .entry-cats a,
		.islemag-content-left .blog-related-carousel > a, .islemag-content-left .blog-related-carousel .entry-footer > a { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .entry-meta .entry-separator { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .entry-meta a { color: '. $islemag_sections_post_text_color .' }';
		echo '.islemag-content-left .islemag-template3 .col-sm-6 .entry-overlay p { color: '. $islemag_sections_post_text_color .' }';
	}

	echo '</style>';
}
