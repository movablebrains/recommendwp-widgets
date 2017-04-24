<?php
/*
Widget Name: RWP Popup
Description: A simple popup widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Popup_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-popup',
            __( 'RWP Popup', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple popup widget', 'recommendwp-widgets' ),
            ),
            array(

            ),
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
        		'label' => __( 'Class', 'recommendwp-widgets' ),
    		),
            'id' => array(
                'type' => 'text',
                'label' => __( 'ID', 'recommendwp-widgets' )
            ),
            'type' => array(
                'type' => 'select',
                'label' => __( 'Type', 'recommendwp-widgets' ),
                'default' => 'inline',
                'options' => array(
                    'none' => __( 'None', 'recommendwp-widgets' ),
                    'ajax' => __( 'Ajax', 'recommendwp-widgets' ),
                    'image' => __( 'Image', 'recommendwp-widgets' ),
                    'inline' => __( 'Inline', 'recommendwp-widgets' ),
                    'iframe' => __( 'iFrame', 'recommendwp-widgets' )
                )
            ),
            'button' => array(
                'type' => 'widget',
                'label' => __( 'Button', 'recommendwp-widgets' ),
                'class' => 'RWP_Button_Widget',
                'hide' => false
            ),
            'content' => array(
                'type' => 'widget',
                'label' => __( 'Popup Content', 'recommendwp-widgets' ),
                'class' => 'SiteOrigin_Widget_Editor_Widget',
                'hide' => false
            ),
        );
    }

	function get_template_variables( $instance, $args ) {
		// $variables = array();
		$variables = array(
			'class' => $instance['class'],
            'id' => $instance['id'],
            'type' => $instance['type']
		);

		return $variables;
	}

    function get_template_name( $instance ) {
		return 'default';
    }
}

siteorigin_widget_register( 'rwpw-popup', __FILE__, 'RWP_Popup_Widget' );