<?php
/*
Plugin Name: RecommendWP Widgets
Description: A collection of widgets for WordPress built using the SiteOrigin Widgets API.
Version: 1.0.2.4
Author: RecommendWP
Author URI: http://www.recommendwp.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
*/

class RecommendWP_Widgets {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'rwpw_enqueue_scripts' ) );

        add_filter( 'siteorigin_widgets_widget_folders', array( $this, 'rwpw_widget_folders' ) );

        add_filter( 'siteorigin_panels_widget_args', array( $this, 'rwpw_widget_args' ) );

        foreach ( glob( plugin_dir_path( __FILE__ ) . "widgets/*.php" ) as $file ) {
            include_once $file;
        }

        //* Require if mr_image_resize function doesn't exist
        if ( !function_exists( 'mr_image_resize' ) ) {
            require_once( plugin_dir_path( __FILE__ ) . 'lib/mr-image-resize.php' );
        }

        //* Require if mr_image_resize function exists
        if ( function_exists( 'mr_image_resize' ) )
            require_once( plugin_dir_path( __FILE__ ) . 'lib/misc.php' );

    }

    public function rwpw_enqueue_scripts() {
        if ( ! is_admin() ) {
            // Widget CSS
            wp_register_style( 'rwpw-css', plugin_dir_url( __FILE__ ) . 'css/widget.css' );
            wp_enqueue_style( 'rwpw-css' );

            // Owl Carousel JS
            wp_register_script( 'rwpw-owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), null, true );

            // Widget JS
            wp_register_script( 'rwpw-widgets-js', plugin_dir_url( __FILE__ ) . 'js/widget.js', array( 'jquery' ), null, true );
        }
    }

    public function rwpw_widget_folders( $folders ) {
        $folders[] = plugin_dir_path( __FILE__ ) . 'widgets/';

        return $folders;
    }

    public function rwpw_widget_args( $args ) {
        $args['widget_id'] = $args['widget_id'] . '1';

        return $args;
    }
}

new RecommendWP_Widgets();
