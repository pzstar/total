<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_service_section_disable') != 'on') {
    ?>
    <section id="ht-service-post-section" class="ht-section">
        <div class="ht-service-left-bg"></div>
        <div class="ht-container ht-clearfix">
            <div class="ht-service-posts ht-clearfix">
                <?php
                $total_service_title = get_theme_mod('total_service_title');
                $total_service_sub_title = get_theme_mod('total_service_sub_title');
                ?>
                <?php
                if ($total_service_title || $total_service_sub_title) {
                    ?>
                    <div class="ht-section-title-tagline">
                        <?php if ($total_service_title) { ?>
                            <h2 class="ht-section-title"><?php echo esc_html($total_service_title); ?></h2>
                        <?php } ?>

                        <?php if ($total_service_sub_title) { ?>
                            <div class="ht-section-tagline"><?php echo esc_html($total_service_sub_title); ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="ht-service-post-wrap">
                    <?php
                    $total_service_items = total_section_repeater_items('service');

                    if (false !== $total_service_items) {
                        foreach ($total_service_items as $total_service_item) {
                            $total_service_item = wp_parse_args($total_service_item, array('icon' => '', 'title' => '', 'content' => '', 'link_text' => '', 'link' => ''));

                            if ('' === trim($total_service_item['title'] . $total_service_item['content'])) {
                                continue;
                            }
                            ?>
                            <div class="ht-service-post ht-clearfix">
                                <?php if ($total_service_item['icon']) { ?>
                                    <div class="ht-service-icon"><i class="<?php echo esc_attr($total_service_item['icon']); ?>"></i></div>
                                <?php } ?>
                                <div class="ht-service-excerpt">
                                    <h5><?php echo esc_html($total_service_item['title']); ?></h5>
                                    <div class="ht-service-text">
                                        <?php
                                        echo wp_kses_post($total_service_item['content']);

                                        if ($total_service_item['link'] && $total_service_item['link_text']) {
                                            ?>
                                            <br />
                                            <a href="<?php echo esc_url($total_service_item['link']); ?>"><?php echo esc_html($total_service_item['link_text']); ?> <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        for ($i = 1; $i < 7; $i++) {
                            $total_service_page_id = get_theme_mod('total_service_page' . $i);
                            $total_service_page_icon = get_theme_mod('total_service_page_icon' . $i, 'far fa-bell');

                            if ($total_service_page_id) {
                                if (total_setup_section_post($total_service_page_id)):
                                ?>
                                <div class="ht-service-post ht-clearfix">
                                    <div class="ht-service-icon"><i class="<?php echo esc_attr($total_service_page_icon); ?>"></i></div>
                                    <div class="ht-service-excerpt">
                                        <h5><?php the_title(); ?></h5>
                                        <div class="ht-service-text">
                                            <?php
                                            if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                                the_excerpt();
                                            } else {
                                                echo esc_html(total_excerpt(get_the_content(), 100));
                                            }
                                            ?>
                                            <br />
                                            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'total'); ?> <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    wp_reset_postdata();
                                endif;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}