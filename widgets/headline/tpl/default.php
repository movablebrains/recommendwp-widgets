<?php
$classes = array();
$classes[] = 'headline-widget';
$classes[] = $class;

$attributes = array();
$attributes['class'] = esc_attr( implode( ' ', $classes ) );
?>

<div <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?>>
	<?php if ( $title ) {
		echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
	} ?>
	<?php if ( $subtitle ) {
		echo '<p class="subtitle">' . apply_filters( 'rwpw_subtitle', $subtitle ) . '</p>';
	} ?>
</div>