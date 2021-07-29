<?php

function total_theme_wrapper_start() {
    echo '<header class="ht-main-header">';
    echo '<div class="ht-container">';
    echo '<h1 class="ht-main-title">';
    woocommerce_page_title();
    echo '</h1>';
    do_action('total_woocommerce_archive_description');
    do_action('total_woocommerce_breadcrumb');
    echo '</div>';
    echo '</header>';

    echo '<div class="ht-container">';
    echo '<div id="primary">';
}

function total_theme_wrapper_end() {
    echo '</div>';
    get_sidebar('shop');
    echo '</div>';
}

function total_related_products_args($args) {
    $args['posts_per_page'] = 3; // 3 related products
    $args['columns'] = 3; // arranged in 3 columns
    return $args;
}

function total_change_prev_text($args) {
    $args['prev_text'] = '&lang;';
    $args['next_text'] = '&rang;';
    return $args;
}

function total_title_wrap() {
    echo '<div class="total-product-title-wrap">';
}

function total_title_wrap_close() {
    echo '</div>';
}

function total_sidebar_shop_sidebar_content() {
    if (!is_active_sidebar('total-shop-sidebar')) {
        return;
    }
    ?>

    <div id="secondary" class="widget-area">
        <?php dynamic_sidebar('total-shop-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

add_action('woocommerce_before_main_content', 'total_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'total_theme_wrapper_end', 10);
add_action('total_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

add_filter('woocommerce_show_page_title', '__return_false');



add_filter('woocommerce_product_description_heading', '__return_false');

add_filter('woocommerce_product_additional_information_heading', '__return_false');

add_filter('woocommerce_pagination_args', 'total_change_prev_text');


add_filter('woocommerce_output_related_products_args', 'total_related_products_args');


add_action('woocommerce_after_shop_loop_item', 'total_title_wrap_close', 4);
add_action('woocommerce_before_shop_loop_item_title', 'total_title_wrap', 20);

add_action('total_sidebar_shop_sidebar', 'total_sidebar_shop_sidebar_content');
