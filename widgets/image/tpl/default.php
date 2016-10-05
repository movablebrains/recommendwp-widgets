<?php
if ( $title ) {
	echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$classes = array();
$classes[] = $class;
$classes[] = 'img-responsive';
$classes[] = $alignment;

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['alt'] = $alt;
if ( $id ) {
	$attributes['id'] = $id;
}

// var_dump( $image );
// $attachment = wp_get_attachment_image_src( $image, 'full' );
if ( $image ) {
	$attachment = wp_get_attachment_image_src( $image, 'full' );
	$attributes['src'] = rwpw_thumb( $attachment[0], $width, $height, true );
}
?>
<div class="image-widget">
	<?php echo $autop == true ? wpautop( $before, false ) : $before; ?>
	<?php echo $url ? '<a href="'.sow_esc_url( $url ).'" title="'.$title.'">' : ''; ?>
		<img <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?> />
	<?php echo $url ? '</a>' : ''; ?>
	<?php echo $autop == true ? wpautop( $after, false ) : $after; ?>
</div>