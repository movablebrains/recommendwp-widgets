<?php
/*
Widget Name: RecommendWP Testimonial
Description: A simple testimonial widget using Owl Carousel.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class RWP_Testimonial_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-testimonial',
            __( 'RecommendWP Testimonial', 'recommendwp-widgets' ),
            array(
                'description' => __( 'A simple image carousel widget', 'recommendwp-widgets' ),
                'help' => ''
            ),
            array(

            ),
            array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'recommendwp-widgets'),
					'default' => ''
				),
				'testimonial_settings' => array(
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
				'slider_options' => array(
					'type' => 'section',
					'label' => __( 'Slideshow Settings', 'recommendwp-widgets' ),
					'hide' => true,
					'fields' => array(
						'class' => array(
							'type' => 'text',
							'label' => __( 'Class', 'recommendwp-widgets' ),
							'default' => ''
						),
						'slides' => array(
							'type' => 'number',
							'default' => 4,
							'label' => __( 'Slides', 'recommendwp-widgets' )
						),
						'slides_tablet' => array(
							'type' => 'number',
							'default' => 3,
							'label' => __( 'Slides Tablet', 'recommendwp-widgets' )
						),
						'slides_mobile' => array(
							'type' => 'number',
							'default' => 1,
							'label' => __( 'Slides Tablet', 'recommendwp-widgets' )
						),
						'margin' => array(
							'type' => 'number',
							'default' => 0,
							'label' => __( 'Slide margin', 'recommendwp-widgets' ),
						),
						'duration' => array(
							'type' => 'number',
							'default' => 250,
							'label' => __( 'Duration', 'recommendwp-widgets' ),
						),
						'speed' => array(
							'type' => 'number',
							'default' => 250,
							'label' => __( 'Speed', 'recommendwp-widgets' ),
						),
						'autoplay' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autoplay?', 'recommendwp-widgets' ),
						),
						'navigation' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Display navigation?', 'recommendwp-widgets' ),
						),
						'pagination' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Display pagination?', 'recommendwp-widgets' ),
						),
						'autoheight' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autoheight?', 'recommendwp-widgets' ),
						),
						'autowidth' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autowidth?', 'recommendwp-widgets' ),
						),
						'center' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Center item', 'recommendwp-widgets' ),
						),
						'mergefit' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __( 'Fit merged items?', 'recommendwp-widgets' ),
						),
						'loop' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __( 'Loop items?', 'recommendwp-widgets' )
						)
					)
				),
				'template' => array(
					'type' => 'select',
					'label' => __( 'Choose template', 'recommendwp-widgets' ),
					'options' => array(
						'no-image' => __( 'No featured image', 'recommendwp-widgets' ),
						'top-image' => __( 'Featured image on top', 'recommendwp-widgets' ),
						'bottom-image' => __( 'Featured image on bottom', 'recommendwp-widgets' ),
						'left-image' => __( 'Featured image on left', 'recommendwp-widgets' )
					),
					'default' => 'no-image'
				)
			),

            plugin_dir_path( __FILE__ ) . 'widgets'
        ); 
    }

    function get_template_name( $instance ) {
        return 'default';
    }

    function get_style_name( $instance ) {
        return 'default';
    }
}

siteorigin_widget_register( 'rwpw-testimonial', __FILE__, 'RWP_Testimonial_Widget' );