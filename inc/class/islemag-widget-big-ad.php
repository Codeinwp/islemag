<?php
/**
 * Islemag_Big_Ad class file
 *
 * @package WordPress
 * @subpackage Islemag
 */

/**
 * Class Islemag_Big_Ad
 *
 * @package WordPress
 * @subpackage Islemag
 */
class Islemag_Big_Ad extends WP_Widget {

	/**
	 * Constructor
	 **/
	public function __construct() {
		$widget_ops = array(
			'classname' => 'islemag_single_ad',
		);
		parent::__construct( 'islemag_single_ad-widget', 'Islemag - Sidebar single advertisement', $widget_ops );
		add_action( 'admin_enqueue_scripts', array( $this, 'upload_scripts' ) );
	}

	/**
	 * Upload the Javascripts for the media uploader
	 */
	public function upload_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'upload_media_widget', get_template_directory_uri() . '/js/islemag-upload-media.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['widget_title'] ) ) {
			$title = $instance['widget_title'];
		}
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		$title_alt = 'title_ad';
		$link      = 'link_ad';
		$url       = 'image_uri_ad';

		echo '<div class="islemag-ad-banner-content">';
		if ( ! empty( $instance['ad_type'] ) && $instance['ad_type'] === 'image' ) {
			if ( ! empty( $instance[ $url ] ) ) {
				if ( ! empty( $instance[ $link ] ) ) {
					echo '<a href="' . esc_url( $instance[ $link ] ) . '" target="' . ( ! empty( $instance['new_tab'] ) && $instance['new_tab'] === 'on' ? '_blank' : '' ) . '"><img src="' . esc_url( $instance[ $url ] ) . '" alt="' . ( ! empty( $instance[ $title_alt ] ) ? esc_attr( $instance[ $title_alt ] ) : '' ) . '"/></a>';
				} else {
					echo '<img src="' . esc_url( $instance[ $url ] ) . '" alt="' . ( ! empty( $instance[ $title_alt ] ) ? esc_attr( $instance[ $title_alt ] ) : '' ) . '"/>';
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
		$instance                 = $old_instance;
		$instance['new_tab']      = strip_tags( $new_instance['new_tab'] );
		$instance['ad_type']      = strip_tags( $new_instance['ad_type'] );
		$instance['widget_title'] = sanitize_text_field( $new_instance['widget_title'] );
		$instance['title_ad']     = sanitize_text_field( $new_instance['title_ad'] );
		$instance['link_ad']      = esc_url_raw( $new_instance['link_ad'] );
		$instance['image_uri_ad'] = esc_url_raw( $new_instance['image_uri_ad'] );

		$allowed_html = array(
			'a'      => array(
				'href'   => array(),
				'class'  => array(),
				'id'     => array(),
				'target' => array(),
			),
			'img'    => array(
				'src'    => array(),
				'alt'    => array(),
				'title'  => array(),
				'width'  => array(),
				'height' => array(),
			),
			'iframe' => array(
				'src'               => array(),
				'width'             => array(),
				'height'            => array(),
				'seamless'          => array(),
				'scrolling'         => array(),
				'frameborder'       => array(),
				'allowtransparency' => array(),
			),
			'script' => array(
				'type'    => array(),
				'src'     => array(),
				'charset' => array(),
				'async'   => array(),
			),
			'div'    => array(
				'id' => array(),
			),
			'ins'    => array(
				'class'          => array(),
				'style'          => array(),
				'data-ad-client' => array(),
				'data-ad-slot'   => array(),
				'data-ad-format' => array(),
			),
		);

		$string         = force_balance_tags( $new_instance['banner_code'] );
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

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>"><?php _e( 'Title', 'islemag' ); ?></label><br/>
		<?php
		echo '<input type="text" name="' . esc_attr( $this->get_field_name( 'widget_title' ) ) . '" id="' . esc_attr( $this->get_field_id( 'widget_title' ) ) . '" value="';
		if ( ! empty( $instance['widget_title'] ) ) {
			echo esc_attr( $instance['widget_title'] );
		}
		echo '" class="widefat" />';
		?>
		</p>

		<?php
		$title_alt = 'title_ad';
		$link      = 'link_ad';
		$url       = 'image_uri_ad';
		$code      = 'banner_code';
		?>
		<h3><?php esc_html_e( 'Advertisement ', 'islemag' ); ?></h3>
		<p class="description">
		<?php
			echo sprintf(
				'%s<br/>%s, %s, %s, %s',
				esc_html__( 'Recommended sizes:', 'islemag' ),
				esc_html__( '300 x 250 px', 'islemag' ),
				esc_html__( '300 x 100 px', 'islemag' ),
				esc_html__( '300 x 600 px', 'islemag' ),
				esc_html__( '250 x 250 px', 'islemag' )
			);
		?>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $title_alt ) ); ?>"><?php _e( 'Alt Title', 'islemag' ); ?></label><br/>
			<?php
			echo '<input type="text" name="' . esc_attr( $this->get_field_name( $title_alt ) ) . '" id="' . esc_attr( $this->get_field_id( $title_alt ) ) . '" value="';
			if ( ! empty( $instance[ $title_alt ] ) ) {
				echo esc_attr( $instance[ $title_alt ] );
			}
			echo '" class="widefat" />';
			?>
		</p>

		<p>
			<?php
			echo '<input type="radio" name="' . esc_attr( $this->get_field_name( 'ad_type' ) ) . '" value="image" class="islemag-big-ad-type"';
			if ( ! empty( $instance['ad_type'] ) ) {
				checked( $instance['ad_type'], 'image' );
			}
			echo '/>' . esc_html__( 'Image', 'islemag' );

			echo '<input type="radio" name="' . esc_attr( $this->get_field_name( 'ad_type' ) ) . '" value="code" class="islemag-big-ad-type"';
			if ( ! empty( $instance['ad_type'] ) ) {
				checked( $instance['ad_type'], 'code' );
			}
			echo '/>' . esc_html__( 'Code', 'islemag' );
			?>
		</p>

		<p class="islemag-big-ad-image" style="
		<?php
		if ( $instance['ad_type'] == 'code' ) {
			echo 'display:none'; }
		?>
		">
		<input type="hidden" name="<?php echo esc_attr( $this->get_field_name( 'new_tab' ) ); ?>" value="0" />
			<?php
			echo '<input type="checkbox"';
			if ( ! empty( $instance['new_tab'] ) ) {
				checked( $instance['new_tab'], 'on' );
			}
			echo 'id="' . esc_attr( $this->get_field_id( 'new_tab' ) ) . '" name="' . esc_attr( $this->get_field_name( 'new_tab' ) ) . '" />';

			echo '<label for="' . esc_attr( $this->get_field_id( 'new_tab' ) ) . '">' . __( 'Open in new tab', 'islemag' ) . '</label> <br/>';

			echo '<label for="' . esc_attr( $this->get_field_id( $link ) ) . '">' . __( 'Link', 'islemag' ) . '</label><br/>';
			echo '<input type="text" name="' . esc_attr( $this->get_field_name( $link ) ) . '" id="' . esc_attr( $this->get_field_id( $link ) ) . '" value="';
			if ( ! empty( $instance[ $link ] ) ) {
				echo esc_attr( $instance[ $link ] );
			}
			echo '" class="widefat" />';

			echo '<label for="' . esc_attr( $this->get_field_name( $url ) ) . '">' . __( 'Image:', 'islemag' ) . '</label>';
			echo '<input name="' . esc_attr( $this->get_field_name( $url ) ) . '" id="' . esc_attr( $this->get_field_id( $url ) ) . '" class="widefat custom_media_url" type="text" size="36"  value="';
			if ( ! empty( $instance[ $url ] ) ) {
				echo esc_url( $instance[ $url ] );
			}
			echo '" />';
			?>
		<input class="upload_image_button" type="button" value="Upload Image" id="" />
		</p>

		<p class="islemag-big-ad-code" style="
		<?php
		if ( $instance['ad_type'] == 'image' ) {
			echo 'display:none'; }
		?>
				">
			<label for="<?php echo esc_attr( $this->get_field_name( $code ) ); ?>"><?php _e( 'Code:', 'islemag' ); ?></label><br/>
			<?php
			echo '<textarea name="' . esc_attr( $this->get_field_name( $code ) ) . '" placeholder="' . esc_html__( 'Text', 'islemag' ) . '">';
			if ( ! empty( $instance[ $code ] ) ) {
				echo $instance[ $code ];
			}
			echo '</textarea>';
			?>
		</p>
		<?php
	}
}
