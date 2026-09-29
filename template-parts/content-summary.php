<?php
/**
 * Template part for displaying posts.
 *
 * @package Total
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('total-hentry ht-clearfix'); ?>>
    <?php if ('post' == get_post_type()): ?>
        <div class="entry-meta ht-post-info">
            <?php total_posted_on(); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>


    <div class="ht-post-wrapper">
        <?php
        if (has_post_thumbnail()) {
            $total_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'total-blog-header');
            if (isset($total_image[0])) {
                ?>
                <figure class="entry-figure">
                    <?php ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($total_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()) ?>"<?php echo total_image_loading_attrs('lead'); ?>></a>
                </figure>
                <?php
            }
        }
        ?>

        <header class="entry-header">
            <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
        </header><!-- .entry-header -->

        <?php
        ob_start();
        total_entry_category();
        $total_categories = ob_get_clean();

        if ($total_categories) {
            ?>
            <div class="entry-categories">
                <?php echo $total_categories; // WPCS: XSS OK.  ?>
            </div>
            <?php
        }

        total_entry_tags();

        $total_archive_content = get_theme_mod('total_archive_content', 'excerpt');
        $total_excerpt_length = get_theme_mod('total_archive_excerpt_length', 130);
        $total_readmore = get_theme_mod('total_archive_readmore', esc_html__('Read More', 'total'));

        if ($total_archive_content == 'full-content') {
            ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
            <?php
        } elseif ($total_archive_content == 'wp-excerpt') {
            ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php
        } elseif ($total_excerpt_length) {
            ?>
            <div class="entry-summary">
                <?php echo esc_html(wp_trim_words(strip_shortcodes(get_the_content()), $total_excerpt_length)); ?>
            </div><!-- .entry-summary -->
            <?php
        }

        if ($total_readmore) {
            ?>
            <div class="entry-readmore">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html($total_readmore); ?></a>
            </div>
            <?php
        }
        ?>
    </div>
</article><!-- #post-## -->