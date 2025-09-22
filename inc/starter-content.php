
<?php
/**
 * Credit: Storefront Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Total_Starter_Content' ) ) :

	class Total_Starter_Content {

		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ), 99 );
			add_action( 'wp_ajax_total_dismiss_notice', array( $this, 'dismiss_nux' ) );
			add_action( 'admin_post_total_starter_content', array( $this, 'redirect_customizer' ) );
			add_action( 'init', array( $this, 'log_fresh_site_state' ) );
			add_action( 'after_setup_theme', array( $this, 'starter_content' ) );
			add_filter( 'get_theme_starter_content', array( $this, 'filter_start_content' ), 10, 2 );
            //echo get_option( 'total_nux_dismissed' ).'ssssss';
		}


		public function enqueue_scripts() {
			global $wp_customize;

			if ( isset( $wp_customize ) || true === (bool) get_option( 'total_nux_dismissed' ) ) {
				return;
			}

			wp_enqueue_script( 'total-starter-admin-script', get_template_directory_uri() . '/js/starter.js', array( 'jquery' ));

			$total_nux = array(
				'nonce' => wp_create_nonce( 'total_notice_dismiss' )
			);

			wp_localize_script( 'total-starter-admin-script', 'santamasNUX', $total_nux );
		}

		public function admin_notices() {

			global $pagenow;
			if ( true === (bool) get_option( 'total_nux_dismissed' ) ) {
				return;
			}
			?>

			<div class="notice notice-info total-notice-nux is-dismissible">

				<div class="notice-content">
					<h2><?php esc_html_e( 'Thank you for installing the SantaMas Theme', 'total' ); ?></h2>
					<p>
					<?php

					if ( true === (bool) get_option( 'total_nux_fresh_site' ) && 'post-new.php' === $pagenow ) {
						echo esc_attr__( 'Before you add your first post let\'s customize the website', 'total' );
					} else {
						echo esc_attr__( 'Let\'s get started by Customizing the website.', 'total' );
					} ?>
					</p>

					<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
						<input type="hidden" name="action" value="total_starter_content">
						<?php wp_nonce_field( 'total_starter_content' ); ?>

						<?php if ( true === (bool) get_option( 'total_nux_fresh_site' ) ) : ?>
							<input type="hidden" name="homepage">
						<?php endif; ?>

						<?php if ( false === (bool) get_option( 'total_nux_fresh_site' ) ) : ?>
							<p>
								<input type="checkbox" name="homepage" value="on" checked>
								<?php
									if ( 'page' === get_option( 'show_on_front' ) ) {
										esc_attr_e( 'Apply the homepage template', 'total' );
									} else {
										esc_attr_e( 'Create a homepage using homepage template', 'total' );
									}
								?>
							</p>
						<?php endif; ?>

						<input type="submit" class="button button-primary" value="<?php esc_attr_e( 'Let\'s go!', 'total' ); ?>">
					</form>
					<p></p>
				</div>
			</div>
		<?php }

		/**
		 * AJAX dismiss notice.
		 *
		 */
		public function dismiss_nux() {
			$nonce = ! empty( $_POST['nonce'] ) ? $_POST['nonce'] : false;

			if ( ! $nonce || ! wp_verify_nonce( $nonce, 'total_notice_dismiss' ) || ! current_user_can( 'manage_options' ) ) {
				die();
			}

			update_option( 'total_nux_dismissed', true );
		}

		/**
		 * Redirects to the customizer with the correct variables.
		 *
		 */
		public function redirect_customizer() {
			check_admin_referer( 'total_starter_content' );

			if ( current_user_can( 'manage_options' ) ) {

				// Dismiss notice.
				update_option( 'total_nux_dismissed', true );
			}

			$args = array( 'total_starter_content' => '1' );

			$set = '';

			if ( ! empty( $_REQUEST['homepage'] ) && 'on' === $_REQUEST['homepage'] ) {
				$set = 'homepage';

				if ( current_user_can( 'edit_pages' ) && 'page' === get_option( 'show_on_front' ) ) {
					$this->_assign_page_template( get_option( 'page_on_front' ), 'template-home.php' );
				}

				$args['total_tasks'] = $set;

				if ( current_user_can( 'manage_options' ) ) {

					// Make sure the fresh_site flag is set to true.
					update_option( 'fresh_site', true );

				}
			}

			wp_safe_redirect( add_query_arg( $args, admin_url( 'customize.php' ) ) );

			die();
		}

		/**
		 * Update Storefront fresh site flag.
		 *
		 */
		public function log_fresh_site_state() {
			if ( null === get_option( 'total_nux_fresh_site', null ) ) {
				update_option( 'total_nux_fresh_site', get_option( 'fresh_site' ) );
			}
		}


		/**
		 * Given a page id assign a given page template to it.
		 *
		 */
		private function _assign_page_template( $page_id, $template ) {
			if ( empty( $page_id ) || empty( $template ) || '' === locate_template( $template ) ) {
				return false;
			}

			update_post_meta( $page_id, '_wp_page_template', $template );
		}

		/**
		 * Starter content.
		 *
		 */
		public function starter_content() {
			$nextWeek = date('m/d/Y', strtotime('+1 week'));

			// Define and register starter content to showcase the theme on new sites.
			$starter_content = array(

				// Specify the core-defined pages to create and add custom thumbnails to some of them.
				'posts' => array(
					'home' => array(
						'template' => 'template-home.php'
					),
					'about' => array(
						'thumbnail' => '{{sales-girl}}',
						'post_title' => _x( 'About Us', 'Theme starter content', 'total' ),
						'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
					),
					'contact' => array(
						'thumbnail' => '{{city-image}}',
					),
                    'slider' => array(
						'post_type' => 'page',
						'post_title' => 'HELPING TO BUILD YOUR FUTURE',
						'thumbnail' => '{{slider}}',
						'post_content' => 'Secure your future with us. We are wordwide trusted for our service.'
					),
					'consulting' => array(
						'post_type' => 'page',
						'post_title' => 'Financial Consulting',
						'thumbnail' => '{{clock}}',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
                    'team' => array(
						'post_type' => 'page',
						'post_title' => 'Barak Stuart',
						'thumbnail' => '{{team}}',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
                    'testimonial' => array(
						'post_type' => 'page',
						'post_title' => 'Barak Stuart',
						'thumbnail' => '{{team}}',
						'post_content' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
					),
					'blog'
				),

				// Create the custom image attachments used as post thumbnails for pages.
				'attachments' => array(
                    'slider' => array(
						'post_title' => _x( 'Slider', 'Theme starter content', 'total' ),
						'file' => 'images/slider.jpg', // URL relative to the template directory.
					),
					'city-image' => array(
						'post_title' => _x( 'ChristMas', 'Theme starter content', 'total' ),
						'file' => 'images/city.jpg', // URL relative to the template directory.
					),
					'people' => array(
						'post_title' => _x( 'About Us', 'Theme starter content', 'total' ),
						'file' => 'images/people.png', // URL relative to the template directory.
					),
                    'team' => array(
						'post_title' => _x( 'Team Member', 'Theme starter content', 'total' ),
						'file' => 'images/team.jpg', // URL relative to the template directory.
					),
					'total-logo' => array(
						'post_title' => _x( 'Total Logo', 'Theme starter content', 'total' ),
						'file' => 'images/logo.png', // URL relative to the template directory.
					)
				),

				// Default to a static front page and assign the front and posts pages.
				'options' => array(
					//'show_on_front' => 'page',
					//'page_on_front' => '{{home}}',
					//'page_for_posts' => '{{blog}}',
				),

				// Set the front page section theme mods to the IDs of the core-registered pages.
				'theme_mods' => array(
					'total_enable_frontpage' => true,
                    'total_slider_page1' => '{{slider}}',
                    'total_about_progressbar_title1' => _x( 'Management', 'Theme starter content', 'total' ),
                    'total_about_progressbar_title2' => _x( 'Marketing', 'Theme starter content', 'total' ),
                    'total_about_progressbar_title3' => _x( 'Strategy', 'Theme starter content', 'total' ),
                    'total_about_progressbar_title4' => _x( 'Planning', 'Theme starter content', 'total' ),
                    'total_about_progressbar_title5' => _x( 'Deployment', 'Theme starter content', 'total' ),
                    'total_about_image'=> get_template_directory_uri().'/images/people.png',
                    'total_featured_title' => _x( 'Why Choose Us', 'Theme starter content', 'total' ),
					'total_featured_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
                    'total_featured_page1' => '{{consulting}}',
					'total_featured_page2' => '{{consulting}}',
					'total_featured_page3' => '{{consulting}}',
                    'total_service_title' => _x( 'Our Services', 'Theme starter content', 'total' ),
					'total_service_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
                    'total_service_page1' => '{{consulting}}',
					'total_service_page2' => '{{consulting}}',
					'total_service_page3' => '{{consulting}}',
                    'total_service_page4' => '{{consulting}}',
					'total_service_page5' => '{{consulting}}',
					'total_service_page6' => '{{consulting}}',
                    'total_team_title' => _x( 'Our Talented Members', 'Theme starter content', 'total' ),
					'total_team_sub_title' => 'Auctor orci proin consequat magna natoque mattis nostra eiusmod esse lunga laboriosam luctus pulvinar tenetur fugito similique',
                    'total_team_page1' => '{{team}}',
                    'total_team_designation1' => _x( 'Chief Executive Officer', 'Theme starter content', 'total' ),
                    'total_team_page2' => '{{team}}',
                    'total_team_designation2' => _x( 'Chief Executive Officer', 'Theme starter content', 'total' ),
                    'total_team_page3' => '{{team}}',
                    'total_team_designation3' => _x( 'Chief Executive Officer', 'Theme starter content', 'total' ),
                    'total_team_page4' => '{{team}}',
                    'total_team_designation4' => _x( 'Chief Executive Officer', 'Theme starter content', 'total' ),
                    'total_testimonial_title' => _x( 'From Our Clients', 'Theme starter content', 'total' ),
                    'total_testimonial_page' => ''
                    


					'total_banner_sub_title' => _x( '-- Henry David Thoreau', 'Theme starter content', 'total' ),
					'total_banner_text1' => _x( 'Read More', 'Theme starter content', 'total' ),
					'total_banner_link1' => '#',
					'total_banner_text2' => _x( 'Buy Tickets', 'Theme starter content', 'total' ),
					'total_banner_link2' => '#',
					'total_about_page' => '{{about}}',
					'total_counter_count1' => '450',
					'total_counter_title1' => _x( 'Projects Completed', 'Theme starter content', 'total' ),
					'total_counter_icon1' => 'fa fa-briefcase',
					'total_counter_count2' => '10',
					'total_counter_title2' => _x( 'Awards Won', 'Theme starter content', 'total' ),
					'total_counter_icon2' => 'fa fa-trophy',
					'total_counter_count3' => '124',
					'total_counter_title3' => _x( 'OnGoing Projects', 'Theme starter content', 'total' ),
					'total_counter_icon3' => 'fa fa-suitcase',
					'total_counter_count4' => '500',
					'total_counter_title4' => _x( 'Employee Working', 'Theme starter content', 'total' ),
					'total_counter_icon4' => 'fa fa-user-secret',
					'total_event_info' => _x( 'We are soon opening our new branch at NewYork with lots of exciting offers.', 'Theme starter content', 'total' ),
					'total_event_date' => $nextWeek,
					
					
					'total_blog_title' => _x( 'Latest Blog', 'Theme starter content', 'total' ),
					'total_blog_sub_title' => _x( 'Get information on everything.', 'Theme starter content', 'total' ),
					'total_social_facebook' => '#',
					'total_social_twitter' => '#',
					'total_social_google_plus' => '#',
					'total_social_pinterest' => '#',
					'custom_logo' => '{{total-logo}}',
					'total_footer_logo' => get_template_directory_uri().'/images/total-logo.png'
				), 

				// Set up nav menus for each of the two areas registered in the theme.
				'nav_menus' => array(
					// Assign a menu to the "top" location.
					'primary' => array(
						'name' => __( 'Main Menu', 'total' ),
						'items' => array(
							'link_home',
							'page_about',
							'page_blog',
							'page_contact',
						),
					)
				),
			);

			$starter_content = apply_filters( 'total_starter_content', $starter_content );

			add_theme_support( 'starter-content', $starter_content );
		}

		/**
		 * Filters starter content and remove some of the content if necessary.
		 *
		 */
		public function filter_start_content( $content, $config ) {
			if ( ! isset( $_GET['total_starter_content'] ) || 1 !== absint( $_GET['total_starter_content'] ) ) {

				// We only allow starter content if the users comes from the NUX wizard.
				return $content;
			}

			$set = '';

			if ( isset( $_GET['total_tasks'] ) && '' !== sanitize_text_field( $_GET['total_tasks'] ) ) {
				$set = sanitize_text_field( $_GET['total_tasks'] );
			}

			if( $set == 'homepage'){
				if ( current_user_can( 'edit_pages' ) && 'page' === get_option( 'show_on_front' ) ) {
					unset( $content['options'] );
					unset( $content['posts']['home'] );
					unset( $content['posts']['blog'] );
				}
			}

			return $content;
		}
	}

endif;

return new Total_Starter_Content();