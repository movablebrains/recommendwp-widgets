<?php
$imagesource = wp_get_attachment_image_src( $image, $size );
$url = esc_url( $imagesource[0] );
?>
<div class="side-image">
	<div class="images-wrapper" style="background-image: url(<?php echo $url; ?>)">

	</div>
	<div class="side-image-content">
		<?php $this->sub_widget('SiteOrigin_Widget_Editor_Widget', $args, $instance['editor']) ?>
	</div>
</div>