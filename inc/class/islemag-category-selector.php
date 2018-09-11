<?php
/**
 * IseleMagCategorySelector class file
 *
 * @package WordPress
 * @subpackage Islemag
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class IseleMagCategorySelector
 */
class IseleMagCategorySelector extends WP_Customize_Control {

	/**
	 * IseleMagCategorySelector constructor.
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
		$categories = get_categories();
		?>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<select <?php $this->link(); ?>>
		<option value="all"><?php esc_html_e( 'All', 'islemag' ); ?></option>
		<?php
		foreach ( $categories as $cat ) {
			if ( $cat->count > 0 ) {
				echo '<option value="' . esc_attr( $cat->slug ) . '" ' . selected( $this->value(), $cat->slug ) . '>' . esc_attr( $cat->cat_name ) . '</option>';
			}
		}
		?>
			</select>
		<?php
	}
}
