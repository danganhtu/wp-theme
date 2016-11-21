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

require_once( CORE . "/init.php" );

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

		/** thiet lap textdomain **/
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain('thachpham', $language_folder);
		
		/** Tu dong them RSS link len the <head> **/
		add_theme_support( 'automatic-feed-links'); 

		/**Theme post thumbnail**/
		add_theme_support('post-thumbnails');

		/** Post format */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
			));

		/** Them title-tag  */
		add_theme_support('title-tag');

		/**Theme custom background **/
		$default_background = array(
			'default-color' => '#e8e8e8'
			);
		add_theme_support('custom-background',$default_background);

		/**Theme menu*/
		register_nav_menu('primary-menu',__('Primary Menu','thachpham'));

		/**Tao sidebar */
		$sidebar = array(
			'name' => __('Main Sidebar','thachpham'),
			'id' => 'main-sidebar', 
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',  
			'before_title' => '<h3 class="widgettitle">',  
			'after_title' => '</h3>'
			);
		register_sidebar($sidebar);

	}
	add_action('init','thachpham_theme_setup');
}
















