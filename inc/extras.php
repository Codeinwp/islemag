<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package islemag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function islemag_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'islemag_body_classes' );


function islemag_footer() {
	?>
	<div class="col-md-8 col-md-push-4 islemag-footer-menu">
		<?php

		$defaults = array(
			'theme_location'  => 'islemag-footer',
			'fallback_cb'     => false,
			'items_wrap'      => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 1,
		);

		wp_nav_menu( $defaults );

		?>
	</div><!-- End .col-md-6 -->
	<div class="col-md-4 col-md-pull-8 powerdby">
		<?php printf(
			__( '%1$s powered by %2$s', 'islemag' ),
			sprintf( '<a href="https://themeisle.com/themes/islemag/" rel="nofollow">%s</a>', esc_html__( 'Islemag', 'islemag' ) ),
			sprintf( '<a href="http://wordpress.org/" rel="nofollow">%s</a>', esc_html__( 'WordPress', 'islemag' ) )
		); ?>
	</div><!-- End .col-md-6 -->
	<?php
}
add_action( 'islemag_footer_content','islemag_footer' );

function islemag_comments_heading() {
	printf(
		esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'islemag' ) ),
		number_format_i18n( get_comments_number() ),
		'<span>' . get_the_title() . '</span>'
	);
}
add_action( 'islemag_comments_title','islemag_comments_heading' );


function islemag_comment_action( $args, $comment, $depth, $add_below ) {
	?>

	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		} ?>
		<?php printf( __( '<h4 class="media-heading">%s</h4><span class="comment-date">(%2$s - %3$s)</span>','islemag' ), get_comment_author_link(), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)','islemag' ), '  ', '' ); ?>
		<div class="reply pull-right reply-link"> <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </div>
	</div>


	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'islemag' ); ?></em>
		<br />
	<?php endif; ?>



	<div class="media-body">
		<?php comment_text(); ?>
	</div>

	<?php
}
add_action( 'islemag_comment_content','islemag_comment_action', 10, 5 );

function islemag_post_entry_date() {
	$date_format = apply_filters( 'islemag_date_format','M' ); ?>
	<span class="entry-date"><?php echo get_the_date( 'd' ); ?><span><?php echo strtoupper( get_the_date( $date_format ) ); ?></span></span>
	<?php
}
add_action( 'islemag_entry_date', 'islemag_post_entry_date' );