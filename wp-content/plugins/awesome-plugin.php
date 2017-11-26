<?php
   /*
   Plugin Name: awesome-plugin
   Plugin URI: https://github.com/rosexw/awesome-plugin
   Description: a plugin to create awesomeness and spread joy
   Version: 1.0
   By: ME
   Author URI: https://rosexw.github.io/
   */

   /**
    * Adds a view to the post being viewed
    *
    * Finds the current views of a post and adds one to it by updating
    * the postmeta. The meta key used is "awepop_views".
    *
    * @global object $post The post object
    * @return integer $new_views The number of views the post has
    *
    */

    add_action( 'the_content', 'my_thank_you_text' );

    function my_thank_you_text ( $content ) {
      return $content .= '<p>Thank you for reading!</p>';
    }


    // login page logo
    function custom_login_logo() {
    	echo '<style>h1 a, h1 a:hover, h1 a:focus { font-size: 1.4em; font-weight: normal; text-align: center; text-indent: 0; line-height: 1.1em; text-decoration: none; color: #dadada; text-shadow: 0 -1px 1px #666, 0 1px 1px #fff; background-image: none !important; }</style>';
    }
    add_action('login_head', 'custom_login_logo');


    // remove administration page header logo
    function remove_admin_logo() {
    	echo '<style>img#header-logo { display: none; }</style>';
    }
    add_action('admin_head', 'remove_admin_logo');


    // change administration panel footer
    function change_footer_admin() {
    	echo 'For support, please call 123456 or email <a href="mailto:support@mysite.net">mailto:support@mysite.net</a>';
    }
    add_filter('admin_footer_text', 'change_footer_admin');
?>
