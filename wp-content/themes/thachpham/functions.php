<?php 
/**
@ khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = Lay duong dan thu muc /core
**/
define('THEME_URL', get_stylesheet_directory_uri());
define('CORE', THEME_URL."/core");

/**
@ Nhung fine /core/init.php
**/

require_once(CORE."/inut.php");

/** 
@ Thiet lap chieu rong noi dung
**/

if (!isset($content_width)){
	$content_width = 620;
}

/**
@ khai bao chuc nang trong theme
**/
if (!function_exists('thachpham_theme_setup')){
	function thachpham_theme_setup(){
		/* thiet lap textdomain*/
		$language_folder = THEME_URL.'/languages';
		load_theme_textdomain('thachpham',$language_folder);
		/*tu dong them link ASS len <head>*/

		/**add_theme_support('automatic-feed-links');**/

		/***Them post thumbnail**/
		/**add_theme_support**/
	}
	add_action('init','thachpham_theme_setup');
}
















