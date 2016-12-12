<?php
/**
 * Define all the theme hooks.
 *
 * @package WordPress
 * @subpackage Islemag
 */

/**
 * Hook at the beginning of top bar.
 */
function islemag_navbar_top_head() {
	do_action( 'islemag_navbar_top_head' );
}

/**
 * Hook at the end of top bar.
 */
function islemag_navbar_top_bottom() {
	do_action( 'islemag_navbar_top_bottom' );
}

/**
 * Hook at the beginning of header.
 */
function islemag_header_content_head() {
	do_action( 'islemag_header_content_head' );
}

/**
 * Hook at the end of header.
 */
function islemag_header_content_bottom() {
	do_action( 'islemag_header_content_bottom' );
}

/**
 *  Hook before main navigation.
 */
function islemag_main_nav_before() {
	do_action( 'islemag_main_nav_before' );
}

/**
 *  Hook after main navigation.
 */
function islemag_main_nav_after() {
	do_action( 'islemag_main_nav_after' );
}

/**
 *  Hook at the beginning of footer container.
 */
function islemag_footer_container_head() {
	do_action( 'islemag_footer_container_head' );
}

/**
 *  Hook at the end of footer container.
 */
function islemag_footer_container_bottom() {
	do_action( 'islemag_footer_container_bottom' );
}

/**
 *  Hook for footer content.
 */
function islemag_footer_content() {
	do_action( 'islemag_footer_content' );
}

/**
 *  Hook for comments title
 */
function islemag_comments_title() {
	do_action( 'islemag_comments_title' );
}

/**
 * Hook for comments content.
 *
 * @param array                 $args                     Comment arguments.
 * @param integer/string/object $comment  Author’s User ID (an integer or string), an E-mail Address (a string) or the comment object from the comment loop.
 * @param int                   $depth                      Depth of comments.
 * @param string                $add_below               For the JavaScript addComment.moveForm() method parameters.
 */
function islemag_comment_content( $args, $comment, $depth, $add_below ) {
	do_action( 'islemag_comment_content', $args, $comment, $depth, $add_below );
}

/**
 * Hook for footer on content.php
 */
function islemag_content_footer() {
	do_action( 'islemag_entry_footer' );
}

/**
 * Hook for date format.
 */
function islemag_entry_date() {
	do_action( 'islemag_entry_date' );
}

/**
 * At the top of the slider posts
 */
function islemag_top_slider_posts_trigger() {
	do_action( 'islemag_top_slider_posts' );
}

/**
 * At the bottom of the slider posts
 */
function islemag_bottom_slider_posts_trigger() {
	do_action( 'islemag_bottom_slider_posts' );
}
