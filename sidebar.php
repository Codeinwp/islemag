<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package islemag
 */

if ( ! is_active_sidebar( 'islemag-sidebar' ) ) {
	return;
}
?>

<aside class="col-md-3 sidebar islemag-content-right " role="complementary">
	<?php dynamic_sidebar( 'islemag-sidebar' ); ?>
</aside><!-- #secondary -->