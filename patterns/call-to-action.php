<?php
/**
 * Title: Call To Action
 * Slug: total/call-to-action
 * Categories: total, call-to-action, banner
 * Description: A full width band in the accent colour with a heading, a line of supporting text and two buttons.
 * Keywords: cta, call to action, banner, buttons, contact
 * Viewport Width: 1400
 *
 * @package Total
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"70px","bottom":"70px","left":"20px","right":"20px"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-accent-background-color has-background" style="padding-top:70px;padding-right:20px;padding-bottom:70px;padding-left:20px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"margin":{"top":"0"}}},"textColor":"dark"} -->
<h2 class="wp-block-heading has-text-align-center has-dark-color has-text-color" style="margin-top:0;letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Ready To Get Started?', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"dark","style":{"typography":{"fontSize":"1.2em"}}} -->
<p class="has-text-align-center has-dark-color has-text-color" style="font-size:1.2em"><?php echo esc_html__('One clear sentence telling visitors what happens when they click.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"backgroundColor":"dark","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-dark-background-color has-text-color has-background wp-element-button"><?php echo esc_html__('Contact Us', 'total'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"dark"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-dark-color has-text-color wp-element-button"><?php echo esc_html__('View Pricing', 'total'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
