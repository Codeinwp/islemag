<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package islemag
 */


if ( ! function_exists( 'islemag_body_classes' ) ) {

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
}
add_filter( 'body_class', 'islemag_body_classes' );


if ( ! function_exists( 'islemag_footer' ) ) {
	/**
	 * Display footer function.
	 */
	function islemag_footer() {
		?>
		<div class="col-md-8 col-md-push-4 islemag-footer-menu">
			<?php

			$defaults = array(
				'theme_location' => 'islemag-footer',
				'fallback_cb'    => false,
				'items_wrap'     => '<ul class="footer-menu" id="%1$s" class="%2$s">%3$s</ul>',
				'depth'          => 1,
			);

			wp_nav_menu( $defaults );

			?>
		</div><!-- End .col-md-6 -->
		<div class="col-md-4 col-md-pull-8 powerdby">
			<?php
				$islemag_copyright = get_theme_mod(
					'islemag_footer_copyright',
					sprintf(
						/* translators: 1 - Theme name , 2 - WordPress link */
						__( '%1$s powered by %2$s', 'islemag' ),
						sprintf( '<a href="https://themeisle.com/themes/islemag/" rel="nofollow">%s</a>', esc_html__( 'Islemag', 'islemag' ) ),
						sprintf( '<a href="http://wordpress.org/" rel="nofollow">%s</a>', esc_html__( 'WordPress', 'islemag' ) )
					)
				);
			if ( ! empty( $islemag_copyright ) ) {
				echo wp_kses_post( $islemag_copyright );
			}
			?>
		</div><!-- End .col-md-6 -->
		<?php
	}
}
add_action( 'islemag_footer_content', 'islemag_footer' );


if ( ! function_exists( 'islemag_comments_heading' ) ) {
	/**
	 * Heading of comments.
	 */
	function islemag_comments_heading() {
		$comments_number = get_comments_number();
		if ( 1 === $comments_number ) {
			/* translators: %s: post title */
			printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'islemag' ), get_the_title() );
		} else {
			printf(
				/* translators: 1: number of comments, 2: post title */
				_nx(
					'%1$s thought on &ldquo;%2$s&rdquo;',
					'%1$s thoughts on &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'islemag'
				),
				number_format_i18n( $comments_number ),
				'<span>' . get_the_title() . '</span>'
			);
		}
	}
}
add_action( 'islemag_comments_title', 'islemag_comments_heading' );


if ( ! function_exists( 'islemag_comment_action' ) ) {
	/**
	 * Comment action.
	 *
	 * @param string $args Comment arguments.
	 * @param object $comment Comment object.
	 * @param int    $depth Comments depth.
	 * @param string $add_below  Add bellow comments.
	 */
	function islemag_comment_action( $args, $comment, $depth, $add_below ) {
		?>

		<div class="comment-author vcard">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			}
			?>
			<?php
			/* translators: 1- comment author link, 2 - comment date, 3 - comment time */
			printf( __( '<h4 class="media-heading">%1$s</h4><span class="comment-date">(%2$s - %3$s)</span>', 'islemag' ), get_comment_author_link(), get_comment_date(), get_comment_time() );
			?>
			<?php edit_comment_link( __( '(Edit)', 'islemag' ), '  ', '' ); ?>
			<div class="reply pull-right reply-link"> 
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
			</div>
		</div>


		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'islemag' ); ?></em>
			<br/>
		<?php endif; ?>


		<div class="media-body">
			<?php comment_text(); ?>
		</div>

		<?php
	}
}// End if().
add_action( 'islemag_comment_content', 'islemag_comment_action', 10, 5 );

/**
 * Post entry date.
 */
if ( ! function_exists( 'islemag_post_entry_date' ) ) {
	/**
	 * Post entry date.
	 */
	function islemag_post_entry_date() {
		$date_format = apply_filters( 'islemag_date_format', 'M' );
		?>
		<span class="entry-date"><?php echo get_the_date( 'd' ); ?>
			<span><?php echo strtoupper( get_the_date( $date_format ) ); ?></span></span>
		<?php
	}
}
add_action( 'islemag_entry_date', 'islemag_post_entry_date' );
