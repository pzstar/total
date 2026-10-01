<?php
/**
 *
 * @package Total
 */
if (get_theme_mod('total_team_section_disable') != 'on') {
    ?>
    <section id="ht-team-section" class="ht-section">
        <div class="ht-container">
            <?php
            $total_team_title = get_theme_mod('total_team_title');
            $total_team_sub_title = get_theme_mod('total_team_sub_title');
            ?>
            <?php if ($total_team_title || $total_team_sub_title) { ?>
                <div class="ht-section-title-tagline">
                    <?php if ($total_team_title) { ?>
                        <h2 class="ht-section-title"><?php echo esc_html($total_team_title); ?></h2>
                    <?php } ?>

                    <?php if ($total_team_sub_title) { ?>
                        <div class="ht-section-tagline"><?php echo esc_html($total_team_sub_title); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="ht-team-member-wrap ht-clearfix">
                <?php
                $total_team_items = total_section_repeater_items('team');

                if (false !== $total_team_items) {
                    foreach ($total_team_items as $total_team_item) {
                        $total_team_item = wp_parse_args($total_team_item, array('image' => '', 'name' => '', 'designation' => '', 'content' => '', 'link' => '', 'facebook_link' => '', 'twitter_link' => '', 'instagram_link' => '', 'linkedin_link' => ''));

                        if ('' === trim($total_team_item['name'] . $total_team_item['content']) && !$total_team_item['image']) {
                            continue;
                        }

                        $image_url = $total_team_item['image'] ? total_repeater_image_url($total_team_item['image'], 'total-team-thumb') : get_template_directory_uri() . '/images/team-thumb.png';
                        $total_team_socials = array(
                            'facebook_link' => 'fab fa-facebook-f',
                            'twitter_link' => 'fab fa-x-twitter',
                            'instagram_link' => 'fab fa-instagram',
                            'linkedin_link' => 'fab fa-linkedin-in',
                        );
                        $total_team_excerpt_tag = $total_team_item['link'] ? 'a' : 'div';
                        ?>
                        <div class="ht-team-member">
                            <div class="ht-team-member-image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($total_team_item['name']); ?>"<?php echo total_image_loading_attrs(); ?> />
                                <div class="ht-title-wrap">
                                    <h6><?php echo esc_html($total_team_item['name']); ?></h6>
                                </div>

                                <<?php echo tag_escape($total_team_excerpt_tag); ?> <?php echo $total_team_item['link'] ? 'href="' . esc_url($total_team_item['link']) . '" ' : ''; ?>class="ht-team-member-excerpt">
                                    <div class="ht-team-member-excerpt-wrap">
                                        <div class="ht-team-member-span">
                                            <h6><?php echo esc_html($total_team_item['name']); ?></h6>

                                            <?php if ($total_team_item['designation']) { ?>
                                                <div class="ht-team-designation"><?php echo esc_html($total_team_item['designation']); ?></div>
                                            <?php } ?>

                                            <?php echo wp_kses_post($total_team_item['content']); ?>

                                            <?php if ($total_team_item['link']) { ?>
                                                <div class="ht-team-detail"><?php esc_html_e('Detail', 'total') ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </<?php echo tag_escape($total_team_excerpt_tag); ?>>
                            </div>

                            <?php if (array_filter(array_intersect_key($total_team_item, $total_team_socials))) { ?>
                                <div class="ht-team-social-id">
                                    <?php
                                    foreach ($total_team_socials as $total_team_social => $total_team_social_icon) {
                                        if ($total_team_item[$total_team_social]) {
                                            echo '<a target="_blank" href="' . esc_url($total_team_item[$total_team_social]) . '"><i class="' . esc_attr($total_team_social_icon) . '"></i></a>';
                                        }
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                } else {
                    for ($i = 1; $i < 5; $i++) {
                        $total_team_page_id = get_theme_mod('total_team_page' . $i);

                        if ($total_team_page_id) {
                            if (total_setup_section_post($total_team_page_id)):
                            $total_team_designation = get_theme_mod('total_team_designation' . $i);
                            $total_team_facebook = get_theme_mod('total_team_facebook' . $i);
                            $total_team_twitter = get_theme_mod('total_team_twitter' . $i);
                            $total_team_instagram = get_theme_mod('total_team_instagram' . $i);
                            $total_team_linkedin = get_theme_mod('total_team_linkedin' . $i);
                            ?>
                            <div class="ht-team-member">
                                <div class="ht-team-member-image">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $total_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'total-team-thumb');
                                        $image_url = isset($total_image[0]) ? $total_image[0] : get_template_directory_uri() . '/images/team-thumb.png';
                                    } else {
                                        $image_url = get_template_directory_uri() . '/images/team-thumb.png';
                                    }
                                    ?>

                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"<?php echo total_image_loading_attrs(); ?> />
                                    <div class="ht-title-wrap">
                                        <h6><?php the_title(); ?></h6>
                                    </div>

                                    <a href="<?php the_permalink(); ?>" class="ht-team-member-excerpt">
                                        <div class="ht-team-member-excerpt-wrap">
                                            <div class="ht-team-member-span">
                                                <h6><?php the_title(); ?></h6>

                                                <?php if ($total_team_designation) { ?>
                                                    <div class="ht-team-designation"><?php echo esc_html($total_team_designation); ?></div>
                                                    <?php
                                                }

                                                if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                                    the_excerpt();
                                                } else {
                                                    echo esc_html(total_excerpt(get_the_content(), 100));
                                                }
                                                ?>
                                                <div class="ht-team-detail"><?php esc_html_e('Detail', 'total') ?></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <?php if ($total_team_facebook || $total_team_twitter || $total_team_instagram || $total_team_linkedin) { ?>
                                    <div class="ht-team-social-id">
                                        <?php if ($total_team_facebook) { ?>
                                            <a target="_blank" href="<?php echo esc_url($total_team_facebook) ?>"><i class="fab fa-facebook-f"></i></a>
                                        <?php } ?>

                                        <?php if ($total_team_twitter) { ?>
                                            <a target="_blank" href="<?php echo esc_url($total_team_twitter) ?>"><i class="fab fa-x-twitter"></i></a>
                                        <?php } ?>

                                        <?php if ($total_team_instagram) { ?>
                                            <a target="_blank" href="<?php echo esc_url($total_team_instagram) ?>"><i class="fab fa-instagram"></i></a>
                                        <?php } ?>

                                        <?php if ($total_team_linkedin) { ?>
                                            <a target="_blank" href="<?php echo esc_url($total_team_linkedin) ?>"><i class="fab fa-linkedin-in"></i></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
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
    </section>
    <?php
}