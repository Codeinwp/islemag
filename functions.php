<?php
$vendor_file = trailingslashit( get_template_directory() ) . 'vendor/autoload.php';
if ( is_readable( $vendor_file ) ) {
	require_once $vendor_file;
}
add_filter( 'themeisle_sdk_products', 'islemag_load_sdk' );
/**
 * Loads products array.
 *
 * @param array $products All products.
 *
 * @return array Products array.
 */
function islemag_load_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}
/**
 * Islemag functions and definitions.
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
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'islemag_sections_small_thumbnail', 110, 110, true );
		add_image_size( 'islemag_sections_small_thumbnail_no_crop', 110, 110 );

		add_image_size( 'islemag_section4_big_thumbnail', 420, 420, true );
		add_image_size( 'islemag_section4_big_thumbnail_no_crop', 420, 420 );

		add_image_size( 'islemag_related_post', 248, 138, true );
		add_image_size( 'islemag_blog_post', 770, 430, true );
		add_image_size( 'islemag_blog_post_no_crop', 770, 430 );

		/* IAB SIZES */
		add_image_size( 'islemag_leaderboard', 728, 90, true );
		add_image_size( 'islemag_3_1_rectangle', 300, 100, true );
		add_image_size( 'islemag_medium_rectangle', 300, 250, true );
		add_image_size( 'islemag_half_page', 300, 600, true );
		add_image_size( 'islemag_square_pop_up', 250, 250, true );
		add_image_size( 'islemag_vertical_rectangle', 240, 400, true );
		add_image_size( 'islemag_ad_125', 125, 125, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'islemag-header'  => esc_html__( 'Top', 'islemag' ),
				'islemag-primary' => esc_html__( 'Primary', 'islemag' ),
				'islemag-footer'  => esc_html__( 'Footer', 'islemag' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			array(
				'default-image'      => get_template_directory_uri() . '/img/islemag-background.jpg',
				'default-preset'     => 'fill',
				'default-repeat'     => 'no-repeat',
				'default-position-x' => 'center',
				'default-attachment' => 'fixed',
				'default-size'       => 'cover',
			)
		);

		register_default_headers(
			array(
				'wheel' => array(
					'url'           => get_stylesheet_directory_uri() . '/img/banner.jpg',
					'thumbnail_url' => get_stylesheet_directory_uri() . '/img/banner_th.jpg',
					'description'   => __( 'Banner', 'islemag' ),
				),
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 300,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		/*
		 * Welcome screen
		 */

		if ( is_admin() ) {

			global $islemag_required_actions;

			/*
			 * id - unique id; required
			 * title
			 * description
			 * check - check for plugins (if installed)
			 * plugin_slug - the plugin's slug (used for installing the plugin)
			 *
			 */
			$islemag_required_actions = array(
				array(
					'id'          => 'islemag-req-ac-frontpage-latest-news',
					'title'       => esc_html__( 'Switch "Front page displays" to "A static page"', 'islemag' ),
					'description' => esc_html__( 'In order to have the one page look for your website, please go to Customize -> Static Front Page and switch "Front page displays" to "A static page". Then select the template "Frontpage" for that selected page.', 'islemag' ),
					'check'       => islemag_is_not_latest_posts(),
				),
			);

			require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
		}
	}

	/* preview demo */
	require_once( get_template_directory() . '/ti-prevdem/init-prevdem.php' );

endif; // islemag_setup
add_action( 'after_setup_theme', 'islemag_setup' );

/**
 * Check what front page displays
 *
 * @return bool
 */
function islemag_is_not_latest_posts() {
	return ( 'posts' == get_option( 'show_on_front' ) ? false : true );
}

/**
 * Add image size in image_size_names_choose for media uploader
 */
add_filter( 'image_size_names_choose', 'islemg_media_uploader_custom_sizes' );

/**
 * Add image size in image_size_names_choose for media uploader
 */
function islemg_media_uploader_custom_sizes( $sizes ) {
	return array_merge(
		$sizes,
		array(
			'islemag_ad_125'             => esc_html__( 'Small Advertisement', 'islemag' ),
			'islemag_leaderboard'        => esc_html__( 'Leaderboard', 'islemag' ),
			'islemag_3_1_rectangle'      => esc_html__( '3:1 Rectangle', 'islemag' ),
			'islemag_medium_rectangle'   => esc_html__( 'Medium Rectangle', 'islemag' ),
			'islemag_half_page'          => esc_html__( 'Half-page ad', 'islemag' ),
			'islemag_square_pop_up'      => esc_html__( 'Big Square', 'islemag' ),
			'islemag_vertical_rectangle' => esc_html__( 'Vertical Rectangle', 'islemag' ),
			'islemag_ad_125'             => esc_html__( 'Small Square', 'islemag' ),
		)
	);
}

add_image_size( 'islemag_leaderboard', 728, 90, true );
add_image_size( 'islemag_3_1_rectangle', 300, 100, true );
add_image_size( 'islemag_medium_rectangle', 300, 250, true );
add_image_size( 'islemag_half_page', 300, 600, true );
add_image_size( 'islemag_square_pop_up', 250, 250, true );
add_image_size( 'islemag_vertical_rectangle', 240, 400, true );
add_image_size( 'islemag_ad_125', 125, 125, true );


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
require_once( 'inc/class/islemag-widget-multiple-ads.php' );
require_once( 'inc/class/islemag-widget-big-ad.php' );
require_once( 'inc/class/islemag-widget-content-ad.php' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function islemag_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'islemag' ),
			'id'            => 'islemag-sidebar',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title-border dkgreen title-bg-line"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header advertisment area', 'islemag' ),
			'id'            => 'islemag-header-ad',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);

	register_sidebars(
		5,
		array(
			/* translators: Number of registered advertisment area */
			'name'          => __( 'Advertisments area %d', 'islemag' ),
			'id'            => 'islemag-ads',
			'class'         => 'islemag-ads',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);

	$sidebars = array(
		'a' => 'islemag-first-footer-area',
		'b' => 'islemag-second-footer-area',
		'c' => 'islemag-third-footer-area',
	);
	foreach ( $sidebars as $sidebar ) {

		switch ( $sidebar ) {
			case 'islemag-first-footer-area':
				$name = esc_html__( 'Footer area 1', 'islemag' );
				break;
			case 'islemag-second-footer-area':
				$name = esc_html__( 'Footer area 2', 'islemag' );
				break;
			case 'islemag-third-footer-area':
				$name = esc_html__( 'Footer area 3', 'islemag' );
				break;
			default:
				$name = $sidebar;
		}

		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $sidebar,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}

	register_widget( 'Islemag_Multiple_Ads' );
	register_widget( 'Islemag_Big_Ad' );
	register_widget( 'Islemag_Content_Ad' );
	wp_enqueue_script( 'islemag-widget-js', get_template_directory_uri() . '/js/islemag-wigdet.js', array(), '1.0.0', true );

}
add_action( 'widgets_init', 'islemag_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function islemag_scripts() {

	wp_enqueue_style( 'islemag-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5' );

	wp_enqueue_style( 'islemag-style', get_stylesheet_uri() );

	wp_enqueue_style( 'islemag-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );

	if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
		wp_enqueue_script( 'islemag-script-index', get_template_directory_uri() . '/js/script.index.js', array( 'jquery' ), '1.0.0', true );
	}

	if ( is_single() ) {
		wp_enqueue_script( 'islemag-script-single', get_template_directory_uri() . '/js/script.single.js', array( 'jquery' ), '1.0.0', true );
	}

	wp_enqueue_script( 'islemag-script-all', get_template_directory_uri() . '/js/script.all.js', array( 'jquery' ), '1.0.1', true );
	wp_localize_script(
		'islemag-script-all',
		'screenReaderText',
		array(
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'islemag' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'islemag' ) . '</span>',
		)
	);
	$sticky_menu = get_theme_mod( 'islemag_sticky_menu', false );
	wp_localize_script(
		'islemag-script-all',
		'stickyMenu',
		array(
			'disable_sticky' => $sticky_menu,
		)
	);

	wp_enqueue_script( 'islemag-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'islemag_scripts' );


/**
 * Enqueue scripts and styles.
 */
function islemag_fonts_url() {
	$fonts_url = '';

	/*
	* Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$lato      = _x( 'on', 'Lato font: on or off', 'islemag' );
	$raleway   = _x( 'on', 'Raleway font: on or off', 'islemag' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'islemag' );

	if ( 'off' !== $lato || 'off' !== $raleway || 'off' !== $open_sans ) {
		$font_families = array();
		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,700';
		}
		if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:400,500,600,700';
		}
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,700,600';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url  = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue fonts.
 */
function islemag_scripts_styles() {
	wp_enqueue_style( 'islemag-fonts', islemag_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'islemag_scripts_styles' );

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
 * Enables user customization via WordPress plugin API
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Load customize controls js
 */
function islemag_customizer_script() {

	wp_enqueue_style( 'islemag-fontawesome_admin', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.6.3' );

	wp_enqueue_script( 'islemag_customizer_script', get_template_directory_uri() . '/js/islemag_customizer.js', array( 'jquery', 'jquery-ui-draggable' ), '1.0.1', true );

	wp_enqueue_style( 'islemag_admin_stylesheet', get_template_directory_uri() . '/css/admin-style.css', '1.0.0' );

}
add_action( 'customize_controls_enqueue_scripts', 'islemag_customizer_script' );


/**
 * Related Posts Excerpt
 **/
function islemag_get_excerpt() {
	$excerpt = get_the_content();
	$excerpt = preg_replace( ' (\[.*?\])', '', $excerpt );
	$excerpt = strip_shortcodes( $excerpt );
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, 140 );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
	$excerpt = $excerpt . '...';
	return $excerpt;
}

/**
 * Callback function for form
 **/
function islemag_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag; ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
	<?php endif; ?>

	<?php
	islemag_comment_content( $args, $comment, $depth, $add_below );
	?>

	<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}



add_action( 'wp_ajax_nopriv_request_post', 'islemag_requestpost' );
add_action( 'wp_ajax_request_post', 'islemag_requestpost' );

$islemag_section1_category = '';

/**
 * Ajax function for refresh purposes.
 */
function islemag_requestpost() {
	$colors  = array( 'red', 'orange', 'blue', 'green', 'purple', 'pink', 'light_red' );
	$section = $_POST['section'];

	if ( $section == 'islemag_topslider_category' ) {
		$cat         = $_POST['category'];
		$nb_of_posts = $_POST['nb_of_posts'];

		$wp_query = new WP_Query(
			array(
				'posts_per_page' => $nb_of_posts,
				'order'          => 'DESC',
				'post_status'    => 'publish',
				'category_name'  => ( ! empty( $cat ) && $cat != 'all' ? $cat : '' ),
			)
		);

		if ( $wp_query->have_posts() ) :
			?>
			<div class="islemag-top-container">
				<div class="owl-carousel islemag-top-carousel rect-dots">
					<?php
					while ( $wp_query->have_posts() ) :
						$wp_query->the_post();
						get_template_part( 'template-parts/slider-posts', get_post_format() );
					endwhile;
					?>
				</div><!-- End .islemag-top-carousel -->
			</div><!-- End .islemag-top-container -->
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		wp_reset_postdata();
	}

	if ( $section == 'islemag_section1_category' ) {
		$islemag_section_category  = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template1.php' ) );
	}

	if ( $section == 'islemag_section2_category' ) {
		$islemag_section_category  = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template2.php' ) );
	}

	if ( $section == 'islemag_section3_category' ) {
		$islemag_section_category  = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template1.php' ) );
	}

	if ( $section == 'islemag_section4_category' ) {
		$islemag_section_category  = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		$postperpage               = $_POST['posts_per_page'];
		include( locate_template( 'template-parts/content-template3.php' ) );
	}

	if ( $section == 'islemag_section5_category' ) {
		$islemag_section_category  = $_POST['category'];
		$islemag_section_max_posts = $_POST['nb_of_posts'];
		include( locate_template( 'template-parts/content-template4.php' ) );
	}

	die();
}

add_action( 'wp_head', 'islemag_style', 100 );

/**
 * Custom colors and styles function.
 */
function islemag_style() {

	echo '<style type="text/css">';

	$islemag_title_color = esc_attr( get_theme_mod( 'islemag_title_color', apply_filters( 'islemag_title_color_default_filter', '#454545' ) ) );
	if ( ! empty( $islemag_title_color ) ) {
		echo '.title-border span { color: ' . $islemag_title_color . ' }';
		echo '.post .entry-title, .post h1, .post h2, .post h3, .post h4, .post h5, .post h6, .post h1 a, .post h2 a, .post h3 a, .post h4 a, .post h5 a, .post h6 a { color: ' . $islemag_title_color . ' }';
		echo '.page-header h1 { color: ' . $islemag_title_color . ' }';
	}

	$islemag_sidebar_textcolor = esc_attr( get_theme_mod( 'header_textcolor', apply_filters( 'islemag_header_textcolor_default_filter', '#454545' ) ) );
	if ( ! empty( $islemag_sidebar_textcolor ) ) {
		echo '.sidebar .widget li a, .islemag-content-right, .islemag-content-right a, .post .entry-content, .post .entry-content p,
		 .post .entry-cats, .post .entry-cats a, .post .entry-comments', '.post .entry-separator, .post .entry-footer a,
		 .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content { color: #' . $islemag_sidebar_textcolor . '}';
	}

	$islemag_top_slider_post_title_color = esc_attr( get_theme_mod( 'islemag_top_slider_post_title_color', '#ffffff' ) );
	if ( ! empty( $islemag_top_slider_post_title_color ) ) {
		echo '.islemag-top-container .entry-block .entry-overlay-meta .entry-title a { color: ' . $islemag_top_slider_post_title_color . ' }';
	}

	$islemag_top_slider_post_text_color = esc_attr( get_theme_mod( 'islemag_top_slider_post_text_color', '#ffffff' ) );
	if ( ! empty( $islemag_top_slider_post_text_color ) ) {
		echo '.islemag-top-container .entry-overlay-meta .entry-overlay-date { color: ' . $islemag_top_slider_post_text_color . ' }';
		echo '.islemag-top-container .entry-overlay-meta .entry-separator { color: ' . $islemag_top_slider_post_text_color . ' }';
		echo '.islemag-top-container .entry-overlay-meta > a { color: ' . $islemag_top_slider_post_text_color . ' }';
	}

	$islemag_sections_post_title_color = esc_attr( get_theme_mod( 'islemag_sections_post_title_color', apply_filters( 'islemag_sections_post_title_color_default_filter', '#454545' ) ) );
	if ( ! empty( $islemag_sections_post_title_color ) ) {
		echo '.home.blog .islemag-content-left .entry-title a, .blog-related-carousel .entry-title a { color: ' . $islemag_sections_post_title_color . ' }';
	}

	$islemag_sections_post_text_color = esc_attr( get_theme_mod( 'islemag_sections_post_text_color', apply_filters( 'islemag_sections_post_text_color_default_filter', '#454545' ) ) );
	if ( ! empty( $islemag_sections_post_text_color ) ) {
		echo '.islemag-content-left .entry-meta, .islemag-content-left .blog-related-carousel .entry-content p,
		.islemag-content-left .blog-related-carousel .entry-cats .entry-label, .islemag-content-left .blog-related-carousel .entry-cats a,
		.islemag-content-left .blog-related-carousel > a, .islemag-content-left .blog-related-carousel .entry-footer > a { color: ' . $islemag_sections_post_text_color . ' }';
		echo '.islemag-content-left .entry-meta .entry-separator { color: ' . $islemag_sections_post_text_color . ' }';
		echo '.islemag-content-left .entry-meta a { color: ' . $islemag_sections_post_text_color . ' }';
		echo '.islemag-content-left .islemag-template3 .col-sm-6 .entry-overlay p { color: ' . $islemag_sections_post_text_color . ' }';
	}

	echo '</style>';
}

add_filter( 'comment_form_fields', 'islemag_move_comment_field_to_bottom' );

/**
 * Move comment field to bottom.
 *
 * @param array $fields Fields of comment form.
 *
 * @return mixed
 */
function islemag_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_action( 'admin_head', 'islemag_widget_style' );

/**
 * Widget style
 */
function islemag_widget_style() {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! empty( $screen ) && $screen->base === 'widgets' ) {
		echo '
		<style type="text/css">
		.islemag-ad-widget-top{
			background: #fafafa;
			color: #23282d;
			-webkit-transition: opacity .5s;
			transition: opacity .5s;
			padding: 0;
			line-height: 1.4em;
			font-size: 13px;
			font-weight: 600;
			border: 1px solid #e5e5e5;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);
			box-shadow: 0 1px 1px rgba(0,0,0,.04);
		}

		.islemag-ad-widget-inside{
			display: none;
		}

		.islemag-ad-widget-title{
			font-size: 1em;
			margin: 0;
			padding: 0 15px;
			font-size: 1em;
			line-height: 1;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
			user-select: none;
		}

		.islemag-ad-widget-inside {
				padding: 1px 10px 10px;
				line-height: 16px;
				background: #fff;
				border: 1px solid #e5e5e5;
				border-top: none;
		}

		</style>';
	}// End if().
}

/**
 * Function to display a section.
 *
 * @param int  $section_nb Section number.
 * @param bool $is_hidden Flag check if hidden.
 */
function islemag_display_section( $section_nb, $is_hidden = false ) {
	$colors             = array( 'red', 'orange', 'blue', 'green', 'purple', 'pink', 'light_red' );
	$template           = 1;
	$islemag_aria_label = '';
	switch ( $section_nb ) {
		case 1:
			$template              = $section_nb;
			$islemag_section_title = get_theme_mod( 'islemag_section1_title', esc_html__( 'Section 1', 'islemag' ) );
			$islemag_aria_label    = esc_html__( 'Ads Area 1', 'islemag' );
			break;
		case 2:
			$template              = $section_nb;
			$islemag_section_title = get_theme_mod( 'islemag_section2_title', esc_html__( 'Section 2', 'islemag' ) );
			$islemag_aria_label    = esc_html__( 'Ads Area 2', 'islemag' );
			break;
		case 3:
			$template              = 1;
			$islemag_section_title = get_theme_mod( 'islemag_section3_title', esc_html__( 'Section 3', 'islemag' ) );
			$islemag_aria_label    = esc_html__( 'Ads Area 3', 'islemag' );
			break;
		case 4:
			$postperpage           = get_theme_mod( 'islemag_section4_posts_per_page', 6 );
			$template              = 3;
			$islemag_section_title = get_theme_mod( 'islemag_section4_title', esc_html__( 'Section 4', 'islemag' ) );
			$islemag_aria_label    = esc_html__( 'Ads Area 4', 'islemag' );
			break;
		case 5:
			$template              = 4;
			$islemag_section_title = get_theme_mod( 'islemag_section5_title', esc_html__( 'Section 5', 'islemag' ) );
			$islemag_aria_label    = esc_html__( 'Ads Area 5', 'islemag' );
			break;
	}
	/*Do not delete these variables. Those are used in template files*/
	$islemag_has_sidebar       = ( $section_nb === 1 ? is_active_sidebar( 'islemag-ads' ) : is_active_sidebar( 'islemag-ads-' . $section_nb ) );
	$islemag_section           = get_theme_mod( 'islemag_section' . $section_nb . '_fullwidth', false );
	$islemag_section_category  = esc_attr( get_theme_mod( 'islemag_section' . $section_nb . '_category', 'all' ) );
	$islemag_section_max_posts = absint( get_theme_mod( 'islemag_section' . $section_nb . '_max_posts', 6 ) );
	?>
	<div class="islemag-section
	<?php
	echo $section_nb;
	if ( $is_hidden === true ) {
		echo ' islemag_only_customizer ';}
	?>
	">
		<?php
		if ( $islemag_has_sidebar ) {
			?>
			<div itemscope itemtype="http://schema.org/WPAdBlock" id="sidebar-ads-area-<?php echo $section_nb; ?>" aria-label="<?php echo $islemag_aria_label; ?>">
				<?php ( $section_nb === 1 ? dynamic_sidebar( 'islemag-ads' ) : dynamic_sidebar( 'islemag-ads-' . $section_nb ) ); ?>
			</div>
			<?php
		}
		$choose_color = array_rand( $colors, 1 );
		if ( ! empty( $islemag_section_title ) ) {
			?>
			<h2 class="title-border title-bg-line <?php echo apply_filters( 'islemag_line_color', $colors[ $choose_color ] ); ?> mb30">
				<span><?php echo esc_attr( $islemag_section_title ); ?></span>
			</h2>
			<?php
		} else {
			if ( is_customize_preview() ) {
				?>
				<h2 class="title-border title-bg-line islemag_only_customizer <?php echo $colors[ $choose_color ]; ?> mb30"><span></span></h2>
				<?php
			}
		}

		include( locate_template( 'template-parts/content-template' . $template . '.php' ) );
		?>
	</div>
	<?php
}

/**
 * Filter the front page template so it's bypassed entirely if the user selects
 * to display blog posts on their homepage instead of a static page.
 */
function islemag_filter_front_page_template( $template ) {
	$islemag_keep_old_fp_template = get_theme_mod( 'islemag_keep_old_fp_template' );
	if ( ! $islemag_keep_old_fp_template ) {
		return is_home() ? '' : $template;
	} else {
		return '';
	}
}
add_filter( 'frontpage_template', 'islemag_filter_front_page_template' );

/**
 * This is because wp_kses strips style tag if it has display element.
 * Check https://wordpress.stackexchange.com/questions/173526/why-is-wp-kses-not-keeping-style-attributes-as-expected
 */
function islemag_safe_style( $styles ) {
	$styles[] = 'display';
	return $styles;
}
add_filter( 'safe_style_css', 'islemag_safe_style' );

/**
 * Add a dismissible notice about Neve in the dashboard
 */
function islemag_neve_notice() {
	global $current_user;
	$user_id        = $current_user->ID;
	$ignored_notice = get_user_meta( $user_id, 'islemag_ignore_neve_notice' );
	if ( ! empty( $ignored_notice ) ) {
		return;
	}
	$dismiss_button =
		sprintf(
			/* translators: Install Neve link */
			'<a href="%s" class="notice-dismiss" style="text-decoration:none;"></a>',
			'?islemag_nag_ignore_neve=0'
		);
	$message = sprintf(
		/* translators: Install Neve link */
		esc_html__( 'Check out %1$s. Fully AMP optimized and responsive, Neve will load in mere seconds and adapt perfectly on any viewing device. Neve works perfectly with Gutenberg and the most popular page builders. You will love it!', 'islemag' ),
		sprintf(
			/* translators: Install Neve link */
			'<a target="_blank" href="%1$s"><strong>%2$s</strong></a>',
			esc_url( admin_url( 'theme-install.php?theme=neve' ) ),
			esc_html__( 'our newest theme', 'islemag' )
		)
	);
	printf( '<div class="notice updated" style="position:relative; padding-right: 30px;">%1$s<p>%2$s</p></div>', $dismiss_button, $message );
}
add_action( 'admin_notices', 'islemag_neve_notice' );
/**
 * Update the islemag_ignore_neve_notice option to true, to dismiss the notice from the dashboard
 */
function islemag_nag_ignore_neve() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['islemag_nag_ignore_neve'] ) && '0' == $_GET['islemag_nag_ignore_neve'] ) {
		add_user_meta( $user_id, 'islemag_ignore_neve_notice', 'true', true );
	}
}
add_action( 'admin_init', 'islemag_nag_ignore_neve' );
