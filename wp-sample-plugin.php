<?php
/*
Plugin Name: WordPress Sample Plugin
Plugin URI: https://github.com/niiharamegumu/wp-sample-plugin
Description: WordPress Plugin Sample build.
Version: 1.0.0
Author: Niihara Megumu
Author URI: https://github.com/niiharamegumu/wp-sample-plugin
License: GPLv2 or later
*/

new Sample_Plugin();

class Sample_Plugin {
	/**
	* Constructor
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	/**
	* Add admin menus.
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function admin_menu() {
		add_menu_page(
			'サンプルA',
			'サンプルB',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' ),
			'dashicons-admin-site'
		);
		add_submenu_page(
			__FILE__,
			'サンプル一覧',
			'サンプル一覧',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' ),
			'dashicons-admin-site'
		);
		add_submenu_page(
			__FILE__,
			'サンプル追加',
			'サンプル追加',
			'manage_options',
			plugin_dir_path( __FILE__ ) . 'includs/wp-sample-plugin-post.php',
			array( $this, 'post_page_render' ),
			'dashicons-admin-site'
		);
	}

	/**
	* Rendering List Page.
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function list_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-list.php' );
		new Sample_Plugin_List();
	}


	/**
	* Rendering Post Page.
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function post_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-sample-plugin-post.php' );
		new Sample_Plugin_Post();
	}
}
