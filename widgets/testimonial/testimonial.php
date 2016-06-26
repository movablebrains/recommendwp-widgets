<?php
/*
Widget Name: Testimonial
Description: A simple image carousel widget.
Author: RecommendWP
Author URI: http://www.recommendwp.com
*/

class Testimonial_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rwpw-testimonial',
            __( 'Testimonial', 'rwpw' ),
            array(
                'description' => __( 'A simple image carousel widget', 'rwpw' ),
                'help' => ''
            ),
            array(

            ),
            array(
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'rwpw'),
					'default' => ''
				),
				'testimonial_settings' => array(
					'type' => 'section',
					'label' => __( 'Testimonial Settings', 'rwpw' ),
					'hide' => true,
					'fields' => array(
						'numpost' => array(
							'type' => 'number',
							'label' => __( 'Number of testimonial to show', 'rwpw' ),
							'default' => 3
						),
						'order' => array(
							'type' => 'select',
							'label' => __( 'Sort Order', 'rwpw' ),
							'options' => array(
								'ASC' => __( 'Ascending', 'rwpw' ),
								'DESC' => __( 'Descending', 'rwpw' ),
							),
							'default' => 'ASC'
						),
						'orderby' => array(
							'type' => 'select',
							'label' => __( 'Sort by', 'rwpw' ),
							'options' => array(
								'title' => __( 'Title', 'rwpw' ),
								'date' => __( 'Date', 'rwpw' ) 
							),
							'default' => 'date'
						),
						'imagex' => array(
							'type' => 'number',
							'label' => __( 'Image Width', 'rwpw' ),
							'default' => ''
						),
						'imagey' => array(
							'type' => 'number',
							'label' => __( 'Image Height(optional)', 'rwpw' ),
							'default' => ''
						),
					)
				),
				'slider_options' => array(
					'type' => 'section',
					'label' => __( 'Slideshow Settings', 'rwpw' ),
					'hide' => true,
					'fields' => array(
						'class' => array(
							'type' => 'text',
							'label' => __( 'Class', 'rwpw' ),
							'default' => ''
						),
						'slides' => array(
							'type' => 'number',
							'default' => 4,
							'label' => __( 'Slides', 'rwpw' )
						),
						'slides_tablet' => array(
							'type' => 'number',
							'default' => 3,
							'label' => __( 'Slides Tablet', 'rwpw' )
						),
						'slides_mobile' => array(
							'type' => 'number',
							'default' => 1,
							'label' => __( 'Slides Tablet', 'rwpw' )
						),
						'margin' => array(
							'type' => 'number',
							'default' => 0,
							'label' => __( 'Slide margin', 'rwpw' ),
						),
						'duration' => array(
							'type' => 'number',
							'default' => 250,
							'label' => __( 'Duration', 'rwpw' ),
						),
						'speed' => array(
							'type' => 'number',
							'default' => 250,
							'label' => __( 'Speed', 'rwpw' ),
						),
						'autoplay' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autoplay?', 'rwpw' ),
						),
						'navigation' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Display navigation?', 'rwpw' ),
						),
						'pagination' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Display pagination?', 'rwpw' ),
						),
						'autoheight' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autoheight?', 'rwpw' ),
						),
						'autowidth' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Enable autowidth?', 'rwpw' ),
						),
						'center' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => __( 'Center item', 'rwpw' ),
						),
						'mergefit' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __( 'Fit merged items?', 'rwpw' ),
						),
						'loop' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => __( 'Loop items?', 'rwpw' )
						)
					)
				),
				'template' => array(
					'type' => 'select',
					'label' => __( 'Choose template', 'rwpw' ),
					'options' => array(
						'basic' => __( 'Basic', 'rwpw' ),
					)
				)
			),

            plugin_dir_path( __FILE__ ) . 'widgets'
        ); 
    }

    function get_template_name( $instance ) {
        return 'testimonial-template';
    }

    function get_style_name( $instance ) {
        return '';
    }
}

siteorigin_widget_register( 'rwpw-testimonial', __FILE__, 'Testimonial_Widget' );