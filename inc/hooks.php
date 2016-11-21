<?php
/**
 * Define all the theme hooks.
 */

function islemag_navbar_top_head(){
	do_action('islemag_navbar_top_head');
}


function islemag_navbar_top_bottom(){
	do_action('islemag_navbar_top_bottom');
}

function islemag_header_content_head(){
	do_action('islemag_header_content_head');
}

function islemag_header_content_bottom(){
	do_action('islemag_header_content_bottom');
}

function islemag_main_nav_before(){
	do_action('islemag_main_nav_before');
}

function islemag_main_nav_after(){
	do_action('islemag_main_nav_after');
}

function islemag_footer_container_head(){
	do_action('islemag_footer_container_head');

}

function islemag_footer_container_bottom(){
	do_action('islemag_footer_container_bottom');
}

function islemag_footer_content(){
	do_action('islemag_footer_content');
}

function islemag_post_navigation(){
	do_action('islemag_post_navigation');
}

function islemag_comments_title(){
	do_action('islemag_comments_title');
}

function islemag_comment_content($args, $comment, $depth, $add_below){
	do_action('islemag_comment_content', $args, $comment, $depth, $add_below);
}

function islemag_content_footer(){
	do_action('islemag_entry_footer');
}

function islemag_entry_date(){
	do_action('islemag_entry_date');
}