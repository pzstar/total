<?php
/**
 * Title: About Us
 * Slug: total/about
 * Categories: total, about, text
 * Description: A two column introduction with a heading, body copy, a button and a supporting image.
 * Keywords: about, intro, company, two columns
 * Viewport Width: 1400
 *
 * @package Total
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('About Us', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"body"} -->
<p class="has-body-color has-text-color"><?php echo esc_html__('Tell your visitors who you are and why they should care. A short, plain paragraph does more work here than a long one, so keep it to the essentials and let the rest of the page fill in the detail.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"body"} -->
<p class="has-body-color has-text-color"><?php echo esc_html__('This block is ordinary editor content, so you can add lists, headings or anything else you need without leaving the page.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"backgroundColor":"accent","textColor":"dark"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-dark-color has-accent-background-color has-text-color has-background wp-element-button"><?php echo esc_html__('Read More', 'total'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner.jpg" alt="<?php echo esc_attr__('About us', 'total'); ?>" /></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
