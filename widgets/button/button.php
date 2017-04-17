<?php
/*
Widget Name: RWP Button
Description: A simple button widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Button_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-button',
            __( 'RWP Button', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple button widget', 'recommendwp-widgets' ),
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
        	'text' => array(
        		'type' => 'text',
        		'label' => __( 'Button text', 'recommendwp-widgets' ),
        	),
        	'class' => array(
        		'type' => 'text',
        		'label' => __( 'Button class', 'recommendwp-widgets' ),
    		),
			'url' => array(
				'type' => 'link',
				'label' => __( 'URL', 'recommendwp-widgets' )
			),
			'target' => array(
				'type' => 'select',
				'label' => __( 'Target', 'recommendwp-widgets' ),
				'default' => '_self',
				'options' => array(
					'_self' => 'Self',
					'_blank' => 'Blank'
				)
			),
        	'settings' => array(
        		'type' => 'section',
        		'label' => __( 'Button Settings', 'recommendwp-widgets' ),
        		'hide' => true,
        		'fields' => array(
        			'design' => array(
        				'type' => 'select',
        				'label' => __( 'Design', 'recommendwp-widgets' ),
        				'options' => array(
        					'flat' => __( 'Flat', 'recommendwp-widgets' ),
        					'wire' => __( 'Wire', 'recommendwp-widgets' ),
        					'rounded' => __( 'Rounded', 'recommendwp-widgets' ),
                            'none' => __( 'None', 'recommendwp-widgets' )
        				),
        				'default' => 'rounded'
        			),
        			'background' => array(
        				'type' => 'color',
        				'label' => __( 'Background color', 'recommendwp-widgets' ),
        			),
        			'background_hover' => array(
        				'type' => 'color',
        				'label' => __( 'Background hover color', 'recommendwp-widgets' )
        			),
					'text_size' => array(
						'type' => 'number',
						'label' => __( 'Text size', 'recommendwp-widgets' ),
						'default' => '16'
					),
        			'text_color' => array(
        				'type' => 'color',
        				'label' => __( 'Text color', 'recommendwp-widgets' ),
        				'default' => '#fff'
        			),
        			'text_hover' => array(
        				'type' => 'color',
        				'label' => __( 'Text hover color', 'recommendwp-widgets' ),
        				'default' => '#fff'
        			),
        			'border' => array(
        				'type' => 'number',
        				'label' => __( 'Border Size', 'recommendwp-widgets' ),
        				'default' => '1'
        			),
        			'border_radius' => array(
        				'type' => 'number',
        				'label' => __( 'Border radius', 'recommendwp-widgets' ),
        				'default' => '3'
        			),
					'padding' => array(
						'type' => 'number',
						'label' => __( 'Top &amp; Bottom Padding', 'recommendwp-widgets' ),
						'default' => ''
					),
					'width' => array(
						'type' => 'number',
						'label' => __( 'Width', 'recommendwp-widgets' )
					)
        		)
        	),
        	'icon' => array(
        		'type' => 'section',
        		'label' => __( 'Icon settings', 'recommendwp-widgets' ),
        		'hide' => true,
        		'fields' => array(
        			'icon' => array(
        				'type' => 'icon',
        				'label' => __( 'Button icon', 'recommendwp-widgets' )
        			),
        			'size' => array(
        				'type' => 'number',
        				'label' => __( 'Icon size', 'recommendwp-widgets' ),
        				'default' => '16'
        			),
					'color' => array(
						'type' => 'color',
						'label' => __( 'Color', 'recommendwp-widgets' ),
						'default' => '#fff'
					),
					'color_hover' => array(
						'type' => 'color',
						'label' => __( 'Color hover', 'recommendwp-widgets' ),
						'default' => '#fff'
					),
        			'position' => array(
        				'type' => 'select',
        				'label' => __( 'Icon position', 'recommendwp-widgets' ),
        				'default' => 'left',
        				'options' => array(
        					'left' => __( 'Left', 'recommendwp-widgets' ),
        					'right' => __( 'Rigt', 'recommendwp-widgets' )
        				)
        			)
        		)
        	),
        );
    }

	function get_template_variables( $instance, $args ) {
		// $variables = array();
		$variables = array(
			'title' => $instance['text'],
			'class' => $instance['class'],
			'target' => $instance['target'],
			'url' => $instance['url'],
			'design' => $instance['settings']['design'],
			'background' => $instance['settings']['background'],
			'background_hover' => $instance['settings']['background_hover'],
			'text_color' => $instance['settings']['text_color'],
			'text_hover' => $instance['settings']['text_hover'],
            'text_size' => $instance['settings']['text_size'],
			'border' => $instance['settings']['border'],
			'border_radius' => $instance['settings']['border_radius'],
			'padding' => $instance['settings']['padding'],
			'width' => $instance['settings']['width'],
			'icon' => $instance['icon']['icon'],
			'icon_size' => $instance['icon']['size'],
            'icon_color' => $instance['icon']['color'],
			'icon_position' => $instance['icon']['position'],
            'popup_id' => $instance['popup']['id'],
            'popup_type' => $instance['popup']['type'],
            'popup_content' => $instance['popup']['content']
		);

		return $variables;
	}

    function get_template_name( $instance ) {
		return 'default';
    }

    function get_style_name( $instance ) {
		switch( $instance['settings']['design'] ) {
			case 'rounded':
			default:
				return 'default';
				break;
			case 'flat':
				return 'flat';
				break;
			case 'wire':
				return 'wire';
				break;
            case 'none':
                return '';
                break;
		}
    }

	function get_less_variables( $instance ) {
		return array(
			'background' => $instance['settings']['background'],
			'background_hover' => $instance['settings']['background_hover'],
			'text_color' => $instance['settings']['text_color'],
			'text_hover' => $instance['settings']['text_hover'],
			'text_size' => $instance['settings']['text_size'] . 'px',
			'border' => $instance['settings']['border'] . 'px',
			'border_radius' => $instance['settings']['border_radius'] . 'px',
			'padding' => $instance['settings']['padding'] . 'px',
			'width' => $instance['settings']['width'] . 'px',
			'icon' => $instance['icon']['icon'],
			'icon_size' => $instance['icon']['size'] . 'px',
            'icon_color' => $instance['icon']['color'],
            'icon_hover' => $instance['icon']['color_hover'],
			'icon_position' => $instance['icon']['position'],
            'text_size' => $instance['settings']['text_size'] . 'px'
		);
	}

    function modify_instance( $instance ) {
        if ( empty( $instance['text'] ) ) {
            if ( isset( $instance['title'] ) ) $instance['text'] = $instance['title'];

            unset( $instance['title'] );
        }
        return $instance;
    }
}

siteorigin_widget_register( 'rwpw-button', __FILE__, 'RWP_Button_Widget' );