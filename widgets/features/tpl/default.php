<?php
if ( $title ) {
	echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
}

$classes = array();
$classes[] = 'feature';
$classes[] = 'feature-col-' . $column;

$attributes = array(
	'class' => esc_attr( implode( ' ', $classes ) ),
	'data-width' => $column
);

echo '<div class="features-widget">';
	echo '<ul class="features-wrapper">';
		foreach ( $features as $feature ) {
			$attachment = wp_get_attachment_image_src( $feature['image'], 'full' );
			$icon_image = $feature['icon_image'];
			$icon = $feature['icon'];
			$icon_size = $feature['icon_size'];
			$icon_color = $feature['icon_color'];
			$imgsrc = $attachment[0];
			$headline = $feature['headline'];
			$subheadline = $feature['subheadline'];
			$button_text = $feature['button_text'];
			$button_link = $feature['button_link'];
			?>
			<li <?php foreach( $attributes as $name => $value ) echo $name . '="' . $value . '" ' ?>>
				<div class="feature-content">
					<div class="feature-image">
						<?php if( $icon_image == 'image' ) { ?>
						<?php echo $imgsrc ? '<img src="'.$imgsrc.'" alt="" />' : ''; ?>
						<?php } else { ?>
							<?php if( !empty( $icon ) ) {
								$icon_styles = array();
								if ( !empty( $icon_size ) ) $icon_styles[] = 'font-size:' .intval( $icon_size ). 'px';
								if ( !empty( $icon_color ) ) $icon_styles[] = 'color:' .$icon_color. '';

								echo siteorigin_widget_get_icon( $icon, $icon_styles );
							} ?>
						<?php } ?>
					</div>
					<div class="feature-header">
						<?php echo $headline ? '<h4>'.$headline.'</h4>' : ''; ?>
					</div>
					<div class="feature-copy">
						<?php echo $subheadline ? wpautop( do_shortcode( $subheadline ), false ) : ''; ?>
						<?php echo $button_link ? '<a class="feature-button" href="'.$button_link.'">'.$button_text.'</a>' : ''; ?>
					</div>
				</div>
			</li>
		<?php }
	echo '</ul>';
echo '</div>';