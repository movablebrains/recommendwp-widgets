<?php
/*
Widget Name: RWP Features
Description: A simple features widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Features_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rwpw-features',
			__( 'RWP Features', 'recommendwp-widgets' ),
			array(
				'description' => __( 'A simple features widget.', 'recommendwp-widgets' )
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
			'title' => array(
				'type' => 'text',
				'label' => __( 'Title', 'recommendwp-widgets' )
			),
			'features' => array(
				'type' => 'repeater',
				'label' => __('Add Features', 'recommendwp-widgets'),
				'item_name' => __('Feature', 'recommendwp-widgets'),
				'item_label' => array(
					'selector' => "[id*='repeat_text']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => __('Choose an image', 'recommendwp-widgets'),
						'choose' => __('Choose image', 'recommendwp-widgets'),
						'update' => __('Set image', 'recommendwp-widgets'),
						'library' => 'image'
					),
					'headline' => array(
						'type' => 'text',
						'label' => __( 'Headline', 'recommendwp-widgets' ),
					),
					'subheadline' => array(
						'type' => 'textarea',
						'label' => __( 'Subheadline', 'recommendwp-widgets' )
					),
					'button_text' => array(
						'type' => 'text',
						'label' => __( 'Button Text', 'recommendwp-widgets' ),
						'default' => 'Learn More'
					),
					'button_link' => array(
						'type' => 'link',
						'label' => __( 'Button Link', 'recommendwp-widgets' )
					)
				)
			),
			'design' => array(
				'type' => 'select',
				'label' => __( 'Design', 'recommendwp-widgets' ),
				'options' => array(
					'basic' => __( 'Basic', 'recommendwp-widgets' ),
					'left-aligned' => __( 'Left aligned', 'recommendwp-widgets' ),
					'boxed-icon' => __( 'Boxed Icon', 'recommendwp-widgets' )
				),
				'default' => 'basic'
			),
			'column' => array(
				'type' => 'slider',
				'label' => __( 'Columns', 'recommendwp-widgets' ),
				'default' => 3,
				'min' => 1,
				'max' => 12,
				'integer' => true
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function get_style_name( $instance ) {
		return 'default';
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'title' => $instance['title'],
			'features' => $instance['features'],
			'design' => $instance['design'],
			'column' => $instance['column']
		);
	}
}

siteorigin_widget_register( 'rwpw-features', __FILE__, 'RWP_Features_Widget' );