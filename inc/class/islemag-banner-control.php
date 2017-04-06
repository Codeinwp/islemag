<?php
/**
 * Islemag_Banner_Control class file.
 *
 * @package WordPress
 * @subpackage Islemag
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class Islemag_Banner_Control
 */
class Islemag_Banner_Control extends WP_Customize_Control {

	/**
	 * Islemag_Banner_Control constructor.
	 *
	 * @param WP_Customize_Manager $manager WordPress manager.
	 * @param string               $id Control id.
	 * @param array                $args Control arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {

		$values = $this->value();
		$json = json_decode( $values, true );
		if ( ! is_array( $json ) ) {
			$json = array( $values );
		}

		if ( ! empty( $json ) ) { ?>
			  <div class="islemag-banner-settings-container">

				  <span class="customize-control-title"> <?php esc_html_e( 'Banner type', 'islemag' ); ?> </span>
				  <input type="radio" class="islemag-banner-select" name="banner_type" value="image" <?php checked( $json['choice'], 'image', true ); ?>> <?php esc_html_e( 'Image', 'islemag' ); ?>
				  <input type="radio" class="islemag-banner-select" name="banner_type" value="code" <?php checked( $json['choice'], 'code', true ); ?>> <?php esc_html_e( 'Code', 'islemag' ); ?>

				  <span class="customize-control-title"> <?php esc_html_e( 'Banner position', 'islemag' ); ?> </span>
				  <input type="radio" class="islemag-banner-position" name="banner_position" value="left" <?php checked( $json['position'], 'left', true ); ?>> <?php esc_html_e( 'Left', 'islemag' ); ?>
				  <input type="radio" class="islemag-banner-position" name="banner_position" value="center" <?php checked( $json['position'], 'center', true ); ?>> <?php esc_html_e( 'Center', 'islemag' ); ?>
				  <input type="radio" class="islemag-banner-position" name="banner_position" value="right" <?php checked( $json['position'], 'right', true ); ?>> <?php esc_html_e( 'Right', 'islemag' ); ?>

				  <div class="islemag-banner-choice-code"  <?php if ( ! empty( $json['choice'] ) && $json['choice'] != 'code' ) {  echo 'style="display:none"'; } ?>>
					<span class="customize-control-title"> <?php esc_html_e( 'Banner Code', 'islemag' ); ?> </span>
					<span class="description customize-control-description"><?php esc_html_e( 'Recommended size: 728px x 90px', 'islemag' ); ?></span>
					<textarea placeholder="<?php esc_html_e( 'Text', 'islemag' ); ?>" class="islemag-banner-settings-text-control" ><?php if ( $json['choice'] == 'code' && ! empty( $json['code'] ) ) { echo $json['code'];} ?></textarea>
				  </div>

				  <div class="islemag-banner-choice-image"  <?php if ( ! empty( $json['choice'] ) && $json['choice'] != 'image' ) {  echo 'style="display:none"'; } ?>>
					<span class="customize-control-title"> <?php esc_html_e( 'Image', 'islemag' ); ?> </span>
					<span class="description customize-control-description"><?php esc_html_e( 'Recommended size: 728px x 90px', 'islemag' ); ?></span>
					<input type="text" class="widefat custom_media_url" value="<?php if ( ! empty( $json['image_url'] ) ) { echo esc_attr( $json['image_url'] ); } ?>">
					<input type="button" class="button button-primary custom-media-button-islemag" value="<?php esc_html_e( 'Upload Image', 'islemag' ); ?>" />

					<span class="customize-control-title"> <?php esc_html_e( 'Link', 'islemag' ); ?> </span>
					<input type="text" value="<?php if ( ! empty( $json['banner_link'] ) ) { echo esc_attr( $json['banner_link'] );} ?>" class="islemag-banner-link" placeholder="<?php esc_html_e( 'Link', 'islemag' ); ?> "/>
				  </div>

				  <input type="hidden" id="islemag-banner-colector" <?php $this->link(); ?> class="islemag-banner-colector" value="<?php echo esc_textarea( $this->value() ); ?>" />
			  </div>
		<?php
		} else { ?>
				<div class="islemag-banner-settings-container">

				<span class="customize-control-title"> <?php esc_html_e( 'Banner type', 'islemag' ); ?> </span>
				<input type="radio" name="banner_type" value="image" checked> <?php esc_html_e( 'Image', 'islemag' ); ?>
				<input type="radio" name="banner_type" value="code"> <?php esc_html_e( 'Code', 'islemag' ); ?>

				<span class="customize-control-title"> <?php esc_html_e( 'Banner position', 'islemag' ); ?> </span>
				<input type="radio" class="islemag-banner-position" name="banner_type" value="left"> <?php esc_html_e( 'Left', 'islemag' ); ?>
				<input type="radio" class="islemag-banner-position" name="banner_type" value="center" checked> <?php esc_html_e( 'Center', 'islemag' ); ?>
				<input type="radio" class="islemag-banner-position" name="banner_type" value="right"> <?php esc_html_e( 'Right', 'islemag' ); ?>

				<div class="islemag-banner-choice-code"  style="display:none">
				  <span class="customize-control-title"> <?php esc_html_e( 'Banner Code', 'islemag' ); ?> </span>
				  <span class="description customize-control-description"><?php esc_html_e( 'Recomanded size: 728px x 90px', 'islemag' ); ?></span>
				  <textarea placeholder="<?php esc_html_e( 'Text', 'islemag' ); ?>" class="islemag-banner-settings-text-control" ></textarea>
				</div>

				<div class="islemag-banner-choice-image">
				  <span class="customize-control-title"> <?php esc_html_e( 'Image', 'islemag' ); ?> </span>
				  <span class="description customize-control-description"><?php esc_html_e( 'Recomanded size: 728px x 90px', 'islemag' ); ?></span>
				  <input type="text" class="widefat custom_media_url" value="">
				  <input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php esc_html_e( 'Upload Image', 'islemag' ); ?>" />

				  <span class="customize-control-title"> <?php esc_html_e( 'Link', 'islemag' ); ?> </span>
				  <input type="text" value="#" class="islemag-banner-link" placeholder="<?php esc_html_e( 'Link', 'islemag' ); ?> "/>
				</div>

				<input type="hidden" id="islemag-banner-colector" <?php $this->link(); ?> class="islemag-banner-colector" value="" />
				</div>

			<?php
		}// End if().
	}
}
