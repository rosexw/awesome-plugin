<?php
/*
 * Plugin Name: Social Media Links for Ultimate Member
 * Plugin URI: https://suiteplugins.com/
 * Description: Great easy to use plugin to add your social media accounts to your Ultimate Member profile
 * Version: 1.0.2
 * Author: SuitePlugins
 * Author URI: https://suiteplugins.com/
 * Text Domain: social-links-um
 * Domain Path: /languages
 */

function socialLinks_load_plugin_textdomain() {
	load_plugin_textdomain( 'social-links-um', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'socialLinks_load_plugin_textdomain' );

if ( ! class_exists( 'SocialLinks_UM' ) ) :

	class SocialLinks_UM {

		public $fb_meta_key;
		public $twit_meta_key;
		public $inst_meta_key;
		public $link_meta_key;
		public $xing_meta_key;
		public $ren_meta_key;
		public $google_meta_key;
		public $disqus_meta_key;
		public $snap_meta_key;
		public $whats_meta_key;
		public $tumb_meta_key;
		public $pint_meta_key;
		public $yout_meta_key;
		public $vk_meta_key;
		public $vine_meta_key;

		public function __construct() {
			$this->fb_meta_key       = 'social_media_url_facebook';
			$this->twit_meta_key     = 'social_media_url_twitter';
			$this->inst_meta_key     = 'social_media_url_instagram';
			$this->link_meta_key     = 'social_media_url_linkedin';
			$this->xing_meta_key     = 'social_media_url_xing';
			$this->ren_meta_key      = 'social_media_url_renren';
			$this->google_meta_key   = 'social_media_url_googleplus';
			$this->disqus_meta_key   = 'social_media_url_disqus';
			$this->snap_meta_key     = 'social_media_url_snapchat';
			$this->whats_meta_key    = 'social_media_url_whatsapp';
			$this->tumb_meta_key     = 'social_media_url_tumblr';
			$this->pint_meta_key     = 'social_media_url_pinterest';
			$this->yout_meta_key     = 'social_media_url_youtube';
			$this->vk_meta_key       = 'social_media_url_vk';
			$this->vine_meta_key     = 'social_media_url_vine';
			$this->website_meta_key  = 'social_media_url_website';

			//This happens before anything is loaded onto the screen
			add_action( 'init', array( $this, 'save_details' ) );

			//Hook for creating Menu Items : um_user_profile_tabs
			add_filter( 'um_user_profile_tabs', array( $this, 'social_media_accounts' ), 12, 1 );

			//Hook: um_profile_content_$menu_key
			add_action( 'um_profile_content_social_media', array( $this, 'social_media_accounts_content_page' ) );

			add_action( 'um_profile_header', array( $this, 'social_media_accounts_header_icons' ) );

			add_action( 'wp_head', array( $this, 'add_header_style' ) );

			add_action( 'show_user_profile', array( $this, 'social_media_admin_profile_fields' ) );
            add_action( 'edit_user_profile', array( $this, 'social_media_admin_profile_fields' ) );

			add_action( 'personal_options_update', array( $this, 'save_admin_fields' ) );

		}
		public function social_media_accounts_header_icons() {
			$user_id = um_profile_id();
			$fb_link = get_user_meta( $user_id, $this->fb_meta_key, true );
			$twit_link = get_user_meta( $user_id, $this->twit_meta_key, true );
			$inst_link = get_user_meta( $user_id, $this->inst_meta_key, true );
			$link_link = get_user_meta( $user_id, $this->link_meta_key, true );
			$xing_link = get_user_meta( $user_id, $this->xing_meta_key, true );
			$ren_link = get_user_meta( $user_id, $this->ren_meta_key, true );
			$google_link = get_user_meta( $user_id, $this->google_meta_key, true );
			$disqus_link = get_user_meta( $user_id, $this->disqus_meta_key, true );
			$snap_link = get_user_meta( $user_id, $this->snap_meta_key, true );
			$whats_link = get_user_meta( $user_id, $this->whats_meta_key, true );
			$tumb_link = get_user_meta( $user_id, $this->tumb_meta_key, true );
			$pint_link = get_user_meta( $user_id, $this->pint_meta_key, true );
			$yout_link = get_user_meta( $user_id, $this->yout_meta_key, true );
			$vk_link = get_user_meta( $user_id, $this->vk_meta_key, true );
			$vine_link = get_user_meta( $user_id, $this->vine_meta_key, true );
			$web_link = get_user_meta( $user_id, $this->website_meta_key, true );

			echo '<div class="socials-links-um">';
			if ( ! empty( $fb_link ) ) {
				?>
				<a href="<?php echo esc_url( $fb_link ); ?>" target="_blank"><i class="um-faicon-facebook-square social-media-link" ></i></a>
				<?php
			}

			if ( ! empty( $twit_link ) ) {
				?>
	<a href="<?php echo esc_url( $twit_link ); ?>" target="_blank"><i class="um-faicon-twitter-square social-media-link" ></i></a>
	<?php
			}

			if ($inst_link) {
				?>
	<a href="<?php echo esc_url($inst_link); ?>" target="_blank"><i class="um-faicon-instagram social-media-link" ></i></a>
	<?php
			}

			if ($link_link) {
				?>
	<a href="<?php echo esc_url($link_link); ?>" target="_blank"><i class="um-faicon-linkedin-square social-media-link" ></i></a>
	<?php
			}

			if ($xing_link) {
				?>
	<a href="<?php echo esc_url($xing_link); ?>" target="_blank"><i class="um-faicon-xing-square social-media-link" ></i></a>
	<?php
			}

			if ($ren_link) {
				?>
	<a href="<?php echo esc_url($ren_link); ?>" target="_blank"><i class="um-faicon-renren social-media-link" ></i></a>
	<?php
			}

			if ($google_link) {
				?>
	<a href="<?php echo esc_url($google_link); ?>" target="_blank"><i class="um-faicon-google-plus-square social-media-link" ></i></a>
	<?php
			}

			if ($snap_link) {
				?>
	<a href="<?php echo esc_url($snap_link); ?>" target="_blank"><i class="um-icon-social-snapchat social-media-link" ></i></a>
	<?php
			}

			if ($whats_link) {
				?>
	<a href="<?php echo esc_url($whats_link); ?>" target="_blank"><i class="um-faicon-whatsapp social-media-link" ></i></a>
	<?php
			}

			if ($tumb_link) {
				?>
	<a href="<?php echo esc_url($tumb_link); ?>" target="_blank"><i class="um-faicon-tumblr-square social-media-link" ></i></a>
	<?php
			}

			if ($pint_link) {
				?>
	<a href="<?php echo esc_url($pint_link); ?>" target="_blank"><i class="um-faicon-pinterest-square social-media-link" ></i></a>
	<?php
			}

			if ($yout_link) {
				?>
	<a href="<?php echo esc_url($yout_link); ?>" target="_blank"><i class="um-faicon-youtube-square social-media-link" ></i></a>
	<?php
			}

			if ($vk_link) {
				?>
	<a href="<?php echo esc_url($vk_link); ?>" target="_blank"><i class="um-faicon-vk social-media-link" ></i></a>
	<?php
			}

			if ( $vine_link ) { ?>
	<a href="<?php echo esc_url($vine_link); ?>" target="_blank"><i class="um-faicon-vine social-media-link" ></i></a>
	<?php
			}
			if ( ! empty( $web_link ) ) { ?>
				<a href="<?php echo esc_url( $web_link ); ?>" target="_blank"><i class="um-faicon-globe social-media-link" ></i></a>
				<?php
			}
			echo '</div>';
		}

		/*
		 *	This function will return an array of tabs. Use this function to rename or add a new tab array
		 *
		 */
		public function social_media_accounts( $tabs = array() ) {
			if ( um_is_user_himself() ) {
				$tabs['social_media'] = array(
					'name' 	=> __( 'Social Media Menu', 'social-links-um' ),
					'icon'	=> 'um-faicon-link',
					);
			}
			return $tabs;
		}

		public function save_details() {
			$user_id = get_current_user_id();
			$this->store_network_links( $user_id );
		}

		public function store_network_links( $user_id = 0 ) {
			if ( ! isset( $_POST['sl_nonce_field'] ) ) {
  				return;
  			}
  			if ( ! isset( $_POST['sl_nonce_field'] ) || ! wp_verify_nonce( $_POST['sl_nonce_field'], 'sl_um_verify_nonce' )
  			) {
  			} else {
  				 // process form data
  				if ( ! empty( $_POST[ $this->fb_meta_key ] ) ) {
  					$meta_value = esc_url( $_POST[ $this->fb_meta_key ] );
  					update_user_meta( $user_id, $this->fb_meta_key, $meta_value );
  				} else {
  					delete_user_meta( $user_id, $this->fb_meta_key );
  				}

  				if ( ! empty( $_POST[ $this->twit_meta_key ] ) ) {
  					$meta_value = esc_url( $_POST[ $this->twit_meta_key ] );
  					update_user_meta( $user_id, $this->twit_meta_key, $meta_value );
  				} else {
  					delete_user_meta( $user_id, $this->twit_meta_key );
  				}

  				if ( ! empty( $_POST[ $this->inst_meta_key ] ) ) {
  					$meta_value = esc_url( $_POST[ $this->inst_meta_key ] );
  					update_user_meta( $user_id, $this->inst_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->inst_meta_key );
  				}

  				if(!empty($_POST[$this->link_meta_key])) {
  					$meta_value = esc_url($_POST[$this->link_meta_key]);
  					update_user_meta( $user_id, $this->link_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->link_meta_key );
  				}

  				if(!empty($_POST[$this->xing_meta_key])) {
  					$meta_value = esc_url($_POST[$this->xing_meta_key]);
  					update_user_meta( $user_id, $this->xing_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->xing_meta_key );
  				}

  				if(!empty($_POST[$this->ren_meta_key])) {
  					$meta_value = esc_url($_POST[$this->ren_meta_key]);
  					update_user_meta( $user_id, $this->ren_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->ren_meta_key );
  				}

  				if(!empty($_POST[$this->google_meta_key])) {
  					$meta_value = esc_url($_POST[$this->google_meta_key]);
  					update_user_meta( $user_id, $this->google_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->google_meta_key );
  				}

  				if(!empty($_POST[$this->disqus_meta_key])) {
  					$meta_value = esc_url($_POST[$this->disqus_meta_key]);
  					update_user_meta( $user_id, $this->disqus_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->disqus_meta_key );
  				}

  				if(!empty($_POST[$this->snap_meta_key])) {
  					$meta_value = esc_url($_POST[$this->snap_meta_key]);
  					update_user_meta( $user_id, $this->snap_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->snap_meta_key );
  				}

  				if(!empty($_POST[$this->whats_meta_key])) {
  					$meta_value = esc_url($_POST[$this->whats_meta_key]);
  					update_user_meta( $user_id, $this->whats_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->whats_meta_key );
  				}

  				if(!empty($_POST[$this->tumb_meta_key])) {
  					$meta_value = esc_url($_POST[$this->tumb_meta_key]);
  					update_user_meta( $user_id, $this->tumb_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->tumb_meta_key );
  				}

  				if(!empty($_POST[$this->pint_meta_key])) {
  					$meta_value = esc_url($_POST[$this->pint_meta_key]);
  					update_user_meta( $user_id, $this->pint_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->pint_meta_key );
  				}

  				if(!empty($_POST[$this->yout_meta_key])) {
  					$meta_value = esc_url($_POST[$this->yout_meta_key]);
  					update_user_meta( $user_id, $this->yout_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->yout_meta_key );
  				}

  				if(!empty($_POST[$this->vk_meta_key])) {
  					$meta_value = esc_url($_POST[$this->vk_meta_key]);
  					update_user_meta( $user_id, $this->vk_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->vk_meta_key );
  				}

  				if(!empty($_POST[$this->vine_meta_key])) {
  					$meta_value = esc_url($_POST[$this->vine_meta_key]);
  					update_user_meta( $user_id, $this->vine_meta_key, $meta_value );
  				}else{
  					delete_user_meta( $user_id, $this->vine_meta_key );
  				}

  				if ( ! empty( $_POST[ $this->website_meta_key ] ) ) {
  					$meta_value = esc_url( $_POST[ $this->website_meta_key ] );
  					update_user_meta( $user_id, $this->website_meta_key, $meta_value );
  				} else {
  					delete_user_meta( $user_id, $this->website_meta_key );
  				}
  			}
		}
		/**
		 * Social Media form on Tab
		 * @return html
		 */
		public function social_media_accounts_content_page() {
			global $user_id;
			$user_id = um_profile_id();
			?>
			<form method="post">
				<?php $this->fields(); ?>
		  		</br>
		  		<button type="submit" style="float: right;" class="btn btn-default"><?php _e( 'Submit','social-links-um' ); ?></button>
		  		<div style="clear: both;"></div>
			</form>
		<?php
		}
		/**
		 * Admin profile fields section
		 * @param  object $user WP_User object
		 * @return html
		 */
		public function social_media_admin_profile_fields( $user ) {
			global $user_id;
			$user_id = $user->ID;
			echo '
			<style type="text/css">
			.um-social-link-form-wrapper br{
				display: none;
			}
			.um-social-link-form-wrapper .form-group label {
				vertical-align: top;
				text-align: left;
				padding: 20px 10px 20px 0;
				width: 200px;
				line-height: 1.3;
				font-weight: 600;
				display: inline-block;
			}

			.um-social-link-form-wrapper .form-group input {
				display: inline-block;
				margin-bottom: 9px;
				margin: 15px 10px;
				line-height: 1.3;
				vertical-align: middle;
				min-width: 340px;
			}
			</style>';
			echo '<div class="um-social-link-form-wrapper">';
			include_once( $this->dir( 'templates/fields.php' ) );
			echo '</div>';
		}

		/**
		 * Fetch fields
		 * @return html
		 */
		public function fields() {
			include_once( $this->dir( 'templates/fields.php' ) );
		}

		public function save_admin_fields( $user_id = 0 ) {
			$this->store_network_links( $user_id );
		}
		/**
		 * This plugin's directory
		 *
		 * @since  1.0.2
		 * @param  string $path (optional) appended path
		 * @return string       Directory and path
		 */
		public static function dir( $path = '' ) {
			static $dir;
			$dir = $dir ? $dir : trailingslashit( dirname( __FILE__ ) );
			return $dir . $path;
		}
		/**
		 * This plugin's url
		 *
		 * @since  1.0.2
		 * @param  string $path (optional) appended path
		 * @return string       URL and path
		 */
		public static function url( $path = '' ) {
			static $url;
			$url = $url ? $url : trailingslashit( plugin_dir_url( __FILE__ ) );
			return $url . $path;
		}
		/*
		 * Add styling for icons here
		 */
		public function add_header_style() {
			?>
			<style type="text/css">
			.socials-links-um {
				text-align: center;
				margin: 4px 0px;
			}

			.socials-links-um a {
				font-size: 26px;
				border: 0px;
			}
			</style>
			<?php
		}
	}

	$social_links_um = new SocialLinks_UM();

endif;
