<?php
$classes = array();
$classes[] = 'btn';
$classes[] = 'btn-' . $design;
$classes[] = 'icon-' . $icon_position;
$classes[] = $class;

$attributes = array();

$attributes['class'] = esc_attr( implode( ' ', $classes ) );
$attributes['target'] = esc_attr( $target );
$attributes['href'] = esc_url( $url );
?>

<a <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?>>
    <span class="button-wrap">
	    	<?php if( !empty( $icon ) ) {
	    		$icon_styles = array();
	    		if ( !empty( $icon_size ) ) $icon_styles[] = 'font-size:' .intval( $icon_size ). 'px';
	    		if ( !empty( $icon_color ) ) $icon_styles[] = 'color:' .$icon_color. '';

	    		$icon = siteorigin_widget_get_icon( $icon, $icon_styles );
			} ?>
		<?php if ( 'left' === $icon_position  ) {
			echo $icon;
		} ?>
    	<?php echo esc_html( $title ); ?>

		<?php if ( 'right' === $icon_position ) {
			echo $icon;
		} ?>
	</span>
</a>