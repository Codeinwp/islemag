<?php
/**
 * Islemag_Content_Ad class file
 *
 * @package WordPress
 * @subpackage Islemag
 */

/**
 * Class Islemag_Content_Ad
 */
class Islemag_Content_Ad extends WP_Widget {

	 /**
	  * Constructor
	  **/
	public function __construct() {
		$widget_ops = array(
			'classname' => 'islemag_content_ad',
		);
		parent::__construct( 'islemag_content_ad-widget', 'Islemag - Content advertisment widget', $widget_ops );
		add_action( 'admin_enqueue_scripts', array( $this, 'upload_scripts' ) );
	}

	/**
	 * Upload the Javascripts for the media uploader
	 */
	public function upload_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/js/islemag-upload-media.js', array( 'jquery' ),'1.0.0', true );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		$link = 'link_ad';
		$url = 'image_uri_ad';

		echo '<div class="islemag-ad-banner-content">';
		if ( ! empty( $instance['ad_type'] ) && $instance['ad_type'] === 'image' ) {
			if ( ! empty( $instance[ $url ] ) ) {
				if ( ! empty( $instance[ $link ] ) ) {
					echo '<a href="' . esc_url( $instance[ $link ] ) . '" target="' . ( ! empty( $instance['new_tab'] ) && $instance['new_tab'] === 'on' ? '_blank' : '' ) . '"><img src="' . esc_url( $instance[ $url ] ) . '" /></a>';
				} else {
					echo '<img src="' . esc_url( $instance[ $url ] ) . '" />';
				}
			}
		} else {
			if ( ! empty( $instance['banner_code'] ) ) {
				echo $instance['banner_code'];
			}
		}
		echo '</div>';

		echo $args['after_widget'];

	}


	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['new_tab'] = strip_tags( $new_instance['new_tab'] );
		$instance['ad_type'] = strip_tags( $new_instance['ad_type'] );
		$instance['link_ad'] = esc_url_raw( $new_instance['link_ad'] );
		$instance['image_uri_ad'] = esc_url_raw( $new_instance['image_uri_ad'] );

		$allowed_html = array(
				'a' => array(
					'href' => array(),
					'class' => array(),
					'id' => array(),
					'target' => array(),
				),
				'img' => array(
					'src' => array(),
					'alt' => array(),
					'title' => array(),
					'width' => array(),
					'height' => array(),
				),
				'iframe' => array(
					'src' => array(),
					'width' => array(),
					'height' => array(),
					'seamless' => array(),
					'scrolling' => array(),
					'frameborder' => array(),
					'allowtransparency' => array(),
				),
				'script' => array(
					'type' => array(),
					'src' => array(),
					'charset' => array(),
					'async' => array(),
				),
				'div' => array(
					'id' => array(),
				),
				'ins' => array(
					'class' => array(),
					'style' => array(),
					'data-ad-client' => array(),
					'data-ad-slot' => array(),
					'data-ad-format' => array(),
				),
			);

		$string = force_balance_tags( $new_instance['banner_code'] );
		$input_santized = wp_kses( $string, $allowed_html );

		$instance['banner_code'] = $input_santized;
		return $instance;
	}


	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		if ( ! isset( $instance['ad_type'] ) ) {
			$instance['ad_type'] = 'image';
		}
		?>

		<?php
		$link = 'link_ad';
		$url = 'image_uri_ad';
		$code = 'banner_code';
		?>
	  <h3><?php esc_html_e( 'Advertisement ', 'islemag' );?></h3>
	  <p class="description">
		<?php
		  echo sprintf('%s<br/>%s, %s, %s, %s',
			  esc_html__( 'Recommended sizes:', 'islemag' ),
			  esc_html__( '728 x 90 px', 'islemag' ),
			  esc_html__( '300 x 100 px', 'islemag' ),
			  esc_html__( '468 x 60 px', 'islemag' ),
			  esc_html__( '234 x 60 px', 'islemag' )
		  );
		?>
	  </p>

	  <p>
		<input type="radio" name="<?php echo esc_attr( $this->get_field_name( 'ad_type' ) ); ?>" value="image" class="islemag-big-ad-type" <?php if ( ! empty( $instance['ad_type'] ) ) :  checked( $instance['ad_type'], 'image' );
endif; ?>/> <?php esc_html_e( 'Image', 'islemag' ); ?>
		<input type="radio" name="<?php echo esc_attr( $this->get_field_name( 'ad_type' ) ); ?>" value="code" class="islemag-big-ad-type" <?php if ( ! empty( $instance['ad_type'] ) ) :  checked( $instance['ad_type'], 'code' );
endif; ?>/> <?php esc_html_e( 'Code', 'islemag' ); ?>
	  </p>

		<p class="islemag-big-ad-image" style="<?php if ( $instance['ad_type'] == 'code' ) { echo 'display:none'; } ?>">
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'new_tab' ) ); ?>" value="0" />
		<input type="checkbox" <?php if ( ! empty( $instance['new_tab'] ) ) :  checked( $instance['new_tab'], 'on' );
endif; ?> id="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'new_tab' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>"><?php _e( 'Open in new tab', 'islemag' ); ?></label> <br/>

		<label for="<?php echo esc_attr( $this->get_field_id( $link ) ); ?>"><?php _e( 'Link', 'islemag' ); ?></label><br/>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( $link ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $link ) ); ?>" value="<?php if ( ! empty( $instance[ $link ] ) ) :  echo esc_attr( $instance[ $link ] );
endif; ?>" class="widefat" />

		<label for="<?php echo esc_attr( $this->get_field_name( $url ) ); ?>"><?php _e( 'Image:','islemag' ); ?></label>
		<input name="<?php echo esc_attr( $this->get_field_name( $url ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $url ) ); ?>" class="widefat custom_media_url" type="text" size="36"  value="<?php if ( ! empty( $instance[ $url ] ) ) :  echo esc_url( $instance[ $url ] );
endif; ?>" />
		<input class="upload_image_button" type="button" value="Upload Image" id="" />
	  </p>

	  <p class="islemag-big-ad-code" style="<?php if ( $instance['ad_type'] == 'image' ) { echo 'display:none'; } ?>">
		<label for="<?php echo esc_attr( $this->get_field_name( $code ) ); ?>"><?php _e( 'Code:','islemag' ); ?></label><br/>
		<textarea name="<?php echo esc_attr( $this->get_field_name( $code ) ); ?>" placeholder="<?php esc_html_e( 'Text', 'islemag' ); ?>"><?php if ( ! empty( $instance[ $code ] ) ) :  echo $instance[ $code ];
endif; ?></textarea>
	  </p>
<?php
	}
}
