<?php
$total_steps = $this->setup_steps();
$total_done = count(wp_list_filter($total_steps, array('done' => true)));
$total_percent = round(100 * $total_done / count($total_steps));
?>
<div class="welcome-grid welcome-grid-start">
    <div class="welcome-card welcome-setup-checklist">
        <div class="welcome-setup-head">
            <div class="welcome-ring" style="--welcome-progress:<?php echo absint($total_percent); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="<?php echo count($total_steps); ?>" aria-valuenow="<?php echo absint($total_done); ?>" aria-label="<?php esc_attr_e('Setup progress', 'total'); ?>">
                <span><?php echo absint($total_percent); ?>%</span>
            </div>
            <div>
                <h3><?php esc_html_e('Set Up Your Website', 'total'); ?></h3>
                <p class="welcome-setup-count"><?php /* translators: 1: steps done, 2: all steps */ printf(esc_html__('%1$d of %2$d done', 'total'), $total_done, count($total_steps)); ?></p>
            </div>
        </div>

        <ol class="welcome-setup-steps">
            <?php foreach ($total_steps as $total_step) { ?>
                <li class="<?php echo $total_step['done'] ? 'is-done' : 'is-todo'; ?>">
                    <span class="welcome-setup-mark dashicons <?php echo $total_step['done'] ? 'dashicons-yes' : ''; ?>" aria-hidden="true"></span>
                    <div class="welcome-setup-text">
                        <strong><?php echo esc_html($total_step['title']); ?></strong>
                        <span class="screen-reader-text"><?php echo $total_step['done'] ? esc_html__('(done)', 'total') : esc_html__('(to do)', 'total'); ?></span>
                        <p><?php echo esc_html($total_step['text']); ?></p>
                    </div>
                    <?php
                    if ($total_step['url']) {
                        echo '<a class="button' . ($total_step['done'] ? '' : ' button-primary') . '" href="' . esc_url($total_step['url']) . '">' . ($total_step['done'] ? esc_html__('Change', 'total') : esc_html__('Set up', 'total')) . '</a>';
                    } elseif (!$total_step['done']) {
                        echo $this->generate_hdi_install_button();
                    }
                    ?>
                </li>
            <?php } ?>
        </ol>
    </div>

    <div class="welcome-card welcome-demo-import">
        <div class="welcome-demo-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php /* translators: %s: theme name */ printf(esc_attr__('%s Demo', 'total'), $this->theme_name); ?>">
            <a href="https://hashthemes.com/wordpress-theme/total/" target="_blank" class="welcome-demo-view"><span class="dashicons dashicons-external" aria-hidden="true"></span><?php esc_html_e('View Demo', 'total'); ?></a>
        </div>
        <div class="welcome-card-body">
            <h3><?php esc_html_e('Start From a Demo', 'total'); ?></h3>
            <p><?php esc_html_e('Import a complete demo website, with its content and settings, in a single click, then replace the content with your own.', 'total'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
            <p class="welcome-small"><a href="https://hashthemes.com/documentation/total-documentation/#Import-Demo-Content" target="_blank"><?php esc_html_e('How the demo importer works', 'total'); ?></a></p>
        </div>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Customize Your Site', 'total'); ?></h3>
        <a href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e('Open the Customizer', 'total'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="welcome-quick-links">
        <?php foreach ($this->quick_links() as $total_link) { ?>
            <a class="welcome-quick-link" href="<?php echo esc_url($total_link['url']); ?>">
                <span class="dashicons <?php echo esc_attr($total_link['icon']); ?>" aria-hidden="true"></span>
                <?php echo esc_html($total_link['label']); ?>
            </a>
        <?php } ?>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Build Your Home Page', 'total'); ?></h3>
        <a href="https://hashthemes.com/documentation/total-documentation/#Home-Page-Setup" target="_blank"><?php esc_html_e('Step-by-step guide', 'total'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <p class="welcome-block-intro"><?php echo esc_html__('Build the home page from the theme\'s ready-made sections in the Customizer, or design it freely with Elementor.', 'total'); ?></p>

    <div class="welcome-grid welcome-grid-2">
        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-admin-customizer" aria-hidden="true"></span>
            <h4><?php esc_html_e('With the Customizer', 'total'); ?></h4>
            <ol>
                <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s.', 'total'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'total') . '</a>'); ?></li>
                <li><?php echo esc_html__('Turn on "Enable Home Sections".', 'total'); ?></li>
                <li><?php echo esc_html__('Go back, open "Home Sections" and fill in the sections you want to show.', 'total'); ?></li>
            </ol>
        </div>

        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-layout" aria-hidden="true"></span>
            <h4><?php esc_html_e('With Elementor', 'total'); ?></h4>
            <ol>
                <li><?php printf(esc_html__('Install and activate Elementor and Hash Elements from the %s.', 'total'), '<a href="' . esc_url(admin_url('admin.php?page=total-welcome&section=recommended_plugins')) . '">' . esc_html__('Recommended Plugins tab', 'total') . '</a>'); ?></li>
                <li><?php echo esc_html__('Create a new page, edit it with Elementor and drag in the widgets to design your home page.', 'total'); ?></li>
                <li><?php echo sprintf(esc_html__('In Appearance > Customize > %s, choose "A static page", select your new page as the Homepage and turn off "Enable Home Sections".', 'total'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Homepage Settings', 'total') . '</a>'); ?></li>
            </ol>
        </div>
    </div>
</div>
