<?php
/**
 * Welcome Screen Class
 */
class Islemag_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'islemag_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'islemag_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'islemag_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'islemag_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'islemag_welcome', array( $this, 'islemag_welcome_getting_started' ), 10 );
		add_action( 'islemag_welcome', array( $this, 'islemag_welcome_actions_required' ), 20 );
		add_action( 'islemag_welcome', array( $this, 'islemag_welcome_github' ), 30 );
		add_action( 'islemag_welcome', array( $this, 'islemag_welcome_changelog' ), 40 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_islemag_dismiss_required_action', array( $this, 'islemag_dismiss_required_action_callback' ) );
		add_action( 'wp_ajax_nopriv_islemag_dismiss_required_action', array( $this, 'islemag_dismiss_required_action_callback' ) );

	}

	/**
	 * Creates the dashboard page
	 *
	 * @see  add_theme_page()
	 * @since 1.0.11
	 */
	public function islemag_welcome_register_menu() {
		add_theme_page( 'About Islemag', 'About Islemag', 'activate_plugins', 'islemag-welcome', array( $this, 'islemag_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 *
	 * @since 1.0.11
	 */
	public function islemag_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'islemag_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$swelcome page%3$s.', 'islemag' ), 'IsleMag', '<a href="' . esc_url( admin_url( 'themes.php?page=islemag-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=islemag-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( __( 'Get started with %s', 'islemag' ), 'IsleMag' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 *
	 * @since  1.0.11
	 */
	public function islemag_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_islemag-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'islemag-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'islemag-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array( 'jquery' ) );

			global $islemag_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if ( get_option( 'islemag_show_required_actions' ) ) :
				$islemag_show_required_actions = get_option( 'islemag_show_required_actions' );
			else :
				$islemag_show_required_actions = array();
			endif;

			if ( ! empty( $islemag_required_actions ) ) :
				foreach ( $islemag_required_actions as $islemag_required_action_value ) :
					if ( ( ! isset( $islemag_required_action_value['check'] ) || ( isset( $islemag_required_action_value['check'] ) && ( $islemag_required_action_value['check'] == false ) ) ) && ( ( isset( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] ) && ( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] == true ) ) || ! isset( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] ) ) ) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script(
				'islemag-welcome-screen-js', 'islemagWelcomeScreenObject', array(
					'nr_actions_required'      => $nr_actions_required,
					'ajaxurl'                  => admin_url( 'admin-ajax.php' ),
					'template_directory'       => get_template_directory_uri(),
					'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.', 'islemag' ),
				)
			);
		}
	}

	/**
	 * Load scripts for customizer page
	 *
	 * @since  1.0.11
	 */
	public function islemag_welcome_scripts_for_customizer() {

		global $islemag_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if ( get_option( 'islemag_show_required_actions' ) ) :
			$islemag_show_required_actions = get_option( 'islemag_show_required_actions' );
		else :
			$islemag_show_required_actions = array();
		endif;

		if ( ! empty( $islemag_required_actions ) ) :
			foreach ( $islemag_required_actions as $islemag_required_action_value ) :
				if ( ( ! isset( $islemag_required_action_value['check'] ) || ( isset( $islemag_required_action_value['check'] ) && ( $islemag_required_action_value['check'] == false ) ) ) && ( ( isset( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] ) && ( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] == true ) ) || ! isset( $islemag_show_required_actions[ $islemag_required_action_value['id'] ] ) ) ) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

	}

	/**
	 * Dismiss required actions
	 *
	 * @since 1.0.11
	 */
	public function islemag_dismiss_required_action_callback() {

		global $islemag_required_actions;

		$islemag_dismiss_id = ( isset( $_GET['dismiss_id'] ) ) ? $_GET['dismiss_id'] : 0;

		echo $islemag_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $islemag_dismiss_id ) ) :

			/* if the option exists, update the record for the specified id */
			if ( get_option( 'islemag_show_required_actions' ) ) :

				$islemag_show_required_actions = get_option( 'islemag_show_required_actions' );

				$islemag_show_required_actions[ $islemag_dismiss_id ] = false;

				update_option( 'islemag_show_required_actions', $islemag_show_required_actions );

				/* create the new option,with false for the specified id */
			else :

				$islemag_show_required_actions_new = array();

				if ( ! empty( $islemag_required_actions ) ) :

					foreach ( $islemag_required_actions as $islemag_required_action ) :

						if ( $islemag_required_action['id'] == $islemag_dismiss_id ) :
							$islemag_show_required_actions_new[ $islemag_required_action['id'] ] = false;
						else :
							$islemag_show_required_actions_new[ $islemag_required_action['id'] ] = true;
						endif;

					endforeach;

					update_option( 'islemag_show_required_actions', $islemag_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="islemag-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started', 'islemag' ); ?></a></li>
			<li role="presentation" class="islemag-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required', 'islemag' ); ?></a></li>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute', 'islemag' ); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog', 'islemag' ); ?></a></li>
		</ul>

		<div class="islemag-tab-content">

			<?php
			/**
			 * @hooked islemag_welcome_getting_started - 10
			 * @hooked islemag_welcome_actions_required - 20
			 * @hooked islemag_welcome_github - 30
			 * @hooked islemag_welcome_changelog - 40
			 */
			do_action( 'islemag_welcome' );
			?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Contribute
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 *
	 * @since 1.0.11
	 */
	public function islemag_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}
}

$GLOBALS['Islemag_Welcome'] = new Islemag_Welcome();
