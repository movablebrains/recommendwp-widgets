## RecommendWP Widgets

RecommendWP Widgets is a collection of widgets that uses the SiteOrigin Widgets API.

## Installation

1. Download latest release from [GitHub](https://github.com/RecommendWP/recommendwp-widgets/releases) repository.
2. Extract and rename it to `recommendwp-widgets`.
3. Copy or move the folder to your `plugins` folder.
4. Activate. [SiteOrigin Widgets Bundle](https://wordpress.org/plugins/so-widgets-bundle/) must be installed and activated first.

## Features

1. SiteOrigin Widgets API
2. Developer-friendly(plugin provides minimal styles)
    - Use your own style
    - Use your own widget template
3. Call-to-Action Widget
4. Features Widget
5. Button Widget
6. Image Widget
7. List Widget
8. Image Carousel Widget
9. Side Image Widget
10. Testimonial Widget
11. More to come...

## Adding your own widget template

```php
<?php
add_filter( 'siteorigin_widgets_form_options_rwpw-cta', 'coach_extend_cta_form', 10, 2 );
function coach_extend_cta_form( $form_options, $widget ) {
	if ( !empty( $form_options['settings']['fields']['design']['options'] ) ) {
		$form_options['settings']['fields']['design']['options']['side-image'] = __( 'Side Image', 'coach-template' );
	}

	return $form_options;
}
```

```php
<?php
add_filter( 'siteorigin_widgets_template_file_rwpw-cta', 'coach_extend_cta_template', 10, 3 );
function coach_extend_cta_template( $filename, $instance, $widget ) {
	if( !empty($instance['settings']['design']) && $instance['settings']['design'] == 'side-image' ) {
        $filename = CHILD_DIR . '/lib/templates/side-image.php'; 
    }

    return $filename;
}
```

### Example Template

```php
<div class="cta-widget">
	<div class="cta-wrapper">
		<?php if ( $display_image == true ) { ?>
			<div class="cta-image">
				<?php $this->sub_widget( 'RWP_Image_Widget', $args, $instance['image'] ); ?>
			</div>
		<?php } ?>
        <div class="cta-content">
            <div class="cta-text">
                <?php echo $headline ? '<h4>'.$headline.'</h4>' : ''; ?>
                <?php echo $content ? wpautop( $content, false ) : ''; ?>
            </div>
            <?php if ( $display_button == true ) { ?>
                <div class="cta-button">
                    <?php $this->sub_widget( 'RWP_Button_Widget', $args, $instance['button'] ); ?>
                </div>
            <?php } ?>
        </div>
	</div>
</div>
```

You can see more options by visiting SiteOrigin's developer [docs](https://siteorigin.com/docs/widgets-bundle/advanced-concepts/filters/form-options/).