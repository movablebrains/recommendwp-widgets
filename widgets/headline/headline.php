<?php
/*
Widget Name: RWP Headline
Description: A simple headline widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Headline_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rwpw-headline',
			__( 'RWP Headline', 'recommendwp-widgets' ),
			array(
				'description' => __( 'A simple headline widget.', 'recommendwp-widgets' ),
			),
			array(),
			false,
			plugin_dir_path( __FILE__ ) . 'widgets'

		);
	}
	function initialize() {

	}
	function get_widget_form() {
		return array(
			'class' => array(
				'type' => 'text',
				'label' => __( 'Class', 'recommendwp-widgets' )
			),
			'title' => array(
				'type' => 'text',
				'label' => __( 'Title', 'recommendwp-widgets' )
			),
			'subtitle' => array(
				'type' => 'text',
				'label' => __( 'Subtitle', 'recommendwp-widgets' )
			),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Headline Template', 'recommendwp-widgets' ),
				'options' => array(
					'default' => 'Default',
				),
				'default' => 'default'
			)
		);
	}

	function get_template_name( $instance ) {
		switch ( $instance['template'] ) {
            case 'default':
            default:
                return 'default';
                break;
        }
	}

	function get_style_name( $instance ) {
		return false;
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'class' => $instance['class'],
			'title' => $instance['title'],
			'subtitle' => $instance['subtitle']
		);
	}
}

siteorigin_widget_register( 'rwpw-headline', __FILE__, 'RWP_Headline_Widget' );