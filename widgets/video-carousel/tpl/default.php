<?php
$title = $instance['title'];

if ( $title ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$widget_id = $args['widget_id'];

$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

echo '<div class="video-carousel-widget">';
    $videos = $instance['videos'];
    $options = $instance['slideshow'];
    $videoattr = $instance['video_settings'];

    $classes = array();

    $classes[] = 'rwpw-video-carousel';
    $classes[] = 'owl-carousel';
    $classes[] = 'owl-theme';
    $classes[] = $options['class'] ? ' ' . $options['class'] : '';

    $attr = array(
        'id' => 'video-carousel-' . (int)$widget_id,
        'class' => esc_attr( implode( ' ', $classes ) ),
        'data-instance' => (int)$widget_id
    );

    $attributes = array();
        
    $attributes['items'] = (int) $slides;

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
    $attributes['id'] = 'video-carousel-' . (int) $widget_id;
    $attributes['slidesmobile'] =  $slides_mobile ? (int) $slides_mobile : (int) $slides;
    $attributes['slidestablet'] = $slides_tablet ? (int) $slides_tablet : (int) $slides;
    $attributes['loop'] = $options['loop'] == true ? 'true' : 'false';
    $attributes['videox'] = (int) $videox;
    $attributes['videoy'] = (int) $videoy;

    wp_enqueue_script( 'rwpw-owl-carousel-js' );
    wp_enqueue_script( 'rwpw-widgets-js' );
    wp_localize_script( 'rwpw-widgets-js', 'videocarousel' . (int)$widget_id, $attributes );

    if ( is_array( $videos ) && !is_wp_error( $videos ) ) { ?>
        <div <?php foreach( $attr as $name => $value ) echo $name . '="' . $value . '" ' ?>>
            <?php
            $counter = 0;
            foreach ( $videos as $video ) {
                //* Get the video
                $videosource = $video['video'];
                
                if ( $videosource ) {
                    echo '<div class="item-video" data-merge="'.$counter.'">';
                        echo '<a class="owl-video" href="'.$videosource.'"></a>';
                    echo '</div>';
                }
                $counter++;
            } ?>
        </div>
    <?php }
echo '</div>';