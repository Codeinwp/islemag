<?php
/**
 * Islemag_Multiple_Ads class file
 *
 * @package WordPress
 * @subpackage Islemag
 */

/**
 * Class Islemag_Multiple_Ads
 */
class Islemag_Multiple_Ads extends WP_Widget {

	/**
	 * Constructor
	 **/
	public function __construct() {
		$widget_ops = array(
			'classname' => 'islemag_multiple_ads',
		);
		parent::__construct( 'islemag_multiple_ads-widget', 'Islemag - Sidebar multiple advertisements', $widget_ops );
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
		if ( empty( $instance ) ) {
			return;
		}
		echo $args['before_widget'];
		$title = $instance['widget_title'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		for ( $i = 1; $i < 7; $i++ ) {
			$title_alt = 'title_ad' . $i;
			$link      = 'link_ad' . $i;
			$url       = 'image_uri_ad' . $i;
			$type      = 'banner_type' . $i;
			$code      = 'banner_code' . $i;

			if ( ! empty( $instance[ $type ] ) && $instance[ $type ] === 'image' ) {
				if ( ! empty( $instance[ $url ] ) ) {
					if ( ! empty( $instance[ $link ] ) ) {
						echo '<div class="islemag-small-banner"> <a href="' . esc_url( $instance[ $link ] ) . '" target="_blank" ><img src="' . esc_url( $instance[ $url ] ) . '" alt="' . ( ! empty( $instance[ $title_alt ] ) ? esc_attr( $instance[ $title_alt ] ) : '' ) . '"/></a></div>';
					} else {
						echo '<div class="islemag-small-banner"> <img src="' . esc_url( $instance[ $url ] ) . '" alt="' . ( ! empty( $instance[ $title_alt ] ) ? esc_attr( $instance[ $title_alt ] ) : '' ) . '"/></div>';
					}
				}
			} else {
				if ( ! empty( $instance[ $code ] ) ) {
					echo '<div class="islemag-small-banner">' . $instance[ $code ] . '</div>';
				}
			}
		}
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
		$instance['widget_title'] = sanitize_text_field( $new_instance['widget_title'] );
		$allowed_html             = array(
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

		for ( $i = 1; $i <= 6; $i++ ) {
			$instance[ 'title_ad' . $i ]     = sanitize_text_field( $new_instance[ 'title_ad' . $i ] );
			$instance[ 'link_ad' . $i ]      = esc_url_raw( $new_instance[ 'link_ad' . $i ] );
			$instance[ 'image_uri_ad' . $i ] = esc_url_raw( $new_instance[ 'image_uri_ad' . $i ] );
			$instance[ 'banner_type' . $i ]  = strip_tags( $new_instance[ 'banner_type' . $i ] );
			$string                          = force_balance_tags( $new_instance[ 'banner_code' . $i ] );
			$input_santized                  = wp_kses( $string, $allowed_html );
			$instance[ 'banner_code' . $i ]  = $input_santized;
		}

		return $instance;
	}


	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
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
	<p class="description"><?php esc_html_e( 'Recommended size: 125 x 125 px', 'islemag' ); ?></p>


		<?php
		for ( $i = 1; $i < 7; $i++ ) {
			$title_alt = 'title_ad' . $i;
			$link      = 'link_ad' . $i;
			$url       = 'image_uri_ad' . $i;
			$type      = 'banner_type' . $i;
			$code      = 'banner_code' . $i;

			if ( empty( $instance[ $type ] ) ) {
				$instance[ $type ] = 'image';
			}
			?>
	<div class="islemag-ad-widget">
		<div class="islemag-ad-widget-top">
			<div class="islemag-ad-widget-title">
				<h3>
					<?php
					esc_html_e( 'Advertisement ', 'islemag' );
					echo $i;
					?>
				</h3>
			</div>
		</div>
	<div class="islemag-ad-widget-inside">
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $title_alt ) ); ?>"><?php _e( 'Alt Title', 'islemag' ); ?></label><br />
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
				echo '<input type="radio" name="' . esc_attr( $this->get_field_name( $type ) ) . '" value="image" class="islemag-small-ad-type"';
				if ( ! empty( $instance[ $type ] ) ) {
					checked( $instance[ $type ], 'image' );
				}
				echo '/>' . esc_html_e( 'Image', 'islemag' );

				echo '<input type="radio" name="' . esc_attr( $this->get_field_name( $type ) ) . '" value="code" class="islemag-small-ad-type"';
				if ( ! empty( $instance[ $type ] ) ) {
					checked( $instance[ $type ], 'code' );
				}
				echo '/>' . esc_html__( 'Code', 'islemag' );
				?>
		</p>

			<?php
			echo '<p class="islemag-small-ad-image" style="';
			if ( $instance[ $type ] == 'code' ) {
				echo 'display:none';
			}
			echo '">';

			echo '<label for="' . esc_attr( $this->get_field_id( $link ) ) . '">' . __( 'Link', 'islemag' ) . '</label><br />';

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
			echo '<input class="upload_image_button" type="button" value="Upload Image" id="" />';

			echo '</p>';

			echo '<p class="islemag-small-ad-code" style="';
			if ( $instance[ $type ] == 'image' ) {
				echo 'display:none';
			}
			echo '">';
			?>
		<label for="<?php echo esc_attr( $this->get_field_name( $code ) ); ?>"><?php _e( 'Code:', 'islemag' ); ?></label><br/>

			<?php
			echo '<textarea name="' . esc_attr( $this->get_field_name( $code ) ) . '" placeholder="' . esc_html__( 'Text', 'islemag' ) . '">';
			if ( ! empty( $instance[ $code ] ) ) {
				echo $instance[ $code ];
			}
			echo '</textarea>';
			?>
		</p>
	</div>
	</div>
			<?php
		}// End for().

	}

}
