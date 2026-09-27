<?php
/**
 * Title: FAQ
 * Slug: total/faq
 * Categories: total, text
 * Description: Frequently asked questions that open one at a time, under a centered heading.
 * Keywords: faq, questions, answers, accordion, help
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_faqs = array(
    array(
        'question' => esc_html__('How long does a typical project take?', 'total'),
        'answer' => esc_html__('Most projects take four to eight weeks from the first call to launch. We agree on a timeline before any work starts.', 'total'),
    ),
    array(
        'question' => esc_html__('What does it cost?', 'total'),
        'answer' => esc_html__('Every project is priced on its scope. After a short call we send a fixed quote, so there are no surprises later.', 'total'),
    ),
    array(
        'question' => esc_html__('Do you offer support after launch?', 'total'),
        'answer' => esc_html__('Yes. Every project includes a month of support, and monthly care plans are available after that.', 'total'),
    ),
    array(
        'question' => esc_html__('Can I update the website myself?', 'total'),
        'answer' => esc_html__('Yes. You get full access and a short walkthrough of how to edit pages, posts and images.', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Frequently Asked Questions', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
<p class="has-text-align-center" style="margin-bottom:40px"><?php echo esc_html__('Answers to the questions we hear most often.', 'total'); ?></p>
<!-- /wp:paragraph -->
<?php foreach ($total_faqs as $total_faq) { ?>

<!-- wp:details {"className":"ht-faq-item"} -->
<details class="wp-block-details ht-faq-item"><summary><?php echo esc_html($total_faq['question']); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html($total_faq['answer']); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->
<?php } ?></div>
<!-- /wp:group -->
