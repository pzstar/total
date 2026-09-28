<?php
if (!function_exists('total_custom_logo')) {

    function total_custom_logo() {
        $hide_title = get_theme_mod('total_hide_title', true);
        $hide_tagline = get_theme_mod('total_hide_tagline', true);

        if (function_exists('has_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        }

        if (!$hide_title || !$hide_tagline) {
            ?>
            <div class="ht-site-title-tagline">
                <?php
                if (!$hide_title) {
                    if (is_front_page()) {
                        ?>
                        <h1 class="ht-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php } else { ?>
                        <p class="ht-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    }
                }
                ?>

                <?php if (!$hide_tagline) { ?>
                    <p class="ht-site-description"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('description'); ?></a></p>
                <?php }
                ?>
            </div>
            <?php
        }
    }

}


if (!function_exists('total_main_navigation')) {

    function total_main_navigation() {
        ?>
        <a href="#" class="toggle-bar" role="button" aria-expanded="false" aria-label="<?php esc_attr_e('Menu', 'total'); ?>"><span></span></a>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container_class' => 'ht-menu ht-clearfix',
            'menu_class' => 'ht-clearfix',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ));

        total_nav_additional_items();
    }

}

if (!function_exists('total_nav_additional_items')) {

    // Search, cart and button hook in here; the wrapper is skipped when nothing is enabled,
    // except in the Customizer preview, where live preview needs it to exist.
    function total_nav_additional_items() {
        $items = total_nav_additional_items_markup();

        if ($items || is_customize_preview()) {
            echo '<div class="ht-menu-extra-items">' . $items . '</div>';
        }
    }

}

if (!function_exists('total_nav_additional_items_markup')) {

    function total_nav_additional_items_markup() {
        ob_start();
        do_action('total_nav_additional_items');
        return trim(ob_get_clean());
    }

}

if (!function_exists('total_header_search_button')) {

    function total_header_search_button() {
        $show = get_theme_mod('total_mh_show_search', false);
        // Printed hidden in the preview, so its switch can show it instantly.
        if (!$show && !is_customize_preview()) {
            return;
        }
        ?>
        <div class="ht-menu-extra-item ht-menu-search"<?php echo $show ? '' : ' hidden'; ?>>
            <button type="button" class="ht-search-toggle" aria-controls="ht-search-overlay" aria-expanded="false">
                <i class="fas fa-magnifying-glass" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php esc_html_e('Search', 'total'); ?></span>
            </button>
        </div>
        <?php
    }

}

if (!function_exists('total_header_search_overlay')) {

    function total_header_search_overlay() {
        // Total Plus replaces the header and prints its own overlay for the same setting.
        // In the preview it is printed hidden, so switching search on shows a working button.
        if ((!get_theme_mod('total_mh_show_search', false) && !is_customize_preview()) || !did_action('total_nav_additional_items')) {
            return;
        }
        ?>
        <div id="ht-search-overlay" class="ht-search-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Search', 'total'); ?>" hidden>
            <button type="button" class="ht-search-close">
                <i class="fas fa-xmark" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php esc_html_e('Close search', 'total'); ?></span>
            </button>
            <div class="ht-search-container">
                <?php get_search_form(); ?>
            </div>
        </div>
        <?php
    }

}

if (!function_exists('total_header_button')) {

    function total_header_button() {
        $show = get_theme_mod('total_mh_show_cta', false);
        // Printed hidden in the preview, so its switch can show it instantly.
        if (!$show && !is_customize_preview()) {
            return;
        }

        $text = get_theme_mod('total_hb_text', esc_html__('Call Us', 'total'));
        $link = get_theme_mod('total_hb_link', '#');
        $new_tab = get_theme_mod('total_hb_open_new_tab', false);

        if (!$text) {
            return;
        }
        ?>
        <div class="ht-menu-extra-item ht-menu-cta"<?php echo $show ? '' : ' hidden'; ?>>
            <a class="ht-header-button" href="<?php echo esc_url($link); ?>"<?php echo $new_tab ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo wp_kses_post($text); ?></a>
        </div>
        <?php
    }

}

if (!function_exists('total_display_header')) {

    function total_display_header() {
        ?>
        <header id="ht-masthead" class="ht-site-header">
            <div class="ht-header">
                <div class="ht-container">
                    <div id="ht-site-branding">
                        <?php total_custom_logo(); ?>
                    </div>

                    <nav id="ht-site-navigation" class="ht-main-navigation">
                        <?php total_main_navigation(); ?>
                    </nav>
                </div>
            </div>
        </header>
        <?php
    }

}

if (!function_exists('total_main_wrap_open')) {

    function total_main_wrap_open() {

        echo '<div id="ht-page">';
        echo '<a class="skip-link screen-reader-text" href="#ht-content">' . esc_html__('Skip to content', 'total') . '</a>';
        do_action('total_header');
        echo '<div id="ht-content" class="ht-site-content">';
    }

}

add_action('total_body_open', 'total_main_wrap_open', 10);
add_action('total_header', 'total_display_header');
add_action('total_nav_additional_items', 'total_header_search_button', 10);
add_action('total_nav_additional_items', 'total_header_button', 30);
add_action('wp_footer', 'total_header_search_overlay');
