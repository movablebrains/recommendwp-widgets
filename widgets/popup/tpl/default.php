<?php
$classes = array();

$classes[] = 'rwpw-popup';
$classes[] = 'popup';
$classes[] = $class;

$widget_id = $args['widget_id'];
$widget_id = preg_replace( '/[^0-9]/', '', $widget_id );

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['id'] = 'popup-' . (int)$widget_id;
$attributes['data-instance'] = (int)$widget_id;

wp_enqueue_script( 'rwpw-magnific-popup-js' );
wp_enqueue_script( 'rwpw-widgets-js' );

$attr = array();

$attr['type'] = $type;
$attr['id'] = 'popup-' . (int)$widget_id;

wp_localize_script( 'rwpw-widgets-js', 'popup' . (int)$widget_id, $attr );

$attrib = array();
$attrib['class'] = 'mfp-hide ' . $id . '-content';
$attrib['id'] = $id;
?>

<div <?php foreach ( $attributes as $key => $value ) echo $key . '="' . $value . '"'; ?>>
	<?php $this->sub_widget( 'RWP_Button_Widget', $args, $instance['button'] ); ?>
</div>

<?php if ( $type == 'inline' ) { ?>
	<div <?php foreach( $attrib as $key => $value ) echo $key . '="' . $value . '"'; ?>>
		<?php $this->sub_widget('SiteOrigin_Widget_Editor_Widget', $args, $instance['content']) ?>
	</div>
<?php } ?>