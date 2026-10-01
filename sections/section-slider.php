<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_slider_section_disable') != 'on') {
    ?>
    <div id="ht-home-slider-section">
        <div id="ht-bx-slider" class="owl-carousel">
            <?php
            $total_slider_items = total_section_repeater_items('slider');

            if (false !== $total_slider_items) {
                foreach ($total_slider_items as $total_slider_item) {
                    // Slide buttons and text alignment are Total Plus features; the free theme shows the image, title and text.
                    $total_slider_item = wp_parse_args($total_slider_item, array('image' => '', 'title' => '', 'subtitle' => ''));

                    if (!$total_slider_item['image'] && '' === trim($total_slider_item['title'] . $total_slider_item['subtitle'])) {
                        continue;
                    }
                    ?>
                    <div class="ht-slide">
                        <div class="ht-slide-overlay"></div>

                        <?php
                        if ($total_slider_item['image']) {
                            echo '<img class="no-lazyload" alt="' . esc_attr($total_slider_item['title']) . '" src="' . esc_url($total_slider_item['image']) . '"' . total_image_loading_attrs('slider') . '>';
                        }
                        ?>

                        <div class="ht-slide-caption">
                            <?php if ($total_slider_item['title']) { ?>
                                <div class="ht-slide-cap-title">
                                    <span><?php echo esc_html($total_slider_item['title']); ?></span>
                                </div>
                            <?php } ?>

                            <?php if ($total_slider_item['subtitle']) { ?>
                                <div class="ht-slide-cap-desc">
                                    <?php echo wp_kses_post(wpautop($total_slider_item['subtitle'])); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                for ($i = 1; $i < 4; $i++) {
                    $total_slider_page_id = get_theme_mod('total_slider_page' . $i);

                    if ($total_slider_page_id) {
                        if (total_setup_section_post($total_slider_page_id)):
                        ?>
                        <div class="ht-slide">
                            <div class="ht-slide-overlay"></div>

                            <?php
                            if (has_post_thumbnail()) {
                                $total_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                if (isset($total_slider_image[0])) {
                                    echo '<img class="no-lazyload" alt="' . esc_attr(get_the_title()) . '" src="' . esc_url($total_slider_image[0]) . '"' . total_image_loading_attrs('slider') . '>';
                                }
                            }
                            ?>

                            <div class="ht-slide-caption">
                                <div class="ht-slide-cap-title">
                                    <span><?php echo esc_html(get_the_title()); ?></span>
                                </div>

                                <div class="ht-slide-cap-desc">
                                    <?php the_content(); ?>
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
    <?php
}