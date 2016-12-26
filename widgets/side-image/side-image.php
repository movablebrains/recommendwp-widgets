<?php
/*
Widget Name: RWP Side Image
Description: A simple widget based of Bourbon Refills Side Image.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Side_Image extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rwpw-side-image',
			__( 'RWP Side Image', 'recommendwp-widgets' ),
			array(
				'description' => __( 'A simple widget based of Bourbon Refills Side Image', 'recommendwp-widgets' ),
				'help' => ''
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
			'image' => array(
				'type' => 'media',
				'label' => __('Choose an image', 'recommendwp-widgets'),
				'choose' => __('Choose image', 'recommendwp-widgets'),
				'update' => __('Set image', 'recommendwp-widgets'),
				'library' => 'image'
			),
			'editor' => array(
				'type' => 'widget',
				'label' => __( 'Editor', 'recommendwp-widgets' ),
				'class' => 'SiteOrigin_Widget_Editor_Widget',
				'hide' => false
			),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Template', 'recommendwp-widgets' ),
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

	function get_template_variables( $instance, $args ) {
		return array(
			'image' => $instance['image'],
			'size' => 'full',
			'template' => $instance['template']
		);
	}
}

siteorigin_widget_register( 'rwpw-side-image', __FILE__, 'RWP_Side_Image' );