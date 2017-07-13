<?php
/*
Plugin Name: RecommendWP Widgets
Plugin URI: https://bitbucket.org/webdevsuperfast/recommendwp-widgets
Bitbucket Plugin URI: https://bitbucket.org/webdevsuperfast/recommendwp-widgets
Description: A collection of widgets for WordPress built using the SiteOrigin Widgets API.
Version: 	1.3.16
Author: 	RecommendWP
Author URI: http://www.recommendwp.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: recommendwp-widgets
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( esc_html_e( 'With great power comes great responsibility.', 'animate-widgets' ) );

class RecommendWP_Widgets {
	public function __construct() {
		// Enqueue Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'rwpw_enqueue_scripts' ) );

		// Add widgets folder to SiteOrigin Widgets
		add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'rwpw_widget_folders' ) );

		// Enqueue Scripts related to RWP Features Widget
		add_action( 'siteorigin_widgets_enqueue_admin_scripts_rwpw-features', array( $this, 'rwpw_features_admin_scripts' ), 10, 2 );

		add_action( 'siteorigin_panel_enqueue_admin_scripts', array( $this, 'rwpw_features_admin_scripts' ) );

		//* Require if mr_image_resize function doesn't exist
		if ( !function_exists( 'mr_image_resize' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'lib/mr-image-resize.php' );
		}

		//* Require if mr_image_resize function exists
		if ( function_exists( 'mr_image_resize' ) ) {
			require_once( plugin_dir_path( __FILE__ ) . 'lib/misc.php' );
		}

	}

	public function rwpw_enqueue_scripts() {
		if ( ! is_admin() ) {
			// Widget CSS
			wp_register_style( 'rwpw-css', plugin_dir_url( __FILE__ ) . 'assets/css/widget.css' );
			wp_enqueue_style( 'rwpw-css' );

			// Owl Carousel JS
			wp_register_script( 'rwpw-owl-carousel-js', plugin_dir_url( __FILE__ ) . 'assets/js/owl.carousel.min.js', array( 'jquery' ), null, true );

			// Magnific Popup JS
			wp_register_script( 'rwpw-magnific-popup-js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), null, true );

			// Widget JS
			wp_register_script( 'rwpw-widgets-js', plugin_dir_url( __FILE__ ) . 'assets/js/widget.min.js', array( 'jquery' ), null, true );

			// wp_enqueue_script( 'rwpw-widgets-js' );
		}
	}

	public function rwpw_features_admin_scripts() {
		wp_register_script( 'rwpw-features-js', plugin_dir_url( __FILE__ ) . 'assets/js/features.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'rwpw-features-js' );
	}

	public function rwpw_widget_folders( $folders ) {
		$folders[] = plugin_dir_path( __FILE__ ) . 'widgets/';

		return $folders;
	}
}

new RecommendWP_Widgets();
