<?php
$title = $instance['title'];

if ( $title ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$widget_id = $args['widget_id'];

$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

echo '<div class="list-widget">';
    $lists = $instance['lists'];

    $classes = array();

    $classes[] = 'rwpw-list';
    $classes[] = $instance['class'];

    $attr = array(
        'id' => 'list-' . (int)$widget_id,
        'class' => esc_attr( implode( ' ', $classes ) ),
        'data-instance' => (int)$widget_id
    );

    if ( is_array( $lists ) && !is_wp_error( $lists ) ) { ?>
        <ul <?php foreach( $attr as $name => $value ) echo $name . '="' . $value . '" ' ?>>
            <?php foreach( $lists as $list ) { ?>
                <li>
                    <div class="list-wrapper">
                        <?php if( !empty( $icon_image ) ) {
                            $attachment = wp_get_attachment_image_src( $icon_image, 'full' );
                            $image = rwpw_thumb( $attachment[0], $width, $height, true );
                            echo '<div class="list-image"><img src="'.$image.'" alt="Icon" /></div>';
                        } ?>
                        <div class="list-content">
                            <?php 
                            $title = $list['title'];
                            $content = $list['content'];
                            echo $title ? '<h4 class="list-title">'.$title.'</h4>' : '';
                            echo $content ? wpautop( do_shortcode( $content ), true ) : '';
                            ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php }
echo '</div>';