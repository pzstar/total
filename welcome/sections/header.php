<?php
/*
 *  Seasonal sale banner.
 *
 *  This used to be a commented-out block that had to be uncommented each
 *  November and remembered again in January. It now opens and closes on the
 *  same campaign window as the customizer banner.
 */
$total_header_campaign = total_get_active_campaign();

if ($total_header_campaign && !empty($total_header_campaign['image'])) {
    ?>
    <a class="welcome-sale-banner" target="_blank" href="<?php echo esc_url(total_upgrade_url('welcome-banner-' . $total_header_campaign['id'], 'total-welcome-banner')); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/' . $total_header_campaign['image']); ?>" alt="<?php echo esc_attr($total_header_campaign['title']); ?>">
    </a>
    <?php
}
?>
<div class="welcome-hero">
    <div class="welcome-hero-main">
        <div class="welcome-brand">
            <svg class="welcome-brand-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80.36 80.36" aria-hidden="true"><path d="M73 80.36A7.33 7.33 0 0 0 80.36 73V7.33A7.33 7.33 0 0 0 73 0H7.33A7.33 7.33 0 0 0 0 7.33V73a7.33 7.33 0 0 0 7.33 7.33ZM58.26 4.14l7 3.23-43.13 19.74-7-3.23Zm-9.35 19-.46.7v49.1l-7.39 3.35V28l-1.16-.69-17 7.74v-6.56L66.34 8.64v6.58ZM21.32 35.08l-7.39-3.24v-6.58l7.39 3.35Zm10.73 37.86V32.65l7.39-3.35v47Z"/></svg>
            <span class="welcome-version">
                <?php
                /* translators: %s: theme version */
                printf(esc_html__('Version %s', 'total'), esc_html($this->theme_version));
                ?>
            </span>
        </div>

        <h1>
            <?php
            /* translators: %s: theme name */
            printf(esc_html__('Welcome to %s', 'total'), esc_html($this->theme_name));
            ?>
        </h1>
        <p class="welcome-hero-text">
            <?php
            /* translators: %s: theme name */
            printf(esc_html__('Thank you for choosing %s. Everything you need to set up your website is on this page: a setup checklist, shortcuts into the Customizer, recommended plugins and help when you need it.', 'total'), esc_html($this->theme_name));
            ?>
        </p>

        <div class="welcome-hero-actions">
            <a class="welcome-btn welcome-btn-light" href="<?php echo esc_url(admin_url('customize.php')); ?>"><span class="dashicons dashicons-admin-customizer" aria-hidden="true"></span><?php esc_html_e('Customize Your Site', 'total'); ?></a>
            <a class="welcome-btn welcome-btn-ghost" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome-free-demos&utm_campaign=total-demo" target="_blank"><span class="dashicons dashicons-visibility" aria-hidden="true"></span><?php esc_html_e('Free Demos', 'total'); ?></a>
            <a class="welcome-btn welcome-btn-ghost" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome-premium-demos&utm_campaign=total-demo" target="_blank"><span class="dashicons dashicons-cart" aria-hidden="true"></span><?php esc_html_e('Premium Demos', 'total'); ?></a>
        </div>
    </div>

    <div class="welcome-pro-card">
        <div class="welcome-pro-top">
            <span class="welcome-pro-badge"><span class="dashicons dashicons-star-filled" aria-hidden="true"></span>Total Plus</span>
            <p class="welcome-pro-price"><strong>$65</strong> <span><?php esc_html_e('one-time', 'total'); ?></span></p>
        </div>

        <ul class="welcome-pro-points">
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('One time payment, no renewals', 'total'); ?></li>
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('Use on unlimited websites', 'total'); ?></li>
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('Lifetime updates included', 'total'); ?></li>
        </ul>

        <a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=total-welcome-banner&utm_campaign=total-upgrade'); ?>" target="_blank" class="welcome-btn welcome-btn-pro"><?php esc_html_e('Upgrade to Pro', 'total'); ?><span class="dashicons dashicons-arrow-right-alt" aria-hidden="true"></span></a>
    </div>
</div>

<nav class="welcome-nav" aria-label="<?php esc_attr_e('Settings sections', 'total'); ?>">
    <?php foreach ($tabs as $section_id => $tab) { ?>
        <a href="<?php echo esc_url(admin_url('admin.php?page=total-welcome&section=' . $section_id)); ?>" class="welcome-nav-tab<?php echo $section_id === $section ? ' is-active' : ''; ?>"<?php echo $section_id === $section ? ' aria-current="page"' : ''; ?>>
            <span class="dashicons <?php echo esc_attr($tab[1]); ?>" aria-hidden="true"></span><?php echo esc_html($tab[0]); ?>
        </a>
    <?php } ?>
</nav>
