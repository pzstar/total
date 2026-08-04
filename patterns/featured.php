<?php
/**
 * Title: Featured Boxes
 * Slug: total/featured
 * Categories: total, featured, services
 * Description: Three centred boxes, each with an icon, a title, a short description and a link.
 * Keywords: featured, icons, boxes, three columns, highlights
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_featured_boxes = array(
    array(
        'icon' => 'fas fa-rocket',
        'title' => esc_html__('Fast Setup', 'total'),
        'text' => esc_html__('Describe the first thing that sets you apart. One or two sentences is plenty.', 'total'),
    ),
    array(
        'icon' => 'fas fa-sliders-h',
        'title' => esc_html__('Fully Flexible', 'total'),
        'text' => esc_html__('Explain the second benefit here. Swap the icon for any Font Awesome class you like.', 'total'),
    ),
    array(
        'icon' => 'fas fa-life-ring',
        'title' => esc_html__('Friendly Support', 'total'),
        'text' => esc_html__('Round things off with a third point. Add or remove columns to suit your content.', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('What We Offer', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('A short line introducing the three points below.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_featured_boxes as $total_box) { ?>
<!-- wp:column {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white"} -->
<div class="wp-block-column has-white-background-color has-background" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:paragraph {"align":"center","textColor":"accent","style":{"typography":{"fontSize":"46px"},"spacing":{"margin":{"bottom":"20px"}}}} -->
<p class="has-text-align-center has-accent-color has-text-color" style="margin-bottom:20px;font-size:46px"><i class="<?php echo esc_attr($total_box['icon']); ?>"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"heading"} -->
<h5 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="text-transform:uppercase"><?php echo esc_html($total_box['title']); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body"} -->
<p class="has-text-align-center has-body-color has-text-color"><?php echo esc_html($total_box['text']); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><a href="#"><?php echo esc_html__('Read More', 'total'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
