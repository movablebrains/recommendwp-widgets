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
			'image_position' => array(
				'type' => 'select',
				'label' => __( 'Image position', 'recommendwp-widgets' ),
				'options' => array(
					'left-image' => __( 'Left', 'recommendwp-widgets' ),
					'right-image' => __( 'Right', 'recommendwp-widgets' )
				),
				'default' => 'left-image'
			),
			'editor' => array(
				'type' => 'widget',
				'label' => __( 'Editor', 'recommendwp-widgets' ),
				'class' => 'SiteOrigin_Widget_Editor_Widget',
				'hide' => false
			),
			'button' => array(
            	'type' => 'widget',
            	'label' => __( 'Button', 'recommendwp-widgets' ),
            	'class' => 'RWP_Button_Widget',
            	'hide' => false
            ),
            'settings' => array(
            	'type' => 'section',
            	'label' => __( 'Settings', 'recommendwp-widgets' ),
            	'fields' => array(
            		'display_image' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Image', 'recommendwp-widgets' ),
            			'default' => true
            		),
            		'display_content' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Content', 'recommendwp-widgets' ),
            			'default' => true
            		),
            		'display_button' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Button', 'recommendwp-widgets' ),
            			'default' => true
            		)
            	)
            ),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Template', 'recommendwp-widgets' ),
				'options' => array(
					'default' => __( 'Default', 'recommendwp-widgets' ),
					'img' => __( 'Image in img tag', 'recommendwp-widgets' )
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
			case 'img':
				return 'image';
				break;
        }
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'image' => $instance['image'],
			'size' => 'full',
			'template' => $instance['template'],
			'display_image' => $instance['settings']['display_image'],
			'display_content' => $instance['settings']['display_content'],
            'display_button' => $instance['settings']['display_button'],
			'image_position' => $instance['image_position']
		);
	}

	function modify_child_widget_form( $child_widget_form, $child_widget ) {
        if ( get_class( $child_widget ) == 'RWP_Button_Widget' ) {
            unset( $child_widget_form['template'] );
        }
        
		return $child_widget_form;
	}
}

siteorigin_widget_register( 'rwpw-side-image', __FILE__, 'RWP_Side_Image' );