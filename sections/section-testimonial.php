<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_testimonial_section_disable') != 'on') {
    ?>
    <section id="ht-testimonial-section" class="ht-section">
        <div class="ht-container">
            <?php
            $total_testimonial_title = get_theme_mod('total_testimonial_title');
            $total_testimonial_sub_title = get_theme_mod('total_testimonial_sub_title');
            ?>
            <?php if ($total_testimonial_title || $total_testimonial_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($total_testimonial_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($total_testimonial_title); ?></h2>
                    <?php } ?>

                    <?php if ($total_testimonial_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($total_testimonial_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="ht-testimonial-wrap">
                <div class="ht-testimonial-slider owl-carousel">
                    <?php
                    $total_testimonial_page = get_theme_mod('total_testimonial_page');

                    if (is_array($total_testimonial_page)) {
                        foreach (array_slice($total_testimonial_page, 0, 8) as $total_testimonial_page_id):
                            if (total_setup_section_post($total_testimonial_page_id)):
                                ?>
                                <div class="ht-testimonial">
                                    <div class="ht-testimonial-excerpt">
                                        <i class="fas fa-quote-left"></i>
                                        <?php
                                        if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                            the_excerpt();
                                        } else {
                                            echo esc_html(total_excerpt(get_the_content(), 300));
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $total_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'total-thumb');
                                        if (isset($total_image[0])) {
                                            ?>
                                            <img src="<?php echo esc_url($total_image[0]) ?>" alt="<?php echo esc_attr(get_the_title()); ?>"<?php echo total_image_loading_attrs(); ?>>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <h6><?php the_title(); ?></h6>
                                </div>
                                <?php
                                wp_reset_postdata();
                            endif;
                        endforeach;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}