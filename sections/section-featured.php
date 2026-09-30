<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_featured_section_disable') != 'on') {
    ?>
    <section id="ht-featured-post-section" class="ht-section">
        <div class="ht-container">
            <?php
            $total_featured_title = get_theme_mod('total_featured_title');
            $total_featured_sub_title = get_theme_mod('total_featured_sub_title');
            ?>
            <?php
            if ($total_featured_title || $total_featured_sub_title) {
                ?>
                <div class="ht-section-title-tagline">
                    <?php if ($total_featured_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($total_featured_title); ?></h2>
                    <?php } ?>

                    <?php if ($total_featured_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($total_featured_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="ht-featured-post-wrap ht-clearfix">
                <?php
                for ($i = 1; $i < 4; $i++) {
                    $total_featured_page_id = get_theme_mod('total_featured_page' . $i);
                    $total_featured_page_icon = get_theme_mod('total_featured_page_icon' . $i);

                    if ($total_featured_page_id) {
                        if (total_setup_section_post($total_featured_page_id)):
                        ?>
                        <div class="ht-featured-post">
                            <div class="ht-featured-icon"><i class="<?php echo esc_attr($total_featured_page_icon); ?>"></i></div>
                            <h5><?php the_title(); ?></h5>
                            <div class="ht-featured-excerpt">
                                <?php
                                if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                    the_excerpt();
                                } else {
                                    echo esc_html(total_excerpt(get_the_content(), 130));
                                }
                                ?>
                            </div>
                            <div class="ht-featured-link">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'total'); ?></a>
                            </div>
                        </div>
                        <?php
                            wp_reset_postdata();
                        endif;
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}