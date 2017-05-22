<div class="cta-widget">
	<div class="cta-wrapper">
		<?php if ( $display_image == true ) { ?>
			<div class="cta-image">
				<?php $this->sub_widget( 'RWP_Image_Widget', $args, $instance['image'] ); ?>
			</div>
		<?php } ?>
		<div class="cta-text">
			<?php 
				if ( $title ) {
					echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
				}
			?>
			
			<?php if ( $subtitle ) {
				echo '<p class="subtitle">' . wp_kses_post( $subtitle ) . '</p>';
			} ?>

			<?php if ( $display_content == true ) { ?>
				<?php echo wp_kses_post( $content ); ?>
			<?php } ?>
		</div>
		<?php if ( $display_button == true ) { ?>
			<div class="cta-button">
				<?php $this->sub_widget( 'RWP_Button_Widget', $args, $instance['button'] ); ?>
			</div>
		<?php } ?>
	</div>
</div>