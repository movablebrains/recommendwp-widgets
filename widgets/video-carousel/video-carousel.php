<?php
/*
Widget Name: RWP Video Carousel
Description: A simple video carousel widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class Video_Carousel_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-video-carousel',
            __( 'RWP Video Carousel', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple video carousel widget', 'recommendwp-widgets' ),
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
			'videos' => array(
				'type' => 'repeater',
				'label' => __('Add Videos', 'recommendwp-widgets'),
				'item_name' => __('Video', 'recommendwp-widgets'),
				'item_label' => array(
					'selector' => "[id*='video']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
					'video' => array(
						'type' => 'link',
                        'label' => __( 'Video Link', 'recommendwp-widgets' )
					)
				)
			),
			'settings' => array(
				'type' => 'section',
				'label' => __( 'Video Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'videox' => array(
						'type' => 'number',
						'label' => __( 'Video Width', 'recommendwp-widgets' ),
						'default' => '860'
					),
					'videoy' => array(
						'type' => 'number',
						'label' => __( 'Video Height', 'recommendwp-widgets' ),
						'default' => '480'
					),
				)
			),
			'slideshow' => array(
				'type' => 'section',
				'label' => __( 'Slideshow Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'slides' => array(
						'type' => 'number',
						'default' => 1,
						'label' => __( 'Slides', 'gss' )
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
						'default' => true,
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
						'default' => false,
						'label' => __( 'Fit merged items?', 'gss' ),
					),
					'loop' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __( 'Loop items?', 'gss' )
					)
				)
			),
			'responsive' => array(
				'type' => 'section',
				'label' => __( 'Responsive Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'mobile' => array(
						'type' => 'number',
						'label' => __( 'Slides for mobile', 'recommendwp-widgets' ),
						'default' => 1
					),
					'tablet' => array(
						'type' => 'number',
						'label' => __( 'Slides for tablets', 'recommendwp-widgets' ),
						'default' => 1
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

    function get_style_name( $instance ) {
        return false;
    }

	function get_template_variables( $instance, $args ) {
		return array(
    		'title' => $instance['title'],
    		'class' => $instance['class'],
    		'template' => $instance['template'],
			'slides' => $instance['slideshow']['slides'],
			'margin' => $instance['slideshow']['margin'],
			'duration' => $instance['slideshow']['duration'],
			'speed' => $instance['slideshow']['speed'],
			'autoplay' => $instance['slideshow']['autoplay'],
			'navigation' => $instance['slideshow']['navigation'],
			'pagination' => $instance['slideshow']['pagination'],
			'autowidth' => $instance['slideshow']['autowidth'],
			'autoheight' => $instance['slideshow']['autoheight'],
			'center' => $instance['slideshow']['center'],
			'mergefit' => $instance['slideshow']['mergefit'],
			'loop' => $instance['slideshow']['loop'],
			'slides_mobile' => $instance['responsive']['mobile'],
			'slides_tablet' => $instance['responsive']['tablet'],
			'videox' => $instance['settings']['videox'],
			'videoy' => $instance['settings']['videoy']
    	);
	}
}

siteorigin_widget_register( 'rwpw-video-carousel', __FILE__, 'Video_Carousel_Widget' );