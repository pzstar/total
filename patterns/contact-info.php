<?php
/**
 * Title: Contact Details
 * Slug: total/contact-info
 * Categories: total, text
 * Description: Address, phone, email and opening hours in four columns, each under an icon.
 * Keywords: contact, address, phone, email, hours, location
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_contacts = array(
    array(
        'icon' => 'fas fa-location-dot',
        'title' => esc_html__('Visit Us', 'total'),
        'text' => esc_html__('123 Example Street, Your City', 'total'),
    ),
    array(
        'icon' => 'fas fa-phone',
        'title' => esc_html__('Call Us', 'total'),
        'text' => esc_html__('+1 (555) 000-0000', 'total'),
    ),
    array(
        'icon' => 'fas fa-envelope',
        'title' => esc_html__('Email Us', 'total'),
        'text' => esc_html__('hello@example.com', 'total'),
    ),
    array(
        'icon' => 'fas fa-clock',
        'title' => esc_html__('Opening Hours', 'total'),
        'text' => esc_html__('Mon to Fri, 9am to 5pm', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Get In Touch', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
<p class="has-text-align-center" style="margin-bottom:40px"><?php echo esc_html__('We usually reply within one working day.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_contacts as $total_contact) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","textColor":"accent","style":{"typography":{"fontSize":"32px"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-text-align-center has-accent-color has-text-color" style="margin-bottom:10px;font-size:32px"><i class="<?php echo esc_attr($total_contact['icon']); ?>"></i></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"0","bottom":"5px"}}},"textColor":"heading"} -->
<h3 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="margin-top:0;margin-bottom:5px"><?php echo esc_html($total_contact['title']); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html($total_contact['text']); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
