<?php
/**
 * Title: Team Members
 * Slug: total/team
 * Categories: total, team, about
 * Description: Four team members, each with a photo, a name, a role and a short biography.
 * Keywords: team, people, staff, about, members
 * Viewport Width: 1400
 *
 * @package Total
 */

$total_team_members = array(
    array(
        'name' => esc_html__('Alex Morgan', 'total'),
        'role' => esc_html__('Founder', 'total'),
    ),
    array(
        'name' => esc_html__('Jamie Chen', 'total'),
        'role' => esc_html__('Creative Director', 'total'),
    ),
    array(
        'name' => esc_html__('Sam Okafor', 'total'),
        'role' => esc_html__('Lead Developer', 'total'),
    ),
    array(
        'name' => esc_html__('Riley Novak', 'total'),
        'role' => esc_html__('Support Lead', 'total'),
    ),
);
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:60px;padding-bottom:60px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="letter-spacing:1px;text-transform:uppercase"><?php echo esc_html__('Meet The Team', 'total'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"body","style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="margin-bottom:60px"><?php echo esc_html__('The people behind the work.', 'total'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<?php foreach ($total_team_members as $total_member) { ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large"} -->
<figure class="wp-block-image aligncenter size-large"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/team-thumb.png" alt="<?php echo esc_attr($total_member['name']); ?>" /></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"bottom":"5px"}}},"textColor":"heading"} -->
<h5 class="wp-block-heading has-text-align-center has-heading-color has-text-color" style="margin-bottom:5px;text-transform:uppercase"><?php echo esc_html($total_member['name']); ?></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"accent","style":{"typography":{"fontSize":"0.9em"}}} -->
<p class="has-text-align-center has-accent-color has-text-color" style="font-size:0.9em"><?php echo esc_html($total_member['role']); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"body"} -->
<p class="has-text-align-center has-body-color has-text-color"><?php echo esc_html__('A line or two about this person and what they do here.', 'total'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->
<?php } ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
