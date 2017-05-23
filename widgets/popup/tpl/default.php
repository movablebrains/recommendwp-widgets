<?php
$classes = array();
$classes[] = 'mfp-hide';
$classes[] = 'rwpw-popup-content';
$classes[] = $class;

$styles = array();
$styles['width'] = $width;
$styles['background'] = $background;

$attr = array(
    'class' => implode( ' ', $classes ),
    'id' => $id,
    'style' => implode('; ', array_map( function ( $v, $k ) { return $k . ':' . $v; }, $styles, array_keys( $styles ) ) )
); ?>

<div <?php foreach( $attr as $key => $value ) echo $key . '="' . $value . '"'; ?>>
    <div class="popup-container">
        <?php if ( $display_title == true ) { ?>    
            <?php if ( $title ) echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title']; ?>
        <?php } ?>
        <div class="popup-wrapper">
            <?php if ( $display_image == true ) { ?>
                <div class="popup-image">
                    <?php $this->sub_widget( 'RWP_Image_Widget', $args, $instance['image'] ); ?>
                </div>
            <?php } ?>
            <?php if ( $display_content == true ) { ?>
                <div class="popup-content">
                    <?php $this->sub_widget( 'SiteOrigin_Widget_Editor_Widget', $args, $instance['content'] ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>