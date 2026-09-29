<?php
$total_steps = $this->setup_steps();
$total_done = count(wp_list_filter($total_steps, array('done' => true)));
?>
<div class="welcome-setup-checklist">
    <div class="welcome-setup-head">
        <h3><?php esc_html_e('Set Up Your Website', 'total'); ?></h3>
        <span class="welcome-setup-count"><?php /* translators: 1: steps done, 2: all steps */ printf(esc_html__('%1$d of %2$d done', 'total'), $total_done, count($total_steps)); ?></span>
    </div>
    <div class="welcome-setup-progress" role="progressbar" aria-valuemin="0" aria-valuemax="<?php echo count($total_steps); ?>" aria-valuenow="<?php echo absint($total_done); ?>" aria-label="<?php esc_attr_e('Setup progress', 'total'); ?>"><span style="width:<?php echo round(100 * $total_done / count($total_steps)); ?>%"></span></div>
    <ol class="welcome-setup-steps">
        <?php foreach ($total_steps as $total_step) { ?>
            <li class="<?php echo $total_step['done'] ? 'is-done' : 'is-todo'; ?>">
                <span class="welcome-setup-mark dashicons <?php echo $total_step['done'] ? 'dashicons-yes-alt' : 'dashicons-marker'; ?>" aria-hidden="true"></span>
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

<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <h3><?php echo esc_html__('Manual Setup', 'total'); ?></h3>
        <!--
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/set-front-page.gif'); ?>" alt="<?php echo esc_attr__('Viral Demo', 'total'); ?>">
        </div> -->
        <p><?php echo esc_html__('You can set up the homepage sections either through the Customizer Panel or using the Elementor Page Builder.', 'total'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'total'); ?></strong></p>
        <ol>
            <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s.', 'total'), '<a href="' . admin_url('customize.php?autofocus[section]=static_front_page') . '" target="_blank">' . esc_html__('Homepage Settings', 'total') . '</a>'); ?></li>
            <li><?php echo esc_html__('Activate "Enable Home Sections".', 'total'); ?> </li>
            <li><?php echo esc_html__('Go back, select "Home Sections", and configure the sections as needed.', 'total'); ?> </li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'total'); ?></strong></p>
        <ol>
            <li><?php printf(esc_html__('Install and activate the "Elementor" and "Hash Elements" plugins from the %s.', 'total'), '<a href="' . admin_url('admin.php?page=total-welcome&section=recommended_plugins') . '" target="_blank">' . esc_html__('Recommended Plugin Page', 'total') . '</a>'); ?></li>
            <li><?php echo esc_html__('Create a new page and edit it with Elementor. Drag and drop the Elementor widgets to design your homepage.', 'total'); ?></li>
            <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s, choose "A static page" for the "Your homepage displays" option, deactivate "Enable Home Section" and select the newly created page in "Homepage" select box.', 'total'), '<a href="' . admin_url('customize.php?autofocus[section]=static_front_page') . '" target="_blank">' . esc_html__('Homepage Settings', 'total') . '</a>'); ?> </li>
        </ol>
        <p style="margin-bottom: 0"><?php printf(esc_html__('For step-by-step guidance, please refer to the %s.', 'total'), '<a href="https://hashthemes.com/documentation/total-documentation/#HomePageSetup" target="_blank">' . esc_html__('Documentation Page', 'total') . '</a>'); ?></p>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'total'); ?><a href="https://hashthemes.com/wordpress-theme/total/" target="_blank" class="button button-primary"><?php esc_html_e('View Demo', 'total'); ?></a></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.jpg'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'total'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'total'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the HashThemes Demo Importer plugin. For more detailed documentation on how the demo importer works, click %s.', 'total'), '<a href="https://hashthemes.com/documentation/total-documentation/#ImportDemoContent" target="_blank">' . esc_html__('here', 'total') . '</a>'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
        </div>
    </div>
</div>