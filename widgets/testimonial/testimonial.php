<?php
/*
Widget Name: RWP Testimonial
Description: A simple testimonial widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Testimonial_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-testimonial',
            __( 'RWP Testimonial', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple image carousel widget', 'recommendwp-widgets' ),
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
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'recommendwp-widgets'),
				'default' => ''
			),
			'class' => array(
				'type' => 'text',
				'label' => __( 'Class', 'recommendwp-widgets' )
			),
			'post' => array(
				'type' => 'section',
				'label' => __( 'Testimonial Settings', 'recommendwp-widgets' ),
				'hide' => true,
				'fields' => array(
					'numpost' => array(
						'type' => 'number',
						'label' => __( 'Number of testimonial to show', 'recommendwp-widgets' ),
						'default' => 3
					),
					'order' => array(
						'type' => 'select',
						'label' => __( 'Sort Order', 'recommendwp-widgets' ),
						'options' => array(
							'ASC' => __( 'Ascending', 'recommendwp-widgets' ),
							'DESC' => __( 'Descending', 'recommendwp-widgets' ),
						),
						'default' => 'ASC'
					),
					'orderby' => array(
						'type' => 'select',
						'label' => __( 'Sort by', 'recommendwp-widgets' ),
						'options' => array(
							'title' => __( 'Title', 'recommendwp-widgets' ),
							'date' => __( 'Date', 'recommendwp-widgets' )
						),
						'default' => 'date'
					),
					'imagex' => array(
						'type' => 'number',
						'label' => __( 'Image Width', 'recommendwp-widgets' ),
						'default' => ''
					),
					'imagey' => array(
						'type' => 'number',
						'label' => __( 'Image Height(optional)', 'recommendwp-widgets' ),
						'default' => ''
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
    		'numpost' => $instance['post']['numpost'],
    		'title' => $instance['title'],
    		'class' => $instance['class'],
    		'order' => $instance['post']['order'],
    		'orderby' => $instance['post']['orderby'],
    		'width' => $instance['post']['imagex'],
    		'height' => $instance['post']['imagey'],
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
			'slides_tablet' => $instance['responsive']['tablet']
    	);
    }
}

siteorigin_widget_register( 'rwpw-testimonial', __FILE__, 'RWP_Testimonial_Widget' );
