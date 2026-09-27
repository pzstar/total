<?php
/**
 * Title: How We Work
 * Slug: total/process
 * Categories: total, text
 * Description: Four numbered steps in a row, each with a short title and description.
 * Keywords: process, steps, timeline, how it works, workflow
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_steps = array(
    array(
        'title' => esc_html__('Discover', 'total'),
        'text' => esc_html__('We learn about your business, your customers and what the project needs to achieve.', 'total'),
    ),
    array(
        'title' => esc_html__('Plan', 'total'),
        'text' => esc_html__('We map out the pages, content and timeline, and agree on them with you.', 'total'),
    ),
    array(
        'title' => esc_html__('Build', 'total'),
        'text' => esc_html__('We design and build the project, sharing progress with you along the way.', 'total'),
    ),
    array(
        'title' => esc_html__('Launch', 'total'),
        'text' => esc_html__('We test everything, go live and make sure you know how to run it.', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('How We Work', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
<p class="has-text-align-center" style="margin-bottom:40px"><?php echo esc_html__('A simple process, from the first call to launch day.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_steps as $total_index => $total_step) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontSize":"48px","lineHeight":"1"},"spacing":{"margin":{"bottom":"15px"}}}} -->
<p class="has-accent-color has-text-color" style="margin-bottom:15px;font-size:48px;line-height:1"><?php echo esc_html(sprintf('%02d', $total_index + 1)); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"10px"}}},"textColor":"heading"} -->
<h3 class="wp-block-heading has-heading-color has-text-color" style="margin-top:0;margin-bottom:10px"><?php echo esc_html($total_step['title']); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html($total_step['text']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
