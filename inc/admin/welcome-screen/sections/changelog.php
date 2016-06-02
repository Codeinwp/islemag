<?php
/**
 * Changelog
 */

$islemag = wp_get_theme( 'islemag' );

?>
<div class="islemag-tab-pane" id="changelog">

	<div class="islemag-tab-pane-center">
	
		<h1>Islemag <?php if( !empty($islemag['Version']) ): ?> <sup id="islemag-theme-version"><?php echo esc_attr( $islemag['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$islemag_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$islemag_changelog_lines = explode(PHP_EOL, $islemag_changelog);
	foreach($islemag_changelog_lines as $islemag_changelog_line){
		if(substr( $islemag_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($islemag_changelog_line,3).'</h1>';
		} else {
			echo $islemag_changelog_line.'<br/>';
		}
	}

	?>
	
</div>
