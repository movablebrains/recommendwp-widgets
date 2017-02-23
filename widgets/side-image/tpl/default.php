<?php
$imagesource = wp_get_attachment_image_src( $image, $size );
$url = esc_url( $imagesource[0] );
$classes = array();
$classes[] = 'side-image';
$classes[] = 'side-image-' . $template;
?>
<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php if ( $display_image == true ) { ?>
	<div class="images-wrapper" style="background-image: url(<?php echo $url; ?>)">

	</div>
	<?php } ?>
	<div class="side-image-content">
		<?php if ( $display_content == true ) { ?>
			<?php $this->sub_widget('SiteOrigin_Widget_Editor_Widget', $args, $instance['editor']) ?>
		<?php } ?>
		<?php if ( $display_button == true ) { ?>
			<div class="side-image-button">
				<?php $this->sub_widget( 'RWP_Button_Widget', $args, $instance['button'] ); ?>
			</div>
		<?php } ?>
	</div>
</div>