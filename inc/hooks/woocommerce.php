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

if (!function_exists('total_loop_columns')) {

    function total_loop_columns() {
        return 3;
    }

}

if (!function_exists('total_product_per_page')) {

    function total_product_per_page() {
        return 9;
    }

}

function total_update_woo_thumbnail() {
    $catalog = array(
        'width' => '325', // px
        'height' => '380', // px
        'crop' => 1   // true
    );

    $single = array(
        'width' => '600', // px
        'height' => '600', // px
        'crop' => 1   // true
    );

    $thumbnail = array(
        'width' => '120', // px
        'height' => '120', // px
        'crop' => 1   // false
    );
    ;
    update_option('shop_catalog_image_size', $catalog);   // Product category thumbs
    update_option('shop_single_image_size', $single);   // Single product image
    update_option('shop_thumbnail_image_size', $thumbnail);  // Image gallery thumbs
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

function woocommerce_column_class($classes) {
    $classes[] = 'columns-3';
    return $classes;
}

function total_title_wrap() {
    echo '<div class="total-product-title-wrap">';
}

function total_title_wrap_close() {
    echo '</div>';
}

function total_sidebar_shop_content() {
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

add_filter('loop_shop_columns', 'total_loop_columns');

add_filter('loop_shop_per_page', 'total_product_per_page', 20);

add_filter('woocommerce_product_description_heading', '__return_false');

add_filter('woocommerce_product_additional_information_heading', '__return_false');

add_filter('woocommerce_pagination_args', 'total_change_prev_text');

add_action('init', 'total_update_woo_thumbnail');

add_filter('woocommerce_output_related_products_args', 'total_related_products_args');

add_filter('body_class', 'woocommerce_column_class');

add_action('woocommerce_after_shop_loop_item', 'total_title_wrap_close', 4);
add_action('woocommerce_before_shop_loop_item_title', 'total_title_wrap', 20);

do_action('total_sidebar_shop_template', 'total_sidebar_shop_content');
