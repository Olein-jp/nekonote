<?php
/**
 * Plugin name: NEKONOTE
 * Description: あなたのブロックエディターをちょっとだけ便利にしてくれるかもしれないプラグイン
 * Version: 0.0.1
 * Author: Koji Kuno
 * Author URI: https://olein-design.com
 * License: GPLv2 or Later
 *
 * @package nekonote
 * @author Olein-jp
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NEKONOTE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'NEKONOTE_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

/**
 * Include Block Pattern
 */
require NEKONOTE_PLUGIN_PATH . 'inc/patterns/block-patterns.php';

/**
 * Include Block Style
 */
require NEKONOTE_PLUGIN_PATH . 'inc/styles/block-styles.php';

/**
 * Enqueue Front Styles
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'nekonote-styles',
			NEKONOTE_PLUGIN_URL . '/assets/css/style.css',
			[],
			filemtime( NEKONOTE_PLUGIN_PATH . '/assets/css/style.css' )
		);
	}
);

/**
 * Enqueue Editor Styles
 */
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'editor-styles' );

		add_editor_style( '../../plugins/nekonote/assets/css/editor-style.css' );
	}
);
