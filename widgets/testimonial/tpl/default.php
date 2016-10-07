<?php
if ( $title ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$widget_id = $args['widget_id'];
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

$attributes = array();

$classes = array();
$classes[] = 'rwpw-testimonial';
$classes[] = 'owl-carousel';
$classes[] = 'owl-theme';
$classes[] = $class;

$attributes = array(
    'class' => esc_attr( implode( ' ', $classes ) ),
    'id' => 'testimonial-' . (int)$widget_id,
    'data-instance' => (int)$widget_id
); ?>

<?php $post_args = array(
    'post_type' => 'testimonial',
    'posts_per_page' => $numpost,
    'order' => $order,
    'orderby' => $orderby
);

$vars = array(
    'id' => 'testimonial-' . (int)$widget_id,
    'items' => (int)$slides,
    'margin' => (int)$margin,
    'duration' => (int)$duration,
    'speed' => (int)$speed,
    'autoplay' => $autoplay == true ? "true" : "false",
    'navigation' => $navigation == true ? "true" : "false",
    'pagination' => $pagination == true ? "true" : "false",
    'autowidth' => $autowidth == true ? "true" : "false",
    'autoheight' => $autoheight == true ? "true" : "false",
    'center' => $center == true ? "true" : "false",
    'mergefit' => $mergefit == true ? "true" : "false",
    'loop' => $loop == true ? "true" : "false",
    'slidesMobile' => (int)$slides_mobile,
    'slidesTablet' => (int)$slides_tablet
);

$loop = new WP_Query( $post_args ); ?>

<?php if ( $loop->have_posts() ) : ?>
    <?php 
    wp_enqueue_script( 'rwpw-owl-carousel-js' );
    wp_enqueue_script( 'rwpw-widgets-js' ); 
    wp_localize_script('rwpw-widgets-js', 'testimonial' . $widget_id, $vars ); 
    ?>

    <div <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?>>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
            $thumb_url = $thumb_url_array[0];
            $image = rwpw_thumb( $thumb_url, $width, $height ); ?>
        <div class="testimonial-wrapper">
            <div class="testimonial-copy">
                <?php if ( $image ) : ?>
                    <div class="testimonial-image">
                        <img src="<?php echo $image; ?>" alt="" />
                    </div>
                <?php endif; ?>
                <div class="testimonial-content">
                    <?php echo wpautop( get_the_content(), false); ?>
                    <?php echo '<h4>' . apply_filters( 'rwpw_testimonial_title', get_the_title(), $postid ) . '</h4>'; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    
    <?php else : ?>
        <?php echo __( 'No testimonials found.', 'recommendwp-widgets' ); ?>
    
    </div>
    <?php endif; ?>