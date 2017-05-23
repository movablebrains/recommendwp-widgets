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
                'description' => __( 'A simple popup content builder to be used together with the RWP Button Widget', 'recommendwp-widgets' ),
                'help' => ''
            ),
            array(),
            false,
            plugin_dir_path( __FILE__ ) . 'widgets'
        );
    }

	function get_widget_form() {
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'recommendwp-widgets'),
				'default' => ''
			),
			'id' => array(
				'type' => 'text',
				'label' => __( 'ID', 'recommendwp-widgets' ),
			),
            'class' => array(
                'type' => 'text',
                'label' => __( 'Class', 'recommendwp-widgets' )
            ),
            'image' => array(
                'type' => 'widget',
                'label' => __( 'Image', 'recommendwp-widgets' ),
                'class' => 'RWP_Image_Widget'
            ),
            'content' => array(
                'type' => 'widget',
                'label' => __( 'Content', 'recommendwp-widgets' ),
                'class' => 'SiteOrigin_Widget_Editor_Widget'
            ),
            'design' => array(
                'type' => 'section',
                'label' => __( 'Design', 'recommendwp-widgets' ),
                'fields' => array(
                    'width' => array(
                        'type' => 'number',
                        'label' => __( 'Popup Width', 'recommendwp-widgets' ),
                        'default' => 740
                    ),
                    'background' => array(
                        'type' => 'color',
                        'label' => __( 'Background', 'recommendwp-widgets' ),
                        'default' => '#fff'
                    )
                )
            ),
            'settings' => array(
            	'type' => 'section',
            	'label' => __( 'Settings', 'recommendwp-widgets' ),
            	'fields' => array(
                    'display_title' => array(
                        'type' => 'checkbox',
                        'label' => __( 'Display Title', 'recommendwp-widgets' ),
                        'default' => true
                    ),
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
            	)
            ),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Choose template', 'recommendwp-widgets' ),
				'options' => array(
					'default' => __( 'Default', 'recommendwp-widgets' )
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
    		'title' => $instance['title'],
            'id' => $instance['id'],
    		'class' => $instance['class'],
            'image' => $instance['image'],
            'content' => $instance['content'],
    		'template' => $instance['template'],
            'width' => $instance['design']['width'] . 'px',
            'background' => $instance['design']['background'],
            'display_title' => $instance['settings']['display_title'],
            'display_image' => $instance['settings']['display_image'],
            'display_content' => $instance['settings']['display_content']
    	);
	}

    function modify_child_widget_form( $child_widget_form, $child_widget ) {
        if ( get_class( $child_widget ) == 'RWP_Image_Widget' ) {
            unset( $child_widget_form['settings']['fields']['alignment'] );
            unset( $child_widget_form['title'] );
            unset( $child_widget_form['content'] );
            unset( $child_widget_form['template'] );
        }

        if ( get_class( $child_widget ) == 'SiteOrigin_Widget_Editor_Widget' ) {
            unset( $child_widget_form['title'] );
        }
        
		return $child_widget_form;
	}
}

siteorigin_widget_register( 'rwpw-popup', __FILE__, 'RWP_Popup_Widget' );