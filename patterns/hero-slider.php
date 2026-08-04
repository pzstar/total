<?php
/**
 * Title: Hero Banner
 * Slug: total/hero-slider
 * Categories: total, banner, featured
 * Description: A full width hero banner with a heading, supporting text and two buttons, mirroring the Total front page slider.
 * Keywords: hero, banner, slider, cover, header
 * Viewport Width: 1400
 *
 * @package Total
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.jpg","dimRatio":50,"overlayColor":"dark","minHeight":600,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"20px","right":"20px"}}}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-right:20px;padding-bottom:120px;padding-left:20px;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-dark-background-color has-background-dim"></span><img class="wp-block-cover__image-background" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.jpg" data-object-fit="cover" alt="" /><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"2px"}},"textColor":"white"} -->
<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="letter-spacing:2px;text-transform:uppercase"><?php echo esc_html__('Build Something Remarkable', 'total'); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"fontSize":"1.2em"}}} -->
<p class="has-text-align-center has-white-color has-text-color" style="font-size:1.2em"><?php echo esc_html__('A clean, flexible starting point for your business, portfolio or shop. Everything you see here is editable in the block editor.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"backgroundColor":"accent","textColor":"dark"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-dark-color has-accent-background-color has-text-color has-background wp-element-button"><?php echo esc_html__('Get Started', 'total'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"white"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button"><?php echo esc_html__('Learn More', 'total'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
