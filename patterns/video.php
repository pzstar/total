<?php
/**
 * Title: Video With Text
 * Slug: total/video
 * Categories: total, media
 * Description: A heading, text and button beside a video. Select the video block to upload a file or paste a link.
 * Keywords: video, media, showreel, intro, about
 * Viewport Width: 1400
 *
 * @package Total
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"50px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('See How We Work', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__('A short video is often the quickest way to show what you do. Introduce your team, your workspace or a recent project.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"backgroundColor":"accent","textColor":"dark"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-dark-color has-accent-background-color has-text-color has-background wp-element-button"><?php echo esc_html__('Get In Touch', 'total'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:video -->
<figure class="wp-block-video"></figure>
<!-- /wp:video --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
