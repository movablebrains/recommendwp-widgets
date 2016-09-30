<?php
$title = $instance['title'];

if ( $title ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$widget_id = $args['widget_id'];

$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

echo '<div class="testimonial-widget">';
    $options = $instance['slider_options'];
    $settings = $instance['testimonial_settings'];

    $classes = array();

    $classes[] = 'rwpw-testimonial';
    $classes[] = 'owl-carousel';
    $classes[] = $options['class'] ? ' ' . $options['class'] : '';

    $attr = array(
        'id' => 'testimonial-' . (int)$widget_id,
        'class' => esc_attr( implode( ' ', $classes ) ),
        'data-instance' => (int)$widget_id
    );

    $attributes = array();
        
    $attributes['items'] = (int) $options['slides'];

    $attributes['navigation'] = $options['navigation'] == true ? 'true' : 'false';
    $attributes['pagination'] = $options['pagination'] == true ? 'true' : 'false';
    $attributes['autoplay'] = $options['autoplay'] == true ? 'true' : 'false';
    $attributes['smartspeed'] = $options['duration'] ? (int) $options['duration'] : '250';
    $attributes['fluidspeed'] = $options['speed'] ? (int) $options['speed'] : '250';
    $attributes['autoheight'] = $options['autoheight'] == true ? 'true' : 'false';
    $attributes['autowidth'] = $options['autowidth'] == true ? 'true' : 'false';
    $attributes['mergefit'] = $options['mergefit'] == true ? 'true' : 'false';
    $attributes['center'] = $options['center'] == true ? 'true' : 'false';
    $attributes['margin'] = $options['margin'];
    $attributes['id'] = 'testimonial-' . (int) $widget_id;
    $attributes['slidesmobile'] = $options['slides_mobile'] ? (int) $options['slides_mobile'] : (int) $slides;
    $attributes['slidestablet'] = $options['slides_tablet'] ? (int) $options['slides_tablet'] : (int) $slides;
    $attributes['loop'] = $options['loop'] == true ? 'true' : 'false';

    wp_enqueue_script( 'recommendwp-widgets-js' );
    wp_localize_script( 'recommendwp-widgets-js', 'testimonial' . (int)$widget_id, $attributes ); ?>
    
      
</div>