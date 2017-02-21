<div class="headline-widget">
	<?php if ( $title ) {
		echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
	} ?>
	<?php if ( $subtitle ) {
		echo '<p class="subtitle">' . apply_filters( 'rwpw_subtitle', $subtitle ) . '</p>';
	} ?>
</div>