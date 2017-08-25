<?php
/*
Widget Name: RWP Image
Description: A simple image widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rwpw-image',
			__( 'RWP Image', 'recommendwp-widgets' ),
			array(
				'description' => __( 'A simple image widget.', 'recommendwp-widgets' ),
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
			'image' => array(
				'type' => 'media',
				'label' => __('Choose an image', 'recommendwp-widgets'),
				'choose' => __('Choose image', 'recommendwp-widgets'),
				'update' => __('Set image', 'recommendwp-widgets'),
				'library' => 'image'
			),
			'settings' => array(
				'type' => 'section',
				'label' => __( 'Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'width' => array(
						'type' => 'number',
						'label' => __( 'Width', 'recommendwp-widgets' ),
						'default' => ''
					),
					'height' => array(
						'type' => 'number',
						'label' => __( 'Height', 'recommendwp-widgets' ),
						'default' => ''
					),
					'alignment' => array(
						'type' => 'select',
						'label' => __( 'Alignment', 'recommendwp-widgets' ),
						'options' => array(
							'alignnone' => 'None',
							'aligncenter' => 'Center',
							'alignright' => 'Right',
							'alignleft' => 'Left'
						),
						'default' => 'alignnone'
					)
				)
			),
			'seo' => array(
				'type' => 'section',
				'label' => __( 'SEO Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'class' => array(
						'type' => 'text',
						'label' => __( 'Class', 'recommendwp-widgets' )
					),
					'alt' => array(
						'type' => 'text',
						'label' => __( 'Alt text', 'recommendwp-widgets' )
					),
					'id' => array(
						'type' => 'text',
						'label' => __( 'ID', 'recommendwp-widgets' )
					)
				)
			),
			'link' => array(
				'type' => 'section',
				'label' => __( 'Image Link', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'url' => array(
						'type' => 'link',
						'label' => __( 'URL', 'recommendwp-widgets' ),
					),
					'title' => array(
						'type' => 'text',
						'label' => __( 'Title', 'recommendwp-widgets' )
					),
					'target' => array(
						'type' => 'checkbox',
						'label' => __( 'Open in new tab', 'recommendwp-widgets' ),
						'default' => false
					),
				)
			),
			'content' => array(
				'type' => 'section',
				'label' => __( 'Before &amp; After Content', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'before' => array(
						'type' => 'textarea',
						'label' => __( 'Before Content', 'recommendwp-widgets' )
					),
					'after' => array(
						'type' => 'textarea',
						'label' => __( 'After Content', 'recommendwp-widgets' )
					),
					'autop' => array(
						'type' => 'checkbox',
						'label' => __( 'Add paragraphs?', 'recommendwp-widgets' ),
						'default' => true
					)
				)
			),
			'template' => array(
				'type' => 'select',
				'label' => __( 'Image Template', 'recommendwp-widgets' ),
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
			'image' => $instance['image'],
			'title' => $instance['title'],
			'width' => $instance['settings']['width'],
			'height' => $instance['settings']['height'],
			'alignment' => $instance['settings']['alignment'],
			'url' => $instance['link']['url'],
			'target' => $instance['link']['target'],
			'url_title' => $instance['link']['title'],
			'class' => $instance['seo']['class'],
			'id' => $instance['seo']['id'],
			'alt' => $instance['seo']['alt'],
			'before' => $instance['content']['before'],
			'after' => $instance['content']['after'],
			'autop' => $instance['content']['autop']
		);
	}
}

siteorigin_widget_register( 'rwpw-image', __FILE__, 'RWP_Image_Widget' );