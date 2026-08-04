<?php
/**
 * Title: Services List
 * Slug: total/services
 * Categories: total, services, text
 * Description: A two column list of services, each with an icon above a title and short description.
 * Keywords: services, features, icons, list
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_services = array(
    array(
        'icon' => 'fas fa-pencil-ruler',
        'title' => esc_html__('Design', 'total'),
        'text' => esc_html__('Describe this service in a sentence or two. Keep the focus on what the customer gets.', 'total'),
    ),
    array(
        'icon' => 'fas fa-code',
        'title' => esc_html__('Development', 'total'),
        'text' => esc_html__('Describe this service in a sentence or two. Keep the focus on what the customer gets.', 'total'),
    ),
    array(
        'icon' => 'fas fa-chart-line',
        'title' => esc_html__('Marketing', 'total'),
        'text' => esc_html__('Describe this service in a sentence or two. Keep the focus on what the customer gets.', 'total'),
    ),
    array(
        'icon' => 'fas fa-headset',
        'title' => esc_html__('Consulting', 'total'),
        'text' => esc_html__('Describe this service in a sentence or two. Keep the focus on what the customer gets.', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Our Services', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('Everything we do, in one place.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach (array_slice($total_services, 0, 2) as $total_service) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontSize":"36px"},"spacing":{"margin":{"bottom":"15px"}}}} -->
<p class="has-accent-color has-text-color" style="margin-bottom:15px;font-size:36px"><i class="<?php echo esc_attr($total_service['icon']); ?>"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":5,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"heading"} -->
<h5 class="wp-block-heading has-heading-color has-text-color" style="text-transform:uppercase"><?php echo esc_html($total_service['title']); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"body"} -->
<p class="has-body-color has-text-color"><?php echo esc_html($total_service['text']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-columns" style="margin-top:30px">
<?php foreach (array_slice($total_services, 2, 2) as $total_service) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"textColor":"accent","style":{"typography":{"fontSize":"36px"},"spacing":{"margin":{"bottom":"15px"}}}} -->
<p class="has-accent-color has-text-color" style="margin-bottom:15px;font-size:36px"><i class="<?php echo esc_attr($total_service['icon']); ?>"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":5,"style":{"typography":{"textTransform":"uppercase"}},"textColor":"heading"} -->
<h5 class="wp-block-heading has-heading-color has-text-color" style="text-transform:uppercase"><?php echo esc_html($total_service['title']); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"body"} -->
<p class="has-body-color has-text-color"><?php echo esc_html($total_service['text']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
