<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="islemag-tab-pane">

	<h1><?php printf( esc_html__( 'Keep up with %s\'s latest news', 'islemag' ), 'IsleMag' ); ?></h1>

	<!-- NEWS -->
	<hr />

	<?php
	global $islemag_required_actions;

	if ( ! empty( $islemag_required_actions ) ) :

		/* islemag_show_required_actions is an array of true/false for each required action that was dismissed */
		$islemag_show_required_actions = get_option( 'islemag_show_required_actions' );

		foreach ( $islemag_required_actions as $islemag_required_action_key => $islemag_required_action_value ) :
			if ( @$islemag_show_required_actions[ $islemag_required_action_value['id'] ] === false ) {
				continue;
			}
			if ( @$islemag_required_action_value['check'] ) {
				continue;
			}
			?>
			<div class="islemag-action-required-box">
				<span class="dashicons dashicons-no-alt islemag-dismiss-required-action" id="<?php echo $islemag_required_action_value['id']; ?>"></span>
				<h4><?php echo $islemag_required_action_key + 1; ?>. 
								<?php
								if ( ! empty( $islemag_required_action_value['title'] ) ) :
									echo $islemag_required_action_value['title'];
endif;
?>
</h4>
				<p>
				<?php
				if ( ! empty( $islemag_required_action_value['description'] ) ) :
					echo $islemag_required_action_value['description'];
endif;
?>
</p>
				<?php
				if ( ! empty( $islemag_required_action_value['plugin_slug'] ) ) :
					?>
						<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $islemag_required_action_value['plugin_slug'] ), 'install-plugin_' . $islemag_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary">
												<?php
												if ( ! empty( $islemag_required_action_value['title'] ) ) :
													echo $islemag_required_action_value['title'];
endif;
?>
</a></p>
						<?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

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

	if ( $nr_actions_required == 0 ) :
		echo '<p>' . __( 'Hooray! There are no required actions for you right now.', 'islemag' ) . '</p>';
	endif;
	?>

</div>
