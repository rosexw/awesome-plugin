<?php
   /*
   Plugin Name: awesome-plugin
   Plugin URI: https://github.com/rosexw/awesome-plugin
   Description: a plugin to create awesomeness and spread joy
   Version: 1.0
   Author: Mr. Awesome
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
  // function awepop_add_view() {
  //    if(is_single()) {
  //       global $post;
  //       $current_views = get_post_meta($post->ID, "awepop_views", true);
  //       if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
  //          $current_views = 0;
  //       }
  //       $new_views = $current_views + 1;
  //       update_post_meta($post->ID, "awepop_views", $new_views);
  //       return $new_views;
  //    }
  // }

  add_action('init','hello_world');
  function hello_world()
    {
      echo "Hello World";
    }

    add_action( 'the_content', 'my_thank_you_text' );

    function my_thank_you_text ( $content ) {
      return $content .= '<p>Thank you for reading!</p>';
    }
?>
