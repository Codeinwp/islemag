<?php
/**
 * Preview functions.
 *
 * @package islemag
 */

/** Get a random image from demo content
 * Can be recursive if a specific img size is not found
 *
 * @param int $i Maximum number of recalls.
 *
 * @return string
 */
function islemag_get_prevdem_img_src( $i = 0 ) {
	// prevent infinite loop
	if ( 10 == $i ) {
		return '';
	}
	$path = apply_filters( 'islemag_prevdem_home_filter', get_template_directory() . '/ti-prevdem/img/' );
	// Build or re-build the global dem img array
	if ( ! isset( $GLOBALS['prevdem_img'] ) || empty( $GLOBALS['prevdem_img'] ) ) {
		$imgs = array();
		$candidates = array();
		if ( is_dir( $path ) ) {
			$imgs = scandir( $path );
		}
		if ( ! $imgs || empty( $imgs ) ) {
			return array();
		}
		foreach ( $imgs as $img ) {
			if ( '.' === $img[0] || is_dir( $path . $img ) ) {
				continue;
			}
			$candidates[] = $img;
		}
		$GLOBALS['prevdem_img'] = $candidates;
	}
	$candidates = $GLOBALS['prevdem_img'];
	// get a random image name
	$rand_key = array_rand( $candidates );
	$img_name = $candidates[ $rand_key ];
	// if file does not exists, reset the global and recursively call it again
	if ( ! file_exists( $path . $img_name ) ) {
		unset( $GLOBALS['prevdem_img'] );
		$i++;
		return islemag_get_prevdem_img_src( $i );
	}
	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img , 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS['prevdem_img'] = $new_candidates;
	return apply_filters( 'islemag_prevdem_home_uri_filter',get_template_directory_uri() . '/ti-prevdem/img/' ) . $img_name;
}
/**
 * Filter thumbnail image
 *
 * @param string $input Post thumbnail.
 */
function islemag_the_post_thumbnail( $input ) {
	if ( empty( $input ) ) {
		$placeholder = islemag_get_prevdem_img_src();
		return '<img width="770" height="430" src="' . esc_url( $placeholder ) . '" class="wp-post-image">';
	}
	return $input;

}
add_filter( 'islemag_get_prev_img', 'islemag_the_post_thumbnail' );
