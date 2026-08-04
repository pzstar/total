<?php
/**
 * Title: Latest Posts
 * Slug: total/blog
 * Categories: total, posts, query
 * Description: A three column grid of the most recent posts, each showing the featured image, date, title and excerpt.
 * Keywords: blog, posts, news, articles, latest, query
 * Viewport Width: 1400
 *
 * @package Total
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('From The Blog', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('The latest news and updates.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"height":"220px"} /-->

<!-- wp:post-date {"textColor":"accent","style":{"typography":{"fontSize":"0.85em"}}} /-->

<!-- wp:post-title {"isLink":true,"level":5,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"10px"}}},"textColor":"heading"} /-->

<!-- wp:post-excerpt {"moreText":"<?php echo esc_attr__('Read More', 'total'); ?>","excerptLength":20,"textColor":"body"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","textColor":"body"} -->
<p class="has-text-align-center has-body-color has-text-color"><?php echo esc_html__('No posts have been published yet.', 'total'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
