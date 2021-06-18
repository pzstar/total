<?php
add_action('total_header', 'total_display_header');

function total_display_header() {
    ?>
    <header id="ht-masthead" class="ht-site-header">
        <div class="ht-container ht-clearfix">
            <div id="ht-site-branding">
                <?php
                $hide_title = get_theme_mod('total_hide_title', false);
                $hide_tagline = get_theme_mod('total_hide_tagline', false);

                if (function_exists('has_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                }

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
                <?php } ?>
            </div>

            <a href="#" class="toggle-bar"><span></span></a>
            <nav id="ht-site-navigation" class="ht-main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container_class' => 'ht-menu ht-clearfix',
                    'menu_class' => 'ht-clearfix',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
                ?>
            </nav><!-- #ht-site-navigation -->
        </div>
    </header><!-- #ht-masthead -->
    <?php
}

add_action('wp_footer', 'total_scroll_top');

function total_scroll_top() {
    $display_button = get_theme_mod('total_backtotop', true);
    if ($display_button) {
        ?>
        <div id="ht-back-top" class="ht-hide"><i class="fas fa-angle-up"></i></div>
        <?php
    }
}
