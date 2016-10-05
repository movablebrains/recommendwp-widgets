<?php
/*
Widget Name: RWP CTA
Description: A simple CTA widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_CTA_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-cta',
            __( 'RWP CTA', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple CTA widget.', 'recommendwp-widgets' ),
            ),
            array(

            ),
            false,
            plugin_dir_path( __FILE__ ) . 'widgets'
        );
    }

    function initialize() {
        if( !class_exists('RWP_Button_Widget') ) {
            SiteOrigin_Widgets_Bundle::single()->include_widget( 'rwp-button' );
        }
        if( !class_exists('RWP_Image_Widget') ) {
            SiteOrigin_Widgets_Bundle::single()->include_widget( 'rwp-image' );
        }
    }

    function get_widget_form() {
        return array(
            'headline' => array(
                'type' => 'text',
                'label' => __( 'Headline', 'recommendwp-widgets' ),
                'default' => __( '', 'recommendwp-widgets' )
            ),
            'content' => array(
                'type' => 'textarea',
                'label' => __( 'Content', 'recommendwp-widgets' ),
                'default' => __( '', 'recommendwp-widgets' )
            ),
            'image' => array(
            	'type' => 'widget',
            	'class' => 'RWP_Image_Widget',
            	'label' => __( 'Image', 'recommendwp-widgets' )
            ),
            'button' => array(
            	'type' => 'widget',
            	'label' => __( 'Button', 'recommendwp-widgets' ),
            	'class' => 'RWP_Button_Widget'
            ),
            'settings' => array(
            	'type' => 'section',
            	'label' => __( 'Settings', 'recommendwp-widgets' ),
            	'fields' => array(
            		'design' => array(
            			'type' => 'select',
            			'label' => __( 'Design', 'recommendwp-widgets' ),
            			'options' => array(
            				'default' => __( 'None', 'recommendwp-widgets' ),
            				'simple' => __( 'Simple', 'recommendwp-widgets' ),
            				'center' => __( 'Center', 'recommendwp-widgets' )
            			),
            			'default' => 'simple'
            		),
            		'display_image' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Image', 'recommendwp-widgets' ),
            			'default' => true
            		),
            		'display_button' => array(
            			'type' => 'checkbox',
            			'label' => __( 'Display Button', 'recommendwp-widgets' ),
            			'default' => true
            		)
            	)
            )
        );
    }

    function get_template_variables( $instance, $args ) {
        return array(
            'headline' => !empty( $instance['headline'] ) ? $instance['headline'] : '',
            'subheadline' => !empty( $instance['subheadline'] ) ? $instance['subheadline'] : '',
            'design' => $instance['settings']['design'],
            'display_image' => $instance['settings']['display_image'],
            'display_button' => $instance['settings']['display_button']
        );
    }

    function get_template_name( $instance ) {
        return 'default';
    }

    function get_style_name( $instance ) {
    	return 'default';
    }

    function modify_child_widget_form( $child_widget_form, $child_widget ) {
		unset( $child_widget_form['settings']['fields']['alignment'] );
		unset( $child_widget_form['title'] );
		return $child_widget_form;
	}
}

siteorigin_widget_register( 'rwpw-cta', __FILE__, 'RWP_CTA_Widget' );