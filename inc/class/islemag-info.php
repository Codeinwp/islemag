<?php
/**
 * Class to display upsells.
 *
 * @package WordPress
 * @subpackage islemag
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class islemag_Info
 */
class Islemag_Info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';


	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Documentation','islemag' ),
				'link' => esc_url( 'http://docs.themeisle.com/article/315-islemag-documentation' ),
			),
			array(
				'name' => __( 'Demo','islemag' ),
				'link' => esc_url( 'https://themeisle.com/demo/?theme=IsleMag' ),
			),
			array(
				'name' => __( 'View theme info','islemag' ),
				'link' => admin_url( 'themes.php?page=islemag-welcome#actions_required' ),
			),
			array(
				'name' => __( 'Leave a review','islemag' ),
				'link' => esc_url( 'https://wordpress.org/support/theme/islemag/reviews/#new-post/' ),
			),
		); ?>


		<div class="islemag-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<hr/>
				<?php
			} ?>
		</div>
		<?php
	}
}
