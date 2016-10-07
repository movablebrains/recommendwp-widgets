<?php
/*
Widget Name: RWP Image Carousel
Description: A simple image carousel widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class Image_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-image-carousel',
            __( 'Image Carousel', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple image carousel widget', 'recommendwp-widgets' ),
                'help' => ''
            ),
            array(

            ),
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
			'slider_options' => array(
				'type' => 'section',
				'label' => __( 'Slideshow Settings', 'gss' ),
				'hide' => true,
				'fields' => array(
					'class' => array(
						'type' => 'text',
						'label' => __( 'Class', 'gss' ),
						'default' => ''
					),
					'slides' => array(
						'type' => 'number',
						'default' => 4,
						'label' => __( 'Slides', 'gss' )
					),
					'slides_tablet' => array(
						'type' => 'number',
						'default' => 3,
						'label' => __( 'Slides Tablet', 'gss' )
					),
					'slides_mobile' => array(
						'type' => 'number',
						'default' => 1,
						'label' => __( 'Slides Tablet', 'gss' )
					),
					'margin' => array(
						'type' => 'number',
						'default' => 0,
						'label' => __( 'Slide margin', 'gss' ),
					),
					'duration' => array(
						'type' => 'number',
						'default' => 250,
						'label' => __( 'Duration', 'gss' ),
					),
					'speed' => array(
						'type' => 'number',
						'default' => 250,
						'label' => __( 'Speed', 'gss' ),
					),
					'autoplay' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autoplay?', 'gss' ),
					),
					'navigation' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Display navigation?', 'gss' ),
					),
					'pagination' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Display pagination?', 'gss' ),
					),
					'autoheight' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autoheight?', 'gss' ),
					),
					'autowidth' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Enable autowidth?', 'gss' ),
					),
					'center' => array(
						'type' => 'checkbox',
						'default' => false,
						'label' => __( 'Center item', 'gss' ),
					),
					'mergefit' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __( 'Fit merged items?', 'gss' ),
					),
					'loop' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __( 'Loop items?', 'gss' )
					)
				)
			),
			'image_settings' => array(
				'type' => 'section',
				'label' => __( 'Image Settings', 'gss' ),
				'hide' => true,
				'fields' => array(
					'imagex' => array(
						'type' => 'number',
						'label' => __( 'Image Width', 'gss' ),
						'default' => ''
					),
					'imagey' => array(
						'type' => 'number',
						'label' => __( 'Image Height(optional)', 'gss' ),
						'default' => ''
					),
				)
			),
			'images' => array(
				'type' => 'repeater',
				'label' => __('Add Images', 'recommendwp-widgets'),
				'item_name' => __('Image', 'recommendwp-widgets'),
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
					'alt' => array(
						'type' => 'text',
						'label' => __( 'Alt text', 'recommendwp-widgets' ),
						'default' => ''
					),
					'link' => array(
						'type' => 'text',
						'label' => __('Image link', 'recommendwp-widgets'),
						'default' => ''
					)
				)
			)
		);
	}

    function get_template_name( $instance ) {
        return 'default';
    }

    function get_style_name( $instance ) {
        return '';
    }

	function get_template_variables( $instance, $args ) {

	}
}

siteorigin_widget_register( 'rwpw-image-carousel', __FILE__, 'Image_Carousel_Widget' );