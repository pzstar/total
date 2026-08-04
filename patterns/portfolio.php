<?php
/**
 * Title: Portfolio Grid
 * Slug: total/portfolio
 * Categories: total, portfolio, gallery
 * Description: A six item image grid for showing recent work, with a heading above it.
 * Keywords: portfolio, gallery, work, projects, grid
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_portfolio_images = array(
    'portfolio-big.png',
    'portfolio-small.png',
    'portfolio-small-blank.png',
    'banner.jpg',
    'team.jpg',
    'slider.jpg',
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-light-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Our Work', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('A selection of recent projects. Replace these with your own images.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:gallery {"columns":3,"imageCrop":true,"linkTo":"none"} -->
<figure class="wp-block-gallery has-nested-images columns-3 is-cropped">
<?php foreach ($total_portfolio_images as $total_image) { ?>
<!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/' . $total_image); ?>" alt="<?php echo esc_attr__('Portfolio item', 'total'); ?>" /></figure>
<!-- /wp:image -->
<?php } ?>
</figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->
