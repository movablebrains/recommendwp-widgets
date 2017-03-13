<?php
/*
Widget Name: RWP Lists
Description: A simple list widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class List_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-lists',
            __( 'RWP Lists', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple list widget', 'recommendwp-widgets' ),
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
			'class' => array(
				'type' => 'text',
				'label' => __( 'Class', 'recommendwp-widgets' ),
			),
			'lists' => array(
				'type' => 'repeater',
				'label' => __('Add List', 'recommendwp-widgets'),
				'item_name' => __('List', 'recommendwp-widgets'),
				'item_label' => array(
					'selector' => "[id*='title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'title' => array(
						'type' => 'text',
						'label' => __( 'List Title', 'recommendwp-widgets' ),
						'default' => ''
					),
					'content' => array(
						'type' => 'tinymce',
						'label' => __('List Content', 'recommendwp-widgets'),
						'default' => '',
						'rows' => 10,
						'default_editor' => 'html',
						'button_filters' => array(
							'mce_buttons' => array( $this, 'filter_mce_buttons' ),
							'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
							'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
							'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
							'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
						),
					)
				)
			),
			'icon' => array(
				'type' => 'section',
				'label' => __( 'Icon Settings', 'gss' ),
				'hide' => true,
				'fields' => array(
                    'image' => array(
                        'type' => 'media',
                        'label' => __('Choose an image', 'recommendwp-widgets'),
                        'choose' => __('Choose image', 'recommendwp-widgets'),
                        'update' => __('Set image', 'recommendwp-widgets'),
                        'library' => 'image'
                    ),
                    'size' => array(
        				'type' => 'number',
        				'label' => __( 'Icon size', 'recommendwp-widgets' ),
        				'default' => '16'
        			)
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

    function get_style_name( $instance ) {
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
    		'class' => $instance['class'],
    		'icon_image' => $instance['icon']['image'],
            'icon_size' => $instance['icon']['size'],
            'template' => $instance['template']
    	);
	}
}

siteorigin_widget_register( 'rwpw-lists', __FILE__, 'List_Widget' );