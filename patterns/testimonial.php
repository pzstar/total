<?php
/**
 * Title: Testimonials
 * Slug: total/testimonial
 * Categories: total, testimonials, text
 * Description: Two customer quotes side by side, each with a name and role underneath.
 * Keywords: testimonial, quote, review, customers, feedback
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_testimonials = array(
    array(
        'quote' => esc_html__('Swap this for something a real customer said. A specific, concrete sentence carries far more weight than general praise.', 'total'),
        'name' => esc_html__('Dana Whitfield', 'total'),
        'role' => esc_html__('Marketing Lead, Northwind', 'total'),
    ),
    array(
        'quote' => esc_html__('A second quote goes here. Keep both to a similar length so the two columns stay balanced.', 'total'),
        'name' => esc_html__('Tomas Reyes', 'total'),
        'role' => esc_html__('Owner, Reyes Studio', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('What People Say', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('Feedback from the people we have worked with.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_testimonials as $total_testimonial) { ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"40px","right":"40px","bottom":"40px","left":"40px"}}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px"><!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontSize":"28px"},"spacing":{"margin":{"bottom":"15px"}}}} -->
<p class="has-accent-color has-text-color" style="margin-bottom:15px;font-size:28px"><i class="fas fa-quote-left"></i></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"body"} -->
<p class="has-body-color has-text-color"><?php echo esc_html($total_testimonial['quote']); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":6,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"25px","bottom":"0"}}},"textColor":"heading"} -->
<h6 class="wp-block-heading has-heading-color has-text-color" style="margin-top:25px;margin-bottom:0;text-transform:uppercase"><?php echo esc_html($total_testimonial['name']); ?></h6>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"0.9em"},"spacing":{"margin":{"top":"0"}}}} -->
<p class="has-body-color has-text-color" style="margin-top:0;font-size:0.9em"><?php echo esc_html($total_testimonial['role']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
