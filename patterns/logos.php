<?php
/**
 * Title: Client Logos
 * Slug: total/logos
 * Categories: total, gallery, featured
 * Description: A row of five client or partner logos with a short heading above.
 * Keywords: logos, clients, partners, brands, sponsors
 * Viewport Width: 1400
 *
 * @package Total
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"margin":{"bottom":"40px"}}},"textColor":"heading"} -->
<h3 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="margin-bottom:40px;letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Trusted By', 'total'); ?></h3>
<!-- /wp:heading -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
<?php for ($total_i = 0; $total_i < 5; $total_i++) { ?>
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"center","sizeSlug":"large"} -->
<figure class="wp-block-image aligncenter size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo.png" alt="<?php echo esc_attr__('Client logo', 'total'); ?>" /></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
