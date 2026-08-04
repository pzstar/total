<?php
/**
 * Title: Counters
 * Slug: total/counter
 * Categories: total, featured
 * Description: Four statistics on a dark background, each with an icon, a figure and a label.
 * Keywords: counter, stats, numbers, facts, figures
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_counters = array(
    array(
        'icon' => 'fas fa-smile',
        'count' => esc_html__('250', 'total'),
        'label' => esc_html__('Happy Clients', 'total'),
    ),
    array(
        'icon' => 'fas fa-briefcase',
        'count' => esc_html__('480', 'total'),
        'label' => esc_html__('Projects Done', 'total'),
    ),
    array(
        'icon' => 'fas fa-mug-hot',
        'count' => esc_html__('1200', 'total'),
        'label' => esc_html__('Cups Of Coffee', 'total'),
    ),
    array(
        'icon' => 'fas fa-award',
        'count' => esc_html__('35', 'total'),
        'label' => esc_html__('Awards Won', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"dark","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-dark-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_counters as $total_counter) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","textColor":"accent","style":{"typography":{"fontSize":"40px"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-align-center has-accent-color has-text-color" style="margin-bottom:10px;font-size:40px"><i class="<?php echo esc_attr($total_counter['icon']); ?>"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"5px"}}},"textColor":"white"} -->
<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="margin-top:0;margin-bottom:5px"><?php echo esc_html($total_counter['count']); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px","fontSize":"0.9em"}}} -->
<p class="has-text-align-center has-white-color has-text-color" style="font-size:0.9em;letter-spacing:1px;text-transform:uppercase"><?php echo esc_html($total_counter['label']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
